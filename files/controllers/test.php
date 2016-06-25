<?php

namespace Redux\Controllers;

use Slim\Views\Twig as View;

class Test extends Controller {

	public function index($request, $response) {
		$name = $request->getAttribute('name');
		return $this->view->render($response, "hello.php", array('name'=>$name));
	}
}