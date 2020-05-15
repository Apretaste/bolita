<?php

use Apretaste\Challenges;
use Apretaste\Money;
use Apretaste\Request;
use Apretaste\Response;
use Framework\Alert;
use Framework\Database;
use Goutte\Client;

class Service
{
	// charada
	public const CHARADA = [
		'Caballo',
		'Mariposa',
		'Niñito',
		'Gato',
		'Monja',
		'Tortuga',
		'Caracol',
		'Muerto',
		'Elefante',
		'Pescadote',
		'Gallo',
		'Mujer Santa',
		'Pavo Real',
		'Tigre',
		'Perro',
		'Toro',
		'San Lázaro',
		'Pescadito',
		'Lombriz',
		'Gato Fino',
		'Majá',
		'Sapo',
		'Vapor',
		'Paloma',
		'Piedra Fina',
		'Anguila',
		'Avispa',
		'Chivo',
		'Ratón',
		'Camarón',
		'Venado',
		'Cochino',
		'Tiñosa',
		'Mono',
		'Araña',
		'Cachimba',
		'Brujería',
		'Dinero',
		'Conejo',
		'Cura',
		'Lagartija',
		'Pato',
		'Alacrán',
		'Año Del Cuero',
		'Tiburón',
		'Humo Blanco',
		'Pájaro',
		'Cucaracha',
		'Borracho',
		'Policía',
		'Soldado',
		'Bicicleta',
		'Luz Eléctrica',
		'Flores',
		'Cangrejo',
		'Merengue',
		'Cama',
		'Retrato',
		'Loco',
		'Huevo',
		'Caballote',
		'Matrimonio',
		'Asesino',
		'Muerto Grande',
		'Comida',
		'Par De Yeguas',
		'Puñalada',
		'Cementerio',
		'Relajo Grande',
		'Coco',
		'Río',
		'Collar',
		'Maleta',
		'Papalote',
		'Perro Mediano',
		'Bailarina',
		'Muleta De Sán Lázaro',
		'Sarcófago',
		'Tren de carga',
		'Médicos',
		'Teatro',
		'Madre',
		'Tragedia',
		'Sangre',
		'Reloj',
		'Tijeras',
		'Plátano',
		'Espejuelos',
		'Agua',
		'Viejo',
		'Limosnero',
		'Globo alto',
		'Sortija',
		'Machete',
		'Guerra',
		'Reto',
		'Mosquito',
		'Piano',
		'Serrucho',
		'Motel'
	];

	/**
	 * Get results for la bolita
	 *
	 * @param Request $request
	 * @param Response $response
	 * @return void
	 * @throws Alert
	 */
	public function _main(Request $request, Response $response)
	{
		date_default_timezone_set('America/Havana');
		$pathToService = SERVICE_PATH . $response->service;

		// load from cache if exists
		$data = self::loadCache('today');
		if ($data === null || $this->needUpdate($data['date'] ?? '1900-01-01')) {
			$data = $this->update();
			self::saveCache('today', $data);
		}

		$results = $this->resultsFromData($data);

		$response->setCache(360);
		$response->setLayout('bolita.ejs');
		$response->setTemplate('actual.ejs', ['results' => $results], self::img(), self::font());

		Challenges::complete('view-bolita', $request->person->id);
	}

	/**
	 *
	 * @param String
	 * @return Boolean
	 */
	public function needUpdate(string $lastUpdate)
	{
		date_default_timezone_set('America/Havana');

		$date = substr($lastUpdate, 0, 8);
		$h = substr($lastUpdate, 9, 2);
		$m = substr($lastUpdate, 12, 2);
		if ($date == date('Ymd')) {
			switch (date('H')) {
				case '13':
					return ($h == '13') ? (($m >= 30) and ((date('i') - $m) >= 2)) : true;
					break;
				case '14':
					return ($h == '14') ? ((date('i') - $m) >= 5) : true;
					break;
				case '21':
					return ($h == '21') ? (($m >= 45) and ((date('i') - $m) >= 2)) : true;
					break;
				case '22':
					return ($h == '22') ? ((date('i') - $m) >= 2) : true;
					break;
				default:
					return false;
					break;
			}
		} else {
			return true;
		}
	}

	/**
	 *
	 * @return array
	 */
	public function update()
	{
		date_default_timezone_set('America/Havana');

		// create a new client
		$client = new Client();

		$crawler = $client->request('GET', 'http://flalottery.com/pick3');
		$pick3 = [
			'Midday' => [
				1 => $crawler->filter('#gameContentLeft > div:nth-child(2) > div.gamePageBalls > p:nth-child(1) > span:nth-child(1)')->text(),
				2 => $crawler->filter('#gameContentLeft > div:nth-child(2) > div.gamePageBalls > p:nth-child(1) > span:nth-child(3)')->text(),
				3 => $crawler->filter('#gameContentLeft > div:nth-child(2) > div.gamePageBalls > p:nth-child(1) > span:nth-child(5)')->text(),
				'date' => $crawler->filter('#gameContentLeft > div:nth-child(2) > p:nth-child(5)')->text()
			],
			'Evening' => [
				1 => $crawler->filter('#gameContentLeft > div:nth-child(3) > div.gamePageBalls > p:nth-child(1) > span:nth-child(1)')->text(),
				2 => $crawler->filter('#gameContentLeft > div:nth-child(3) > div.gamePageBalls > p:nth-child(1) > span:nth-child(3)')->text(),
				3 => $crawler->filter('#gameContentLeft > div:nth-child(3) > div.gamePageBalls > p:nth-child(1) > span:nth-child(5)')->text(),
				'date' => $crawler->filter('#gameContentLeft > div:nth-child(3) > p:nth-child(5)')->text()
			]
		];

		$crawler = $client->request('GET', 'http://flalottery.com/pick4');
		$pick4 = [
			'Midday' => [
				1 => $crawler->filter('#gameContentLeft > div:nth-child(2) > div.gamePageBalls > p:nth-child(1) > span:nth-child(1)')->text(),
				2 => $crawler->filter('#gameContentLeft > div:nth-child(2) > div.gamePageBalls > p:nth-child(1) > span:nth-child(3)')->text(),
				3 => $crawler->filter('#gameContentLeft > div:nth-child(2) > div.gamePageBalls > p:nth-child(1) > span:nth-child(5)')->text(),
				4 => $crawler->filter('#gameContentLeft > div:nth-child(2) > div.gamePageBalls > p:nth-child(1) > span:nth-child(7)')->text(),
				'date' => $crawler->filter('#gameContentLeft > div:nth-child(2) > p:nth-child(5)')->text()
			],
			'Evening' => [
				1 => $crawler->filter('#gameContentLeft > div:nth-child(3) > div.gamePageBalls > p:nth-child(1) > span:nth-child(1)')->text(),
				2 => $crawler->filter('#gameContentLeft > div:nth-child(3) > div.gamePageBalls > p:nth-child(1) > span:nth-child(3)')->text(),
				3 => $crawler->filter('#gameContentLeft > div:nth-child(3) > div.gamePageBalls > p:nth-child(1) > span:nth-child(5)')->text(),
				4 => $crawler->filter('#gameContentLeft > div:nth-child(3) > div.gamePageBalls > p:nth-child(1) > span:nth-child(7)')->text(),
				'date' => $crawler->filter('#gameContentLeft > div:nth-child(3) > p:nth-child(5)')->text()
			]
		];

		$data = [
			'pick3' => $pick3,
			'pick4' => $pick4,
			'date' => date('Ymd H:i')
		];
		return $data;
	}

	/**
	 *
	 */
	private function resultsFromData($data)
	{
		$results = [];
		if ($data['pick3']['Midday']) {
			$results['fijoMid'] = $data['pick3']['Midday'][2] . $data['pick3']['Midday'][3];
			$results['centenaMid'] = $data['pick3']['Midday'][1];
			$results['fijoMidDate'] = $this->dateToEsp($data['pick3']['Midday']['date']);
			$results['fijoMidText'] = self::charada($data['pick3']['Midday'][2] . $data['pick3']['Midday'][3]);
		}

		if ($data['pick4']['Midday']) {
			$results['Corrido1Mid'] = $data['pick4']['Midday'][1] . $data['pick4']['Midday'][2];
			$results['Corrido2Mid'] = $data['pick4']['Midday'][3] . $data['pick4']['Midday'][4];
			$results['Corrido1MidDate'] = $this->dateToEsp($data['pick4']['Midday']['date']);
			$results['Corrido2MidDate'] = $this->dateToEsp($data['pick4']['Midday']['date']);
			$results['Corrido1MidText'] = self::charada($data['pick4']['Midday'][1] . $data['pick4']['Midday'][2]);
			$results['Corrido2MidText'] = self::charada($data['pick4']['Midday'][3] . $data['pick4']['Midday'][4]);
		}

		if ($data['pick3']['Evening']) {
			$results['fijoEve'] = $data['pick3']['Evening'][2] . $data['pick3']['Evening'][3];
			$results['centenaEve'] = $data['pick3']['Evening'][1];
			$results['fijoEveDate'] = $this->dateToEsp($data['pick3']['Evening']['date']);
			$results['fijoEveText'] = self::charada($data['pick3']['Evening'][2] . $data['pick3']['Evening'][3]);
		}

		if ($data['pick4']['Evening']) {
			$results['Corrido1Eve'] = $data['pick4']['Evening'][1] . $data['pick4']['Evening'][2];
			$results['Corrido2Eve'] = $data['pick4']['Evening'][3] . $data['pick4']['Evening'][4];
			$results['Corrido1EveDate'] = $this->dateToEsp($data['pick4']['Evening']['date']);
			$results['Corrido2EveDate'] = $this->dateToEsp($data['pick4']['Evening']['date']);
			$results['Corrido1EveText'] = self::charada($data['pick4']['Evening'][1] . $data['pick4']['Evening'][2]);
			$results['Corrido2EveText'] = self::charada($data['pick4']['Evening'][3] . $data['pick4']['Evening'][4]);
		}

		return $results;
	}

	/**
	 *
	 * @param String|array
	 * @return String|array
	 */
	public function dateToEsp($text)
	{
		if (is_array($text)) {
			return $text;
		}

		$month = [
			'Jan' => 'Enero',
			'Feb' => 'Febrero',
			'Mar' => 'Marzo',
			'Apr' => 'Abril',
			'May' => 'Mayo',
			'Jun' => 'Junio',
			'Jul' => 'Julio',
			'Aug' => 'Agosto',
			'Sep' => 'Septiembre',
			'Oct' => 'Octubre',
			'Nov' => 'Noviembre',
			'Dec' => 'Diciembre'
		];

		$day = [
			'Monday' => 'Lunes',
			'Tuesday' => 'Martes',
			'Wednesday' => 'Miercoles',
			'Thursday' => 'Jueves',
			'Friday' => 'Viernes',
			'Saturday' => 'Sabado',
			'Sunday' => 'Domingo'
		];

		$extractos = explode(',', $text);
		$mes_dia = explode(' ', trim($extractos[1]));
		$d = $day[$extractos[0]];
		$m = $month[substr($mes_dia[0], 0, 3)];
		return ($d . ', ' . $m . ' ' . $mes_dia[1] . ' del ' . $extractos[2]);
	}

	/**
	 *
	 */
	private static function charada($number)
	{
		$number = $number == '00' ? 99 : ((int)$number) - 1;
		return self::CHARADA[$number];
	}

	/**
	 *
	 */
	private static function img(): array
	{
		$pathToService = SERVICE_PATH . 'bolita';
		return ["$pathToService/images/results.png", "$pathToService/images/logo.png", "$pathToService/images/esfera-suerte.png"];
	}

	/**
	 * Get the font file
	 */
	private static function font(): array
	{
		return [SERVICE_PATH . 'bolita' . '/resources/Roboto-Medium.ttf'];
	}

	/**
	 * Charada
	 *
	 * @param Request
	 * @param Response
	 *
	 * @throws \Framework\Alert
	 */
	public function _charada(Request $request, Response $response)
	{
		$response->setCache('year');
		$response->setLayout('bolita.ejs');
		$response->setTemplate('charada.ejs', ['title' => 'Charada'], self::img(), self::font());
	}

	/**
	 * Subservice BOLITA anteriores
	 *
	 * @param Request $request
	 * @param Response $response
	 * @throws Alert
	 */
	public function _anteriores(Request $request, Response $response)
	{
		$date = $request->input->data->date ?? date('m/d/Y', strtotime('-1 day'));
		$cacheName = 'results_' . str_replace('/', '-', $date);
		$data = self::loadCache($cacheName);

		if ($data === null) {
			$date = explode('/', $date);

			if (strlen($date[0]) < 2) {
				$date[0] = '0' . $date[0];
			}

			if (strlen($date[1]) < 2) {
				$date[1] = '0' . $date[1];
			}

			$crawler = (new Client())->request('GET', "https://www.flalottery.com/site/winningNumberSearch?searchTypeIn=date&gameNameIn=AllGames&singleDateIn={$date[0]}%2F{$date[1]}%2F{$date[2]}");

			$data = [
				'pick3' => [
					'Midday' => false,
					'Evening' => false
				],
				'pick4' => [
					'Midday' => false,
					'Evening' => false
				],
				'date' => $date
			];

			$crawler->filter('td[colspan="2"]')->each(function ($item) use ($date, &$data) {
				if ($item->filter('.balls')->count() == 3) {
					if ($item->filter('img[alt="Midday"]')->count() == 1) {
						$data['pick3']['Midday'] = [
							1 => $item->filter('.balls:nth-child(2)')->text(),
							2 => $item->filter('.balls:nth-child(4)')->text(),
							3 => $item->filter('.balls:nth-child(6)')->text(),
							'date' => $date
						];
					} else {
						$data['pick3']['Evening'] = [
							1 => $item->filter('.balls:nth-child(2)')->text(),
							2 => $item->filter('.balls:nth-child(4)')->text(),
							3 => $item->filter('.balls:nth-child(6)')->text(),
							'date' => $date
						];
					}
				} elseif ($item->filter('.balls')->count() === 4) {
					if ($item->filter('img[alt="Midday"]')->count() === 1) {
						$data['pick4']['Midday'] = [
							1 => $item->filter('.balls:nth-child(2)')->text(),
							2 => $item->filter('.balls:nth-child(4)')->text(),
							3 => $item->filter('.balls:nth-child(6)')->text(),
							4 => $item->filter('.balls:nth-child(8)')->text(),
							'date' => $date
						];
					} else {
						$data['pick4']['Evening'] = [
							1 => $item->filter('.balls:nth-child(2)')->text(),
							2 => $item->filter('.balls:nth-child(4)')->text(),
							3 => $item->filter('.balls:nth-child(6)')->text(),
							4 => $item->filter('.balls:nth-child(8)')->text(),
							'date' => $date
						];
					}
				}
			});

			if (!$data['pick3']['Midday']) {
				$crawler->filter('.winningNumbers')->each(function ($item) use ($date, &$data) {
					if ($item->filter('.balls')->count() == 3) {
						$data['pick3']['Midday'] = [
							1 => $item->filter('.balls:nth-child(1)')->text(),
							2 => $item->filter('.balls:nth-child(3)')->text(),
							3 => $item->filter('.balls:nth-child(5)')->text(),
							'date' => $date
						];
					} elseif ($item->filter('.balls')->count() == 4) {
						$data['pick4']['Midday'] = [
							1 => $item->filter('.balls:nth-child(1)')->text(),
							2 => $item->filter('.balls:nth-child(3)')->text(),
							3 => $item->filter('.balls:nth-child(5)')->text(),
							4 => $item->filter('.balls:nth-child(7)')->text(),
							'date' => $date
						];
					}
				});
			}

			self::saveCache($cacheName, $data);
		}

		$results = $this->resultsFromData($data);

		$content = [
			'results' => $results,
			'date' => $date,
			'title' => 'Anteriores'
		];

		$response->setCache(360);
		$response->setLayout('bolita.ejs');
		$response->setTemplate('anteriores.ejs', $content, self::img(), self::font());
	}

	/**
	 * Get lucky numbers
	 *
	 * @param Request $request
	 * @param Response $response
	 * @return void
	 * @throws Alert
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

			// save numbers in the db
			Database::query("INSERT INTO _bolita_suerte (id_person, numbers) VALUES('{$request->person->id}', '$nums')");
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

		$response->setCache(60);
		$response->setLayout('bolita.ejs');
		$response->setTemplate('suerte.ejs', $content, self::img(), self::font());
	}

	/**
	 * Display the rules of the game
	 *
	 * @param Request $request
	 * @param Response $response
	 * @return void
	 * @throws Alert
	 */
	public function _reglas(Request $request, Response $response)
	{
		$response->setCache('year');
		$response->setLayout('bolita.ejs');
		$response->setTemplate('reglas.ejs', ['title' => 'Reglas'], [], self::font());
	}

	/**
	 * Show a list of notifications
	 *
	 * @param Request $request
	 * @param Response $response
	 * @return Response
	 * @throws Alert
	 * @author salvipascual
	 */
	public function _notificaciones(Request $request, Response $response)
	{
		// get all unread notifications
		$notifications = Database::query("
			SELECT id,icon,`text`,link,inserted
			FROM notification
			WHERE `to` = {$request->person->id} 
			AND service = 'bolita'
			AND `hidden` = 0
			ORDER BY inserted DESC");

		// if no notifications, let the user know
		if (empty($notifications)) {
			$content = [
				'header' => 'Nada por leer',
				'icon' => 'notifications_off',
				'text' => 'Por ahora usted no tiene ninguna notificación por leer.',
				'title' => 'Notificaciones'
			];

			$response->setLayout('bolita.ejs');
			return $response->setTemplate('message.ejs', $content, [], self::font());
		}

		foreach ($notifications as $noti) {
			$noti->inserted = strtoupper(date('d/m/Y h:ia', strtotime(($noti->inserted))));
		}

		// prepare content for the view
		$content = [
			'notifications' => $notifications,
			'title' => 'Notificaciones'
		];

		// build the response
		$response->setLayout('bolita.ejs');
		$response->setTemplate('notifications.ejs', $content);
	}

	/**
	 * Get support
	 *
	 * @param $email
	 *
	 * @return array
	 * @throws \Framework\Alert
	 * @throws \Exception
	 */
	public static function getSupportConversation($from_id, $requester_email): array
	{
		// get the list of messages
		$tickets = Database::query("
                        SELECT A.*, B.username 
                        FROM support_tickets A 
                        JOIN person B
                        ON A.from = B.email
                        WHERE A.from_id = $from_id 
                        OR A.requester = '$requester_email' 
                        ORDER BY A.creation_date ASC");

		// prepare chats for the view
		$chat = [];
		foreach ($tickets as $ticket) {
			$message = new stdClass();
			$message->class = $ticket->from === $email ? 'me' : 'you';
			$message->from = $ticket->username;
			$message->text = preg_replace(
				'/[\x00-\x1F\x7F]/u',
				'',
				$ticket->body
			);
			$message->date = date_format((new DateTime($ticket->creation_date)), 'd/m/Y h:i a');
			$message->status = $ticket->status;
			$chat[] = $message;
		}

		return $chat;
	}

	/**
	 * Show the soporte to ask questions
	 *
	 * @param Request $request
	 * @param Response $response
	 * @throws Alert
	 */
	public function _soporte(Request $request, Response $response)
	{
		$chat = self::getSupportConversation($request->person->id, $request->person->email);

		// send data to the view
		$response->setLayout('bolita.ejs');
		$response->setTemplate('soporte.ejs', ['messages' => $chat, 'myusername' => $request->person->username, 'title' => 'Soporte'], [], self::font());
	}

	/**
	 * Get cache file name
	 *
	 * @param $name
	 *
	 * @return string
	 */
	public static function getCacheFileName($name): string
	{
		return TEMP_PATH . 'cache/bolita_' . $name . '_' . date('Ymd') . '.tmp';
	}

	/**
	 * Load cache
	 *
	 * @param $name
	 * @param null $cacheFile
	 *
	 * @return bool|mixed
	 */
	public static function loadCache($name, &$cacheFile = null)
	{
		$data = null;
		$cacheFile = self::getCacheFileName($name);
		if (file_exists($cacheFile)) {
			$data = unserialize(file_get_contents($cacheFile));
		}
		return $data;
	}

	/**
	 * Save cache
	 *
	 * @param $name
	 * @param $data
	 * @param null $cacheFile
	 */
	public static function saveCache($name, $data, &$cacheFile = null)
	{
		$cacheFile = self::getCacheFileName($name);
		file_put_contents($cacheFile, serialize($data));
	}
}
