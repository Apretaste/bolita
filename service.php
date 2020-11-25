<?php

use Apretaste\Money;
use Apretaste\Request;
use Apretaste\Response;
use Apretaste\Challenges;
use Framework\Database;

class Service
{
	/**
	 * Get results for la bolita
	 *
	 * @param Request $request
	 * @param Response $response
	 */
	public function _main(Request $request, Response $response)
	{
		// get the date and filters
		$dt = $request->input->data->dt ?? false;
		$where = empty($dt) ? "" : "WHERE corrida = '$dt'";

		// get latest corrida, or search by date
		$corrida = Database::queryFirst("
			SELECT 
				corrida, updated,
				papeleta_day, fijo_day, corrido1_day, corrido2_day, 
				papeleta_night, fijo_night, corrido1_night, corrido2_night
			FROM _bolita_results
			$where
			ORDER BY corrida DESC");

		// show error if there is no corrida for the day searched
		if(empty($corrida)) {
			return $response->setTemplate('message.ejs', [
				'title' => 'Message',
				'header' => 'No hay resultados',
				'icon' => 'mood_bad',
				'text' => 'No hemos encontrado resultados para este día. Por favor vire hacia atrás y escoja otra fecha.',
				'btnLink' => 'BOLITA',
				'btnCaption' => 'Ir atrás']);
		}

		// complete the challenge
		Challenges::complete('view-bolita', $request->person->id);

		// add screen title
		$corrida->title = "Tiradas";
		$corrida->hasNightResults = !empty($corrida->fijo_night);

		// send data to the view
		$response->setCache(360);
		$response->setLayout('bolita.ejs');
		$response->setTemplate('actual.ejs', $corrida);
	}

	/**
	 * Show La Charada
	 *
	 * @param Request
	 * @param Response
	 */
	public function _charada(Request $request, Response $response)
	{
		$response->setCache('year');
		$response->setLayout('bolita.ejs');
		$response->setTemplate('charada.ejs', ['title' => 'Charada']);
	}

	/**
	 * Get lucky numbers
	 *
	 * @param Request $request
	 * @param Response $response
	 */
	public function _suerte(Request $request, Response $response)
	{
		// get numbers for today
		$nums = Database::query("SELECT numbers FROM _bolita_suerte WHERE id_person='{$request->person->id}' AND DATE(`date`)=DATE(NOW())");

		if (!$nums) {
			// if no numbers, create them
			$pick3 = [rand(0, 9), rand(0, 9), rand(0, 9)];
			$pick4 = [rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9)];
			$pick3 = implode($pick3);
			$pick4 = implode($pick4);
			$nums = "$pick3 $pick4";
			$paid = 0;

			// save lucky numbers in the db
			Database::query("
				INSERT INTO _bolita_suerte (id_person, numbers)
				VALUES('{$request->person->id}', '$nums')");
		} else {
			$nums = $nums[0]->numbers;
		}

		$content = [
			'title' => 'Suerte',
			'fijo' => $nums[1] . $nums[2],
			'centena' => $nums[0],
			'corrido1' => $nums[4] . $nums[5],
			'corrido2' => $nums[6] . $nums[7],
		];

		$response->setCache(360);
		$response->setLayout('bolita.ejs');
		$response->setTemplate('suerte.ejs', $content);
	}

	/**
	 * Show the list of open bets
	 *
	 * @param Request $request
	 * @param Response $response
	 */
	public function _apuestas(Request $request, Response $response)
	{
		// get all the open bets
		$bets = Database::query("
			SELECT type, bet_1, bet_2, bet_3, bet_amount, inserted
			FROM _bolita_bets
			WHERE status = 'PLAY'
			AND person_id = {$request->person->id}
			ORDER BY inserted DESC");

		// send data to the interface
		$response->setLayout('bolita.ejs');
		$response->setTemplate('apuestas.ejs', ['title' => 'Apuestas', 'bets' => $bets]);
	}

	/**
	 * Open the form to bet for the next tirada
	 *
	 * @param Request $request
	 * @param Response $response
	 */
	public function _apostar(Request $request, Response $response)
	{
		$response->setCache('year');
		$response->setLayout('bolita.ejs');
		$response->setTemplate('apostar.ejs', ['title' => 'Apostar', 'credit' => $request->person->credit]);
	}

	/**
	 * Show the list of winners
	 *
	 * @param Request $request
	 * @param Response $response
	 */
	public function _ganadores(Request $request, Response $response)
	{
		// list of winners
		$winners = Database::query("
			SELECT 
				A.type, A.updated, A.bet_1, A.bet_2, A.bet_3, A.earned, 
				B.username, B.gender, B.avatar, B.avatarColor
			FROM _bolita_bets A
			JOIN person B
			ON A.person_id = B.id
			WHERE A.status = 'WON'
			ORDER BY A.updated DESC
			LIMIT 30");

		// send data to the view
		$response->setLayout('bolita.ejs');
		$response->setTemplate('ganadores.ejs', ['title' => 'Ganadores', 'winners' => $winners]);
	}

	/**
	 * Display the rules of the game
	 *
	 * @param Request $request
	 * @param Response $response
	 */
	public function _reglas(Request $request, Response $response)
	{
		$response->setCache('year');
		$response->setLayout('bolita.ejs');
		$response->setTemplate('reglas.ejs', ['title' => 'Reglas']);
	}

	/**
	 * Add the new bet to the database
	 *
	 * @param Request $request
	 * @param Response $response
	 */
	public function _crear(Request $request, Response $response)
	{
		// get data from the request
		$type = $request->input->data->type;
		$bet1 = $request->input->data->bet1;
		$bet2 = $request->input->data->bet2;
		$bet3 = $request->input->data->bet3;
		$amount = $request->input->data->amount;

		// accept corridos only for a parle
		if ($type != 'PARLE') $bet2 = $bet3 = "";

		// validate data and funds
		if(
			!in_array($type, ['CORRIDO','FIJO','PARLE']) ||
			!is_numeric($amount) || $amount < 1 || $amount > $request->person->credit || 
			!is_numeric($bet1) || ($bet1 < 1 || $bet1 > 100) || 
			$type == 'PARLE' && (
				!is_numeric($bet2) || ($bet2 < 1 || $bet2 > 100) || 
				!is_numeric($bet3) || ($bet3 < 1 || $bet3 > 100)
			)
		) {
			return $response->setTemplate('message.ejs', [
				'title' => 'Message',
				'header' => 'Hemos encontrado un error',
				'icon' => 'mood_bad',
				'text' => 'Es posible que los datos que envió sean inválidos o que no tenga suficientes créditos.',
				'btnLink' => 'BOLITA APOSTAR',
				'btnCaption' => 'Reintentar']);
		}

		// check there is no double bets
		$isBetRepeated = Database::queryFirst("
			SELECT COUNT(*) AS cnt
			FROM _bolita_bets
			WHERE person_id = {$request->person->id}
			AND status = 'PLAY'
			AND type = '$type'
			AND bet_1 = '$bet1' 
			AND (bet_2 IS NULL OR bet_2 = '$bet2')
			AND (bet_3 IS NULL OR bet_3 = '$bet3')")->cnt > 0;

		// error if bet is repeated
		if($isBetRepeated) {
			return $response->setTemplate('message.ejs', [
				'title' => 'Message',
				'header' => 'Apuesta repetida',
				'icon' => 'info',
				'text' => 'Está intentando repetir una apuesta que ya existe. Por su seguridad, no permitimos apuestas duplicadas en una misma tirada. Escoja otros números para continuar.',
				'btnLink' => 'BOLITA APOSTAR',
				'btnCaption' => 'Reintentar']);
		}

		// charge your credits
		Money::send($request->person->id, Money::BANK, $amount, "Apuesta para la próxima tirada de Bolita");

		// add bet to the database
		Database::query("
			INSERT INTO _bolita_bets(person_id, type, bet_1, bet_2, bet_3, bet_amount) 
			VALUES ({$request->person->id}, '$type', '$bet1', NULLIF('$bet2', ''), NULLIF('$bet3', ''), $amount)");

		// display OK message
		$response->setTemplate('message.ejs', [
			'title' => 'Message',
			'header' => 'Apuesta creada',
			'icon' => 'thumb_up',
			'text' => 'Su apuesta se ha creado correctamete, y será jugada en la próxima tirada. ¡Buena suerte!',
			'btnLink' => 'BOLITA APUESTAS',
			'btnCaption' => 'Ver apuestas']);
	}
}
