<?php
session_start(); // Important
require "vendor/autoload.php";
require_once "conf.php";

use myPHPnotes\Microsoft\Auth;

$tenant = "common";
$scopes = [
"User.Read",
];
$callback_url = "https://pubnix.sinij.ca/msCallback.php";

// INITIALIZATION
$microsoft = new Auth($tenant, $CLIENT_ID,  $callback_url, $REDIRECT_URI, $scopes);
echo($microsoft->getAuthUrl());
// header("location: ". $microsoft->getAuthUrl()); //Redirecting to get access token