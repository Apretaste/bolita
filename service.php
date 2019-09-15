<?php

use Goutte\Client;

class Service {
	/**
	 * Queremos que el servicio muestre el fijo y los corridos, los números que salieron y el elemento de la charada que
	 * representan.También debe haber una lista con los resultados previos (solo números) de los resultados de la bolita de días
	 * pasados.Hay dos sorteos diarios los cuales se mostrarán en el día en curso.
	 * Function executed when the service is called
	 *
	 * @param Request
	 * @param Response
	 */

	public const CHARADA = ["Caballo","Mariposa","Niñito","Gato","Monja","Tortuga","Caracol","Muerto","Elefante","Pescadote","Gallo","Mujer Santa","Pavo Real","Tigre","Perro","Toro","San Lázaro","Pescadito","Lombriz","Gato Fino","Majá","Sapo","Vapor","Paloma","Piedra Fina","Anguila","Avispa","Chivo","Ratón","Camarón","Venado","Cochino","Tiñosa","Mono","Araña","Cachimba","Brujería","Dinero","Conejo","Cura","Lagartija","Pato","Alacrán","Año Del Cuero","Tiburón","Humo Blanco","Pájaro","Cucaracha","Borracho","Policía","Soldado","Bicicleta","Luz Eléctrica","Flores","Cangrejo","Merengue","Cama","Retrato","Loco","Huevo","Caballote","Matrimonio","Asesino","Muerto Grande","Comida","Par De Yeguas","Puñalada","Cementerio","Relajo Grande","Coco","Río","Collar","Maleta","Papalote","Perro Mediano","Bailarina","Muleta De Sán Lázaro","Sarcófago","Tren de carga","Médicos","Teatro","Madre","Tragedia","Sangre","Reloj","Tijeras","Plátano","Espejuelos","Agua","Viejo","Limosnero","Globo alto","Sortija","Machete","Guerra","Reto","Mosquito","Piano","Serrucho", "Motel"];


	public function _main(Request $request, Response $response)
	{
		date_default_timezone_set('America/Havana');
		$pathToService = Utils::getPathToService($response->serviceName);

		// load from cache if exists
		$cacheFile = Utils::getTempDir() . date("Ymd") . "_bolita_today.tmp";
		if(file_exists($cacheFile)) {
			$data = json_decode(file_get_contents($cacheFile),true); //Load the data in json format
			if ($this->needUpdate($data['date'])) {
				//Request the data
				$data = $this->update();

				// save cache file for today
				file_put_contents($cacheFile, json_encode($data));
			}
		} else {
			$data = $this->update(); //Request the data
			// save cache file for today
			file_put_contents($cacheFile, json_encode($data));
		}

		$results = $this->resultsFromData($data);

		$images = ["$pathToService/images/results.png"];

		$response->setCache(360);
		$response->setTemplate('actual.ejs', ['results'=>$results], $images, $this->font());
	}

	/**
	 *
	 * @param String
	 * @return Boolean
	 */
	public function needUpdate(String $lastUpdate)
	{
		date_default_timezone_set('America/Havana');

		$date=substr($lastUpdate,0,8);
		$h=substr($lastUpdate,9,2);
		$m=substr($lastUpdate,12,2);
		if ($date==date('Ymd')) {
			switch (date('H')) {
				case '13':
					if ($h=='13') {
						if (($m>=30) and ((date('i')-$m)>=5)) {
							return true;
						}
						else return false;
					}
					else{
						return true;
					} 
					break;
				case '14':
					if ($h=='14') {
						if ((date('i')-$m)>=5) {
							return true;
						}
						else return false;
					}
					else return true;
					break;
				case '21':
					if ($h=='21') {
						
						if (($m>=45) and ((date('i')-$m)>=5)){
							return true;
						}
						else return false;
					}
					else{
						return true;
					} 
					break;
				case '22':
					if ($h=='22') {
						if ((date('i')-$m)>=5){
							return true;
						}
						else return false;
					}

					else {
						return true;
						
							}
					break;
				default:
					return false;
					break;
			}
		}
		else return true;
	}

	/**
	 *
	 * @return Array
	 */

	public function update()
	{
		date_default_timezone_set('America/Havana');

		// create a new client
		$client = new Client();
		$guzzle = $client->getClient();
		$client->setClient($guzzle);

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

		$data=[
			'pick3' => $pick3,
			'pick4' => $pick4,
			'date' => date("Ymd H:i")
		];
		return $data;
	}

	/**
	 *
	 * @param Request
	 * @param Response
	 */

	public function _charada(Request $request, Response $response)
	{
		$images = [];
		$pathToService = Utils::getPathToService($response->serviceName);
		for($i=1; $i<=100; $i++){
			$n = $i < 10 ? "0$i" : $i;
			$images[] = "$pathToService/images/$n.png";
		}

		$response->setCache('year');
		$response->setTemplate('charada.ejs', array('charada'=>self::CHARADA), $images);
	}

	/**
	 *
	 * @param String|array
	 * @return String|array
	 */
	 public function dateToEsp($text)
	 {
	 	if(is_array($text)) return $text;

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

		$extractos= explode(",",$text);
		$mes_dia=explode(" ",trim($extractos[1]));
		$d=$day[$extractos[0]];
		$m=$month[substr($mes_dia[0],0,3)];
		return ($d.', '.$m.' '.$mes_dia[1].' del '.$extractos[2]);
	}

	/**
	 * Subservice BOLITA anteriores
	 * @param Request $request
	 * @param Response $response
	 */
	public function _anteriores(Request $request, Response $response)
	{
		$date = $request->input->data->date ?? false;
		if ($date) {
			$cacheFile = Utils::getTempDir() . "results_" . str_replace('/', '-', $date) . "bolita.tmp";
			if (file_exists($cacheFile)) $data = json_decode(file_get_contents($cacheFile), true);
			else {
				$date = explode('/', $date);
				if(strlen($date[0]) < 2) $date[0] = '0'.$date[0];
				if(strlen($date[1]) < 2) $date[1] = '0'.$date[1];

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
					} else if ($item->filter('.balls')->count() == 4) {
						if ($item->filter('img[alt="Midday"]')->count() == 1) {
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

				if(!$data['pick3']['Midday']){
					$crawler->filter('.winningNumbers')->each(function ($item) use ($date, &$data) {
						if ($item->filter('.balls')->count() == 3) {
							$data['pick3']['Midday'] = [
								1 => $item->filter('.balls:nth-child(1)')->text(),
								2 => $item->filter('.balls:nth-child(3)')->text(),
								3 => $item->filter('.balls:nth-child(5)')->text(),
								'date' => $date
							];
						} else if ($item->filter('.balls')->count() == 4) {
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

				file_put_contents($cacheFile, json_encode($data));
			}

			$results = $this->resultsFromData($data);
		}

		$pathToService = Utils::getPathToService($response->serviceName);
		$images = ["$pathToService/images/results.png"];

		$response->setCache(360);
		$response->setTemplate('anteriores.ejs', ['results' => $results ?? false, 'date' => $date ?? false], $images, $this->font());
	}

	private function resultsFromData($data){
		$results = [];
		if($data['pick3']['Midday']){
			$results['fijoMid'] = $data['pick3']['Midday'][2].$data['pick3']['Midday'][3];
			$results['centenaMid'] = $data['pick3']['Midday'][1];
			$results['fijoMidDate'] = $this->dateToEsp($data['pick3']['Midday']['date']);
			$results['fijoMidText'] = self::CHARADA[$data['pick3']['Midday'][2].$data['pick3']['Midday'][3]];
		}

		if($data['pick4']['Midday']){
			$results['Corrido1Mid'] = $data['pick4']['Midday'][1].$data['pick4']['Midday'][2];
			$results['Corrido2Mid'] = $data['pick4']['Midday'][3].$data['pick4']['Midday'][4];
			$results['Corrido1MidDate'] = $this->dateToEsp($data['pick4']['Midday']['date']);
			$results['Corrido2MidDate'] = $this->dateToEsp($data['pick4']['Midday']['date']);
			$results['Corrido1MidText'] = self::CHARADA[$data['pick4']['Midday'][1].$data['pick4']['Midday'][2]];
			$results['Corrido2MidText'] = self::CHARADA[$data['pick4']['Midday'][3].$data['pick4']['Midday'][4]];
		}

		if($data['pick3']['Evening']){
			$results['fijoEve'] = $data['pick3']['Evening'][2].$data['pick3']['Evening'][3];
			$results['centenaEve'] = $data['pick3']['Evening'][1];
			$results['fijoEveDate'] = $this->dateToEsp($data['pick3']['Evening']['date']);
			$results['fijoEveText'] = self::CHARADA[$data['pick3']['Evening'][2].$data['pick3']['Evening'][3]];
		}

		if($data['pick4']['Evening']){
			$results['Corrido1Eve'] = $data['pick4']['Evening'][1].$data['pick4']['Evening'][2];
			$results['Corrido2Eve'] = $data['pick4']['Evening'][3].$data['pick4']['Evening'][4];
			$results['Corrido1EveDate'] = $this->dateToEsp($data['pick4']['Evening']['date']);
			$results['Corrido2EveDate'] = $this->dateToEsp($data['pick4']['Evening']['date']);
			$results['Corrido1EveText'] = self::CHARADA[$data['pick4']['Evening'][1].$data['pick4']['Evening'][2]];
			$results['Corrido2EveText'] = self::CHARADA[$data['pick4']['Evening'][3].$data['pick4']['Evening'][4]];
		}

		return $results;
	}

	private function font()
	{
		return [Utils::getPathToService("escuela") . "/resources/Roboto-Medium.ttf"];
	}
}