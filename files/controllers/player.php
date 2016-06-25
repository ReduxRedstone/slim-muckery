<?php

namespace Redux\Controllers;

use Slim\Views\Twig as View, Twig_SimpleFilter as custFunc, PDO as PDO;

class Player extends Controller {

	public function index($request, $response) {

		$name = $request->getAttribute('name');
		$uuid = getUUID($name);

		$func = new custFunc('getPlayerData', function ($string) {
			$host = 'localhost';
			$dbuser = 'root';
			$dbpass = '';
			$dbname = 'citforumTest';

		    $dbh = new PDO("mysql:host=".$host.";dbname=".$dbname,$dbuser,$dbpass);
		    $query = $dbh->prepare("SELECT * FROM users WHERE user_uuid = '$string'");
			try {
				$query->execute();
			}
			catch(PDOException $e) {
				die($e->getMessage());
			}
			$results = $query->fetchAll();

			if (!empty($results)) {
				foreach($results as $row) {
		       		echo $row['user_name_current'].' has a UUID of '.$row['user_uuid'].', is perm-level '.$row['user_perms'].', is in class '.$row['user_class'].' and is in group '.$row['user_group'].'<br>';
		    	}
			} else {
				return "user not in database";
			}
		    
		    $dbh = null;
		});

		$this->container->view->getEnvironment()->addGlobal('name', $name);
		$this->container->view->getEnvironment()->addGlobal('uuid', $uuid);
		$this->container->view->getEnvironment()->addFilter($func);
		return $this->view->render($response, "player.php");
	}

	public function noName($request, $response) {

		$name = $request->getAttribute('name');
		$this->container->view->getEnvironment()->addGlobal('name', $name);
		return $this->view->render($response, "noName.php");
	}
}