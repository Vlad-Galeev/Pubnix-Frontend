<?php
// ON CALLBACK
session_start();
require "vendor/autoload.php";

use myPHPnotes\Microsoft\Auth;
use myPHPnotes\Microsoft\Handlers\Session;
use myPHPnotes\Microsoft\Models\User;

$microsoft = new Auth(Session::get("tenant_id"),Session::get("client_id"),  Session::get("client_secret"), Session::get("redirect_uri"), Session::get("scopes"));
$tokens = $microsoft->getToken($_REQUEST['code'], Session::get("state"));

// Setting access token to the wrapper
$microsoft->setAccessToken($tokens->access_token);

$user = (new User); // User get pulled only if access token was generated for scope User.Read

echo $user->data->getGivenName();
$groups = $user->graph()->createRequest("get", "/me/memberOf")->execute()->getBody()["value"];
$ids = array_column($groups, 'id');
echo "<br>-------<br>";
var_dump($groups);
var_dump($ids);
echo "<br>H";
// header("location: user.php");