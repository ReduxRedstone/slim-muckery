<?php

namespace Redux\Controllers;

use Slim\Views\Twig as View, Twig_SimpleFilter as custFunc;

class Info extends Controller {

	public function index($request, $response) {
		$func = new custFunc('test', function ($array) {
			for ($a=0; $a < count($array); $a++) { 
				echo $array[$a]."<br>";
			}
		});

		$array = array(0=>"date",1=>"test",2=>"test2");

		$this->container->view->getEnvironment()->addFilter($func);
		$this->container->view->getEnvironment()->addGlobal("arr", $array);
		return $this->view->render($response, "info.php");
	}

}