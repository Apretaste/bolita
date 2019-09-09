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
				$data=$this->update();

				// save cache file for today
				file_put_contents($cacheFile, json_encode($data));
			}
		} else {
			$data=$this->update(); //Request the data
			// save cache file for today
			file_put_contents($cacheFile, json_encode($data));
		}

		$results = [
			'fijoMid' => $data['pick3']['Midday'][2].$data['pick3']['Midday'][3],
			'fijoEve' => $data['pick3']['Evening'][2].$data['pick3']['Evening'][3],
			'centenaMid' => $data['pick3']['Midday'][1],
			'centenaEve' => $data['pick3']['Evening'][1],
			'Corrido1Mid' => $data['pick4']['Midday'][1].$data['pick4']['Midday'][2],
			'Corrido1Eve' => $data['pick4']['Evening'][1].$data['pick4']['Evening'][2],
			'Corrido2Mid' => $data['pick4']['Midday'][3].$data['pick4']['Midday'][4],
			'Corrido2Eve' => $data['pick4']['Evening'][3].$data['pick4']['Evening'][4],
			'fijoMidDate' => $this->dateToEsp($data['pick3']['Midday']['date']),
			'fijoEveDate' => $this->dateToEsp($data['pick3']['Evening']['date']),
			'Corrido1MidDate' => $this->dateToEsp($data['pick4']['Midday']['date']),
			'Corrido1EveDate' => $this->dateToEsp($data['pick4']['Evening']['date']),
			'Corrido2MidDate' => $this->dateToEsp($data['pick4']['Midday']['date']),
			'Corrido2EveDate' => $this->dateToEsp($data['pick4']['Evening']['date']),
			'fijoMidText' => $this->getCharadaText($data['pick3']['Midday'][2].$data['pick3']['Midday'][3]),
			'fijoEveText' => $this->getCharadaText($data['pick3']['Evening'][2].$data['pick3']['Evening'][3]),
			'Corrido1MidText' => $this->getCharadaText($data['pick4']['Midday'][1].$data['pick4']['Midday'][2]),
			'Corrido1EveText' => $this->getCharadaText($data['pick4']['Evening'][1].$data['pick4']['Evening'][2]),
			'Corrido2MidText' => $this->getCharadaText($data['pick4']['Midday'][3].$data['pick4']['Midday'][4]),
			'Corrido2EveText' => $this->getCharadaText($data['pick4']['Evening'][3].$data['pick4']['Evening'][4])
		];

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
		$charada = ["Caballo","Mariposa","Niñito","Gato","Monja","Tortuga","Caracol","Muerto","Elefante","Pescadote","Gallo","Mujer Santa","Pavo Real","Cementerio","Perro","Toro","San Lázaro","Pescadito","Lombriz","Gato Fino","Majá","Sapo","Vapor","Paloma","Piedra Fina","Anguila","Avispa","Chivo","Ratón","Camarón","Venado","Cochino","Tiñosa","Mono","Araña","Cachimba","Brujería","Dinero","Conejo","Cura","Lagartija","Pato","Alacrán","Año Del Cuero","Presidente","Humo Blanco","Pájaro","Cucaracha","Borracho","Policía","Soldado","Bicicleta","Luz Eléctrica","Flores","Cangrejo","Merengue","Cama","Retrato","Loco","Huevo","Caballote","Matrimonio","Asesino","Muerto Grande","Comida","Par De Yeguas","Puñalada","Cementerio","Relajo Grande","Coco","Río","Collar","Maleta","Papalote","Perro Mediano","Bailarina","Muleta De Sán Lázaro","Sarcófago","Coche","Médico","Teatro","Madre","Tragedia","Sangre","Espejo","Tijeras","Plátano","Muerto Vivo","Agua","Viejo","Limosnero","Puerco Gordo","Revolución","Mariposa Grande","Perro Grande","Escorpión","Mosquito","Bollo Grande","Serrucho","Automóvil"];

		$response->setCache('year');
		$response->setTemplate('charada.ejs', array('charada'=>$charada), $images);
	}

	/**
	 *
	 * @param String
	 * @return String
	 */
	 public function dateToEsp(String $text)
	 {
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
	 */
	function _anteriores(Request $request, Response $response)
	{
		date_default_timezone_set('America/Havana');

		// create a new client
		$client = new Client();
		$guzzle = $client->getClient();
		$client->setClient($guzzle);

		// load from cache if exists
		$cacheFile = Utils::getTempDir() . date("YmdG") . "_bolita_anteriores.tmp";
		if(file_exists($cacheFile)) $resultintext = file_get_contents($cacheFile);
		else {
			// create a crawler
			$crawler = $client->request('GET', "http://strictmath.com/info.php?P=LFBrowse&S=TOP:Results&V=8");
			$resultintext = $crawler->filter("body > div:nth-child(1) > table:nth-child(1)")->text();

			// save cache file for today
			file_put_contents($cacheFile, $resultintext);
		}

		//preparamos el texto para dividir los resultados mas facil despues
		$resultintext = str_replace(')', '~', $resultintext);
		$resultintext = preg_replace('/[^0-9A-Za-z\s~\/]+/', '', $resultintext); //eliminar caracteres extraños

		//extraemos los resultados de pick3
		$patternLastResultsP3 = "/PICK\s3\sCOMBINED(\d{3}\s{1,}\d{1,2}\/\d{1,2}\/\d{4}\s.{3}~)+/u"; //mod u para tratar con utf8
		$regexpmatch = preg_match($patternLastResultsP3, $resultintext, $matches);

		//si no hubo problemas al encontrar la expresion regular
		if (($regexpmatch != 0) && ($regexpmatch != false)) {
			$lastResultsP3inText = $matches[0];
			preg_match_all("/(\d{3}\s{1,}\d{1,2}\/\d{1,2}\/\d{4}\s.{3})/u", $lastResultsP3inText, $matches);

			$lastResultsP3 = [];
			foreach ($matches[0] as $value) {
				$value = preg_replace('/Mid/', 'Tarde ', $value); //traducimos a pie
				$value = preg_replace('/Eve/', 'Noche ', $value); //traducimos a pie
				$fijo = substr($value, 1, 2);
				$charada = $this->getCharadaText($fijo);
				//$value = substr_replace($value, '</span>', 3, 0); //para colocar los primeros 3 caract en rojo
				//$value = substr_replace($value, '<span style="color:red;">', 0, 0); //para colocar los primeros 3 caract en rojo
				$aux = substr($value, 0, 3); // numenro ganador
				$value = substr_replace($value, '', 0, 4);
				$value = substr_replace($value, $aux, strlen($value), 0);
				array_push($lastResultsP3, array('NumGanador' => $value, 'fijo' => $fijo, 'charada' => $charada));
			}
		} else {
			// Send an error notice to programmer
			Utils::createAlert("BOLITA: Error al leer los resultados pick3 anteriores", "ERROR");
		}

		//extraemos los resultados de pick4
		$patternLastResultsP4 = "/PICK\s4\sCOMBINED(\d{4}\s{1,}\d{1,2}\/\d{1,2}\/\d{4}\s.{3}~)+/u"; //mod u para tratar con utf8

		//$regexpmatch = preg_match_all($patternLastResultsP3, $resultintext, $matches);
		$regexpmatch = preg_match($patternLastResultsP4, $resultintext, $matches);

		//si no hubo problemas al encontrar la expresion regular
		if (($regexpmatch != 0) && ($regexpmatch != false)) {
			$lastResultsP4inText = $matches[0];
			preg_match_all("/(\d{4}\s{1,}\d{1,2}\/\d{1,2}\/\d{4}\s.{3})/u", $lastResultsP4inText, $matches);
			$lastResultsP4 = [];

			foreach ($matches[0] as $value) {
				$value = preg_replace('/Mid/', 'Tarde ', $value); //traducimos a pie
				$value = preg_replace('/Eve/', 'Noche ', $value); //traducimos a pie
				$corrido1 = substr($value, 0, 2);
				$corrido2 = substr($value, 2, 2);
				$charada1 = $this->getCharadaText($corrido1);
				$charada2 = $this->getCharadaText($corrido2);
				//$value = substr_replace($value, '</span>', 4, 0); //para colocar los primeros 4 caract en rojo
				//$value = substr_replace($value, '<span style="color:red;">', 0, 0); //para colocar los primeros 4 caract en rojo
				$aux = substr($value, 0, 4); // numenro ganador
				$value = substr_replace($value, '', 0, 5);
				$value = substr_replace($value, $aux, strlen($value), 0);
				array_push($lastResultsP4, array('NumGanador' => $value, 'corrido1' => $corrido1, 'charada1' => $charada1, 'corrido2' => $corrido2, 'charada2' => $charada2));
			}
		} else {
			// Send an error notice to programmer
			Utils::createAlert("BOLITA: Error al leer los resultados pick4 anteriores", "ERROR");
		}

		$responseContent = array("lastResultsP3" => $lastResultsP3, "lastResultsP4" => $lastResultsP4);
		$response->setCache("day");
		$response->setTemplate("anteriores.ejs", $responseContent);
	}

	private function getCharadaText($numGan)
	{
		$laCharada = ["Automóvil","Caballo","Mariposa","Niñito","Gato","Monja","Tortuga","Caracol","Muerto","Elefante","Pescadote","Gallo","Mujer Santa","Pavo Real","Cementerio","Perro","Toro","San Lázaro","Pescadito","Lombriz","Gato Fino","Majá","Sapo","Vapor","Paloma","Piedra Fina","Anguila","Avispa","Chivo","Ratón","Camarón","Venado","Cochino","Tiñosa","Mono","Araña","Cachimba","Brujería","Dinero","Conejo","Cura","Lagartija","Pato","Alacrán","Año Del Cuero","Presidente","Humo Blanco","Pájaro","Cucaracha","Borracho","Policía","Soldado","Bicicleta","Luz Eléctrica","Flores","Cangrejo","Merengue","Cama","Retrato","Loco","Huevo","Caballote","Matrimonio","Asesino","Muerto Grande","Comida","Par De Yeguas","Puñalada","Cementerio","Relajo Grande","Coco","Río","Collar","Maleta","Papalote","Perro Mediano","Bailarina","Muleta De Sán Lázaro","Sarcófago","Coche","Médico","Teatro","Madre","Tragedia","Sangre","Espejo","Tijeras","Plátano","Muerto Vivo","Agua","Viejo","Limosnero","Puerco Gordo","Revolución","Mariposa Grande","Perro Grande","Escorpión","Mosquito","Bollo Grande","Serrucho"];
		return ($laCharada[(int)$numGan]);
	}

	private function font()
	{
		return [Utils::getPathToService("escuela") . "/resources/Roboto-Medium.ttf"];
	}
}