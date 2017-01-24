<?php

class Bolita extends Service
{

	include_once('simple_html_dom.php'); incluir este archivo en el directorio
	/**
	 * Function called once this service is called
	 * 
	 * @param Request
	 * @return Response
	 * */
	public function _main(Request $request)
	{
		// do not allow blank searches
		if(empty($request->query))
		{
			$response = new Response();
			$response->setResponseSubject("Debe insertar la palabra resultado");
			$response->createFromText("Usted no ha insertado ning&uacute;n texto a buscar Inserte el texto en el asunto del email, justo despu&eacute;s de la palabra Bolita.<br/><br/>Por ejemplo: Asunto: BOLITA resultado");
			return $response;
		}

		// find the right query 
		list($num1,$num2,$num3) = $this->search_numbers();
		if(count($resultado)==0)
		{
			$response = new Response();
			$response->setResponseSubject("Su busqueda no produjo resultados");
			$response->createFromText("Su b&uacute;squeda <b>{$request->query}</b> no fue encontrado ningun resultado. Por favor modifique el texto e intente nuevamente.");
			return $response;
		}
		
		$arrimg = array(0 => "00.jpg", 2 => "02.jpg", 3 => "03.jpg", 4 => "04.jpg", 6 => "06.jpg", 18 => "18.jpg", 43 => "43.jpg",  65 => "65.jpg" ); 

		
		// get the images to embed into the email
		$images = array(
			"{$this->pathToService}/imagenes/".$arrimg[$num1],
			"{$this->pathToService}/imagenes/".$arrimg[$num2],
			"{$this->pathToService}/imagenes/".$arrimg[$num3],
		);

		$path_img5 = 'imagenes/cuba.jpg';
		$type_img5 = pathinfo($path_img5, PATHINFO_EXTENSION);
		$data_img5 = file_get_contents($path_img5);
		$img5 = 'data:image/' . $type_img5 . ';base64,' . base64_encode($data_img5);

		
		// create a json object to send to the template
		$responseContent = array(
			"num1" => $num1,
			"num2" => $num2,
			"num3" => $num3,
			"fecha" => date('d-m-Y'),
			"img1" => "{$this->pathToService}/imagenes/".$arrimg[$num1],
			"img2" => "{$this->pathToService}/imagenes/".$arrimg[$num2],
			"img3" => "{$this->pathToService}/imagenes/".$arrimg[$num3],
			"img_logo" => $img5,
		);
		
		// send the response to the template 
		$response = new Response();
		$response->setResponseSubject("Bolita: {$page['title']}");
		$response->createFromTemplate("bolita.tpl", $responseContent, $images);
		return $response;
	}

	/**
	 * Search in flalottery
	 * 
	 * @author diorbispalencia
	 * @param String: text to search 
	 * @return Mixed: Corrected query OR false if the article was not found
	 */
	private function search_numbers()
	{
			//$html =  file_get_html('http://www.flalottery.com/http://www.flalottery.com/pick3');
			$html =  file_get_html('http://www.flalottery.com/pick3');
			//$html2 = file_get_html('http://www.flalottery.com/http://www.flalottery.com/pick4');
			$html2 = file_get_html('http://www.flalottery.com/pick4');


		// remove all image
		foreach($html->find('img, a, input, select, label, h1, table, h3, li, nav, footer, script, header, noscript, meta, link, h4') as $e)
			$e->outertext = '';

		foreach($html->find('.slide-out-div, #sitewideNavigation, .column1, #connectBar, #bodySectionTitle, .inputSection') as $e)
			$e->outertext = '';

		foreach($html2->find('img, a, input, select, label, h1, table, h3, li, nav, footer, script, header, noscript, meta, link, h4') as $e)
			$e->outertext = '';

		foreach($html2->find('.slide-out-div, #sitewideNavigation, .column1, #connectBar, #bodySectionTitle, .inputSection') as $e)
			$e->outertext = '';

		// replace all input
		// foreach($html->find('gamePageNumbers') as $e)
		//     $e->outertext = '[INPUT]';
		$contador=file_get_html('http://www.flalottery.com/http://www.flalottery.com/pick3')->plaintext;
		$str = substr($contador, 6720, 16);
		$pick3 =  str_replace('-', '',$str);

		$contador2=file_get_html('http://www.flalottery.com/http://www.flalottery.com/pick4')->plaintext;
		$pick4=substr($contador2, 6700, 16);

		$num1= intval(str_replace(" ",'',$pick3));
		$auxpick4 = trim(preg_replace('/ |-/','',$pick4));
		$num2 = intval(substr($auxpick4,0,2));
		$num3 = intval(substr($auxpick4,2,2));
		return array($num1,$num2,$num3);
	}

}
