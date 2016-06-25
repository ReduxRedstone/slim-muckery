<?php
session_start();

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require("../vendor/autoload.php");

$host = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'citforumTest';

$configDB = array("host"=>$host,"user"=>$dbuser,"pass"=>$dbpass,"name"=>$dbname);
$settingsSlim = array("displayErrorDetails" => true);
$configSlim = array("settings"=>$settingsSlim);

$config = array('slim' => $configSlim, 'database' => $configDB);

$app = new \Slim\App($config["slim"]);

$container = $app->getContainer();

require('../files/containers/containers.php');
require('../files/functions/functions.php');
require("../files/routes/routes.php");