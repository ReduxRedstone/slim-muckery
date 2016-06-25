<?php

namespace Redux\Controllers;

use Slim\Views\Twig as View;

class Hello extends Controller {

	public function index($request, $response) {

		$name = $request->getAttribute('name');
		$this->container->view->getEnvironment()->addGlobal('name', $name);
		return $this->view->render($response, "hello.php");
	}

	public function noName($request, $response) {

		$name = $request->getAttribute('name');
		$this->container->view->getEnvironment()->addGlobal('name', $name);
		return $this->view->render($response, "noName.php");
	}
}