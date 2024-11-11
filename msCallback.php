<?php
// ON CALLBACK
session_start();
require "vendor/autoload.php";

use myPHPnotes\Microsoft\Auth;
use myPHPnotes\Microsoft\Handlers\Session;
use myPHPnotes\Microsoft\Models\User;
use myPHPnotes\Microsoft\Models\BetterUser;

$microsoft = new Auth(Session::get("tenant_id"),Session::get("client_id"),  Session::get("client_secret"), Session::get("redirect_uri"), Session::get("scopes"));
$tokens = $microsoft->getToken($_REQUEST['code'], Session::get("state"));

// Setting access token to the wrapper
$microsoft->setAccessToken($tokens->access_token);

$user = (new User); // User get pulled only if access token was generated for scope User.Read

echo "<br>";
echo $user->data->getGivenName();
echo "<br>";
echo $user->data["_propDict"];
echo "<br>";
echo $user->data->getOnPremisesImmutableId();
echo "<br>-------";
$betterUser = (new BetterUser);
echo $betterUser->data;
// https://graph.microsoft.com/v1.0/me/memberOf

// header("location: user.php");