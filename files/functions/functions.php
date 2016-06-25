<?php
function getUUID($username) {
    if (strlen($username) >= 16) {
        return false;
    }
    $base = "https://api.mojang.com/users/profiles/minecraft/";
    $url = $base.$username;
    try {
	    $json = file_get_contents($url);
	} catch(Exception $ex) {
	    return "Invalid username!";
	}
    $data = json_decode($json, true);
    if(!isset($data['id'])) {
        return false;
    }
    if (isset($data['legacy'])) {
        return false;
    }
    if (isset($data['demo'])) {
        return false;
    }
    $uuid = $data['id'];
    $uuid_full = substr_replace(substr_replace(substr_replace(substr_replace($uuid, '-', 8, 0), '-', 13, 0), '-', 18, 0), '-', 23, 0);;
    return $uuid_full;
}