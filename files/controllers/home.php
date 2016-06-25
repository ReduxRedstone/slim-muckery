<?php

namespace Redux\Controllers;

use Slim\Views\Twig as View, Twig_SimpleFilter as custFunc;

class Home extends Controller {

	public function index($request, $response) {
		$func = new custFunc('test', function ($string, $string2, $string3) {
			return $string." ".$string2." ".$string3;
		});
		$this->container->view->getEnvironment()->addFilter($func);
		return $this->view->render($response, "home.php");
	}
}