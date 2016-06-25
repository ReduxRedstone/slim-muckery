<?php

$container['db'] = function ($config) {
    $db = $config['database'];
    $pdo = new PDO("mysql:host=".$db['host'].";dbname=".$db['name'],$db['user'],$db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$container['view'] = function ($container) {
	$view = new \Slim\Views\Twig("../files/views", [
		"cache" => false,
	]);
	$view->addExtension(new \Slim\Views\TwigExtension(
		$container->router,
		$container->request->getUri()
	));
	return $view;
};

$container['homeCon'] = function ($container) {
	return new \Redux\Controllers\Home($container);
};

$container['playerCon'] = function ($container) {
	return new \Redux\Controllers\Player($container);
};

$container['helloCon'] = function ($container) {
	return new \Redux\Controllers\Hello($container);
};

$container['infoCon'] = function ($container) {
	return new \Redux\Controllers\Info($container);
};

$container['searchCon'] = function ($container) {
	return new \Redux\Controllers\Search($container);
};