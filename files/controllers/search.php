<?php

namespace Redux\Controllers;

use Slim\Views\Twig as View, Twig_SimpleFilter as custFunc;

class Search extends Controller {

	public function search($request, $response) {

		$formDataArry = $this->view->$request->getParsedBody();
		return $formDataArry;
	}

}