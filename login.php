<?php
session_start(); // Important
require "vendor/autoload.php";
require_once "conf.php";

use myPHPnotes\Microsoft\Auth;

$tenant = "common";
$scopes = [
"User.Read",
];
$callback_url = "https://pubnix.sinij.ca/callback.php";

$microsoft = new Auth($tenant, $CLIENT_ID,  $CLIENT_SECRET, $callback_url, $scopes);
