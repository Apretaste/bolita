<?php

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
			return $response->setTemplate('message.ejs');
		}

		// complete the challenge
		Challenges::complete('view-bolita', $request->person->id);

		// add screen title
		$corrida->title = "Tiradas";

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
}
