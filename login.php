<?php
session_start(); // Important
require "vendor/autoload.php";
require_once "conf.php";

use myPHPnotes\Microsoft\Auth;

$tenant = "common";
$scopes = [
"User.Read",
];

// INITIALIZATION
$microsoft = new Auth($tenant, $CLIENT_ID,  $CLIENT_SECRET, $REDIRECT_URI, $scopes);
header("location: ". $microsoft->getAuthUrl()); //Redirecting to get access token