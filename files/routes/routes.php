<?php

$app->get("/home", "homeCon:index");
$app->get("/home/", "homeCon:index");

$app->get("/", "homeCon:index");

$app->get('/player/{name}', "playerCon:index");
$app->get('/player', "playerCon:noName");
$app->get('/player/', "playerCon:noName");

$app->get('/hello/{name}', "helloCon:index");
$app->get('/hello', "helloCon:noName");
$app->get('/hello/', "helloCon:noName");

$app->get('/info', "infoCon:index");
$app->get('/info/', "infoCon:index");

/*$app->post("/search", "searchCon:search");*/

$app->post('/search', function ($request, $response) {
   $searchData = $request->getParsedBody();
   return "Searched for ".$searchData["data"];
});