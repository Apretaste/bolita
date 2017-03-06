<?php

 use Goutte\Client;

class Bolita extends Service {
	/**
	 * Queremos que el servicio muestre el fijo y los corridos, los números que salieron y el elemento de la charada que
	 * representan.También debe haber una lista con los resultados previos (solo números) de los resultados de la bolita de días
	 * pasados.Hay dos sorteos diarios los cuales se mostrarán en el día en curso.
	 * Function executed when the service is called
	 *
	 * @param Request
	 * @return Response
	 * */
	public function _main(Request $request)
	{
		// create a new client
		$client = new Client();
		$guzzle = $client->getClient();
		$guzzle->setDefaultOption('verify', false);
		$client->setClient($guzzle);

		//variables para el servicio que provee los resultados
		$tb_state = 'FL';
		$tb_links = '';
		$tb_country='US';
		$tb_lang = 1;
		$tb_ads_url = '';

		// load from cache if exists
		$cacheFile = $this->utils->getTempDir() . date("YmdG") . "_bolita_today.tmp";

		if(file_exists($cacheFile)) $resultintext = file_get_contents($cacheFile);
		else
		{
			// create a crawler and get the text file
			$crawler = $client->request('GET', "https://www.lotteryinformation.us/redirect.php?tb_state=".$tb_state."&tb_links=".$tb_links."&tb_country=".$tb_country."&tb_lang=".$tb_lang."&adsurl=".$tb_ads_url);
			$resultintext = $crawler->filter('div.roundbox:nth-child(8) > center:nth-child(1)')->text();

			// save cache file for today
			file_put_contents($cacheFile, $resultintext);
		}

		//extraemos los resultados del mediodia en texto
		$patternResultsMed = "/Med.{5}:{1}\s{1}.{3}\s{1}\d{1,2}\/\d{1,2}\/\d{4}\s{2}[\d{1}\s{1}]{3,}/u"; //mod u para tratar con utf8
		$regexpmatch = preg_match_all($patternResultsMed, $resultintext, $matches);

		if (($regexpmatch != 0) && ($regexpmatch != false)){ //si no hubo problemas al encontrar la expresion regular
			$result_Pick3Med = $matches[0][0];// texto completo del pick3 mediodia
			$result_Pick4Med = $matches[0][1]; // texto completo del pick4 mediodia

			//extraemos los numeros ganadores del medio dia

			$numGan_Pick3Med = preg_replace('/[^0-9]+/', '', substr($result_Pick3Med,-7)); //eliminar todo lo que no sea numero de los ult 7 ca
			$elFijoMed = substr($numGan_Pick3Med, 1); //despues del 1er car hasta el final, son tres, serian los ultimos 2

			$numGan_Pick4Med = preg_replace('/[^0-9]+/', '', substr($result_Pick4Med,-10));//eliminar todo lo que no sea numero de los ult 10 c
			$elCorrido1Med = substr($numGan_Pick4Med, 0, 2); //desde el inicio, 2 caracteres
			$elCorrido2Med = substr($numGan_Pick4Med, 2, 2); //desde el segundo caracter, 2 caracteres

			$fecha_Pick3Med = substr($result_Pick3Med, 0, 24);
			$fecha_Pick3Med = preg_replace('/Mediodía/', 'Tarde', $fecha_Pick3Med); //cambiamos Mediodía por Tarde
			$fecha_Pick4Med = substr($result_Pick4Med, 0, 24);
			$fecha_Pick4Med = preg_replace('/Mediodía/', 'Tarde', $fecha_Pick4Med); //cambiamos Mediodía por Tarde
		}else{
			// Send an error advice to programmer
			$response = new Response();
			$response->setResponseEmail("jaikerkings@yahoo.es");
			$response->setResponseSubject("Error al leer los resultados del mediodia p3 y p4!");
			$response->createFromText($resultintext);
			return $response;
		}

		//extraemos los resultados de la tarde en texto
		$patternResultsTar = "/Tar.{2}:{1}\s{1}.{3}\s{1}\d{1,2}\/\d{1,2}\/\d{4}\s{2}[\d{1}\s{1}]{3,}/u"; //mod u para tratar con utf8
		$regexpmatch = preg_match_all($patternResultsTar, $resultintext, $matches);

		if (($regexpmatch != 0) && ($regexpmatch != false)){ //si no hubo problemas al encontrar la expresion regular
			$result_Pick3Tar =  $matches[0][0];// texto completo del pick3 de la tarde
			$result_Pick4Tar = $matches[0][1]; // texto completo del pick4 de la tarde

			//extraemos los numeros ganadores
			$numGan_Pick3Tar = preg_replace('/[^0-9]+/', '', substr($result_Pick3Tar,-7)); //eliminar todo lo que no sea numero de los ult 7 ca
			$elFijoTar = substr($numGan_Pick3Tar, 1); //despues del 1er car hasta el final, son tres, serian los ultimos 2

			$numGan_Pick4Tar = preg_replace('/[^0-9]+/', '', substr($result_Pick4Tar,-10));//eliminar todo lo que no sea numero de los ult 10 c
			$elCorrido1Tar = substr($numGan_Pick4Tar, 0, 2); //desde el inicio, 2 caracteres
			$elCorrido2Tar = substr($numGan_Pick4Tar, 2, 2); //desde el segundo caracter, 2 caracteres

			$fecha_Pick3Tar = substr($result_Pick3Tar, 0, 20);
			$fecha_Pick3Tar = preg_replace('/Tarde/', 'Noche', $fecha_Pick3Tar); //cambiamos Tarde por Noche
			$fecha_Pick4Tar = substr($result_Pick4Tar, 0, 20);
			$fecha_Pick4Tar = preg_replace('/Tarde/', 'Noche', $fecha_Pick4Tar); //cambiamos Tarde por Noche
		}else{
			// Send an error advice to programmer
			$response = new Response();
			$response->setResponseEmail("jaikerkings@yahoo.es");
			$response->setResponseSubject("Error al leer los resultados de la tarde p3 y p4!");
			$response->createFromText($resultintext);
			return $response;
		}

		//extraemos las fechas de los siguientes sorteos en texto
		$patternSigTirada = "/Sig.{13}:{1}\s{1}.{3}\s{1}\d{1,2}\/\d{1,2}/u"; //mod u para tratar con utf8
		$regexpmatch = preg_match_all($patternSigTirada, $resultintext, $matches);

		if (($regexpmatch != 0) && ($regexpmatch != false)){ //si no hubo problemas al encontrar la expresion regular
			$sigTir_Pick3Med =  $matches[0][0];// porción1
			$sigTir_Pick4Med = $matches[0][1]; // porción2
			$sigTir_Pick3Tar =  $matches[0][2];// porción3
			$sigTir_Pick4Tar =  $matches[0][3];// porción4
		}else{
			$sigTir_Pick3Med = "error";
		}

		// create a json object to send to the template
		$responseContent = array(
			"fecha_Pick3Med" => $fecha_Pick3Med,
			"numGan_Pick3Med" => $numGan_Pick3Med,
			"sigTir_Pick3Med" => $sigTir_Pick3Med,
			"elFijoMed" => $elFijoMed,
			"charadaText_Pick3Med" => $this->getCharadaText($elFijoMed),
			"fecha_Pick4Med" => $fecha_Pick4Med,
			"numGan_Pick4Med" => $numGan_Pick4Med,
			"sigTir_Pick4Med" => $sigTir_Pick4Med,
			"elCorrido1Med" => $elCorrido1Med,
			"charadaText1_Pick4Med" => $this->getCharadaText($elCorrido1Med),
			"elCorrido2Med" => $elCorrido2Med,
			"charadaText2_Pick4Med" => $this->getCharadaText($elCorrido2Med),
			"fecha_Pick3Tar" => $fecha_Pick3Tar,
			"numGan_Pick3Tar" => $numGan_Pick3Tar,
			"sigTir_Pick3Tar" => $sigTir_Pick3Tar,
			"elFijoTar" => $elFijoTar,
			"charadaText_Pick3Tar" => $this->getCharadaText($elFijoTar),
			"fecha_Pick4Tar" => $fecha_Pick4Tar,
			"numGan_Pick4Tar" => $numGan_Pick4Tar,
			"sigTir_Pick4Tar" => $sigTir_Pick4Tar,
			"elCorrido1Tar" => $elCorrido1Tar,
			"charadaText1_Pick4Tar" => $this->getCharadaText($elCorrido1Tar),
			"elCorrido2Tar" => $elCorrido2Tar,
			"charadaText2_Pick4Tar" => $this->getCharadaText($elCorrido2Tar),

			"imgElFijoMed" => "{$this->pathToService}/images/$elFijoMed.png",
			"imgCorrido1Med" => "{$this->pathToService}/images/$elCorrido1Med.png",
			"imgCorrido2Med" => "{$this->pathToService}/images/$elCorrido2Med.png",
			"imgElFijoTar" => "{$this->pathToService}/images/$elFijoTar.png",
			"imgCorrido1Tar" => "{$this->pathToService}/images/$elCorrido1Tar.png",
			"imgCorrido2Tar" => "{$this->pathToService}/images/$elCorrido2Tar.png"
		);

		// get the images to embed into the email
		$images = array(
			"imgElFijoMed" => "{$this->pathToService}/images/$elFijoMed.png",
			"imgCorrido1Med" => "{$this->pathToService}/images/$elCorrido1Med.png",
			"imgCorrido2Med" => "{$this->pathToService}/images/$elCorrido2Med.png",
			"imgElFijoTar" => "{$this->pathToService}/images/$elFijoTar.png",
			"imgCorrido1Tar" => "{$this->pathToService}/images/$elCorrido1Tar.png",
			"imgCorrido2Tar" => "{$this->pathToService}/images/$elCorrido2Tar.png"
		);

		// create the response
		$response = new Response();
		$response->setResponseSubject("Resultados de la bolita hasta este momento.");
		$response->createFromTemplate("actual.tpl", $responseContent, $images);
		return $response;
	}

	/**
	 * Subservice BOLITA anteriores
	 * */
	function _anteriores(Request $request)
	{
		// create a new client
		$client = new Client();
		$guzzle = $client->getClient();
		$guzzle->setDefaultOption('verify', false);
		$client->setClient($guzzle);


		// load from cache if exists
		$cacheFile = $this->utils->getTempDir() . date("YmdG") . "_bolita_anteriores.tmp";
		if(file_exists($cacheFile)) $resultintext = file_get_contents($cacheFile);
		else
		{
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

		if (($regexpmatch != 0) && ($regexpmatch != false)){ //si no hubo problemas al encontrar la expresion regular
			$lastResultsP3inText = $matches[0];
			preg_match_all("/(\d{3}\s{1,}\d{1,2}\/\d{1,2}\/\d{4}\s.{3})/u", $lastResultsP3inText, $matches);
			//$resultintext = implode(";", $matches[0]);
			$lastResultsP3 = array();
			foreach ($matches[0] as $value){
				$value = preg_replace('/Mid/', 'Tarde ', $value); //traducimos a pie
				$value = preg_replace('/Eve/', 'Noche', $value); //traducimos a pie
				$fijo = substr($value, 1, 2);
				$charada = $this->getCharadaText($fijo);
				//$value = substr_replace($value, '</span>', 3, 0); //para colocar los primeros 3 caract en rojo
				//$value = substr_replace($value, '<span style="color:red;">', 0, 0); //para colocar los primeros 3 caract en rojo
				$aux = ": <span style='color:red;'>".substr($value, 0, 3)."</span>"; // numenro ganador
				$value = substr_replace($value, '', 0, 4);
				$value = substr_replace($value, $aux, strlen($value), 0);
				array_push($lastResultsP3, array('NumGanador' => $value, 'fijo' => $fijo, 'charada' => $charada));
			}
		}

		//extraemos los resultados de pick4
		$patternLastResultsP4 = "/PICK\s4\sCOMBINED(\d{4}\s{1,}\d{1,2}\/\d{1,2}\/\d{4}\s.{3}~)+/u"; //mod u para tratar con utf8
		//$regexpmatch = preg_match_all($patternLastResultsP3, $resultintext, $matches);
		$regexpmatch = preg_match($patternLastResultsP4, $resultintext, $matches);

		if (($regexpmatch != 0) && ($regexpmatch != false)){ //si no hubo problemas al encontrar la expresion regular
			$lastResultsP4inText = $matches[0];
			preg_match_all("/(\d{4}\s{1,}\d{1,2}\/\d{1,2}\/\d{4}\s.{3})/u", $lastResultsP4inText, $matches);
			$lastResultsP4 = array();
			foreach ($matches[0] as $value){
				$value = preg_replace('/Mid/', 'Tarde ', $value); //traducimos a pie
				$value = preg_replace('/Eve/', 'Noche', $value); //traducimos a pie
				$corrido1 = substr($value, 0, 2);
				$corrido2 = substr($value, 2, 2);
				$charada1 = $this->getCharadaText($corrido1);
				$charada2 = $this->getCharadaText($corrido2);
				//$value = substr_replace($value, '</span>', 4, 0); //para colocar los primeros 4 caract en rojo
				//$value = substr_replace($value, '<span style="color:red;">', 0, 0); //para colocar los primeros 4 caract en rojo
				$aux = ": <span style='color:red;'>".substr($value, 0, 4)."</span>"; // numenro ganador
				$value = substr_replace($value, '', 0, 5);
				$value = substr_replace($value, $aux, strlen($value), 0);
				array_push($lastResultsP4, array('NumGanador' => $value, 'corrido1' => $corrido1, 'charada1' => $charada1, 'corrido2' => $corrido2, 'charada2' => $charada2));
			}
		}

		$responseContent = array(
			"lastResultsP3" => $lastResultsP3,
			"lastResultsP4" => $lastResultsP4
		);
		$response = new Response();
		$response->setResponseSubject("Resultados anteriores de la bolita.");
		$response->createFromTemplate("anteriores.tpl", $responseContent);
		return $response;
	}

	private function getCharadaText($numGan)
	{
		$laCharada = array("Autom&oacute;vil","Caballo","Mariposa","Niñito","Gato","Monja","Tortuga","Caracol","Muerto","Elefante","Pescadote","Gallo","Mujer Santa","Pavo Real","Cementerio","Perro","Toro","San L&aacute;zaro","Pescadito","Lombriz","Gato Fino","Maj&aacute;","Sapo","Vapor","Paloma","Piedra Fina","Anguila","Avispa","Chivo","Rat&oacute;n","Camar&oacute;n","Venado","Cochino","Tiñosa","Mono","Ara&ntilde;a","Cachimba","Brujer&iacute;a","Dinero","Conejo","Cura","Lagartija","Pato","Alacr&aacute;n","Año Del Cuero","Presidente","Humo Blanco","P&aacute;jaro","Cucaracha","Borracho","Polic&iacute;a","Soldado","Bicicleta","Luz El&eacute;ctrica","Flores","Cangrejo","Merengue","Cama","Retrato","Loco","Huevo","Caballote","Matrimonio","Asesino","Muerto Grande","Comida","Par De Yeguas","Puñalada","Cementerio","Relajo Grande","Coco","R&iacute;o","Collar","Maleta","Papalote","Perro Mediano","Bailarina","Muleta De S&aacute;n L&aacute;zaro","Sarc&oacute;fago","Coche","M&eacute;dico","Teatro","Madre","Tragedia","Sangre","Espejo","Tijeras","Pl&aacute;tano","Muerto Vivo","Agua","Viejo","Limosnero","Puerco Gordo","Revoluci&oacute;n","Mariposa Grande","Perro Grande", "Escorpi&oacute;n", "Mosquito", "Bollo Grande", "Serrucho");
		return ($laCharada[(int)$numGan]);
	}
}
