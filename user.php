<?php
session_start();
require "vendor/autoload.php";

use myPHPnotes\Microsoft\Auth;
use myPHPnotes\Microsoft\Handlers\Session;
use myPHPnotes\Microsoft\Models\User;

$microsoft = new Auth(Session::get("tenant_id"),Session::get("client_id"),  Session::get("client_secret"), Session::get("redirect_uri"), Session::get("scopes"));
$user = (new User); // User get pulled only if access token was generated for scope User.Read

echo $user->data->getGivenName();
$groups = $user->graph()->createRequest("get", "/me/memberOf")->execute()->getBody()["value"];
$ids = array_column($groups, 'id');
echo "<br>-------<br>";
var_dump($groups);
echo "<br>------<br>";
var_dump($ids);
echo "<br>------<br>";
if (in_array("cccc4f7e-ea3a-426b-a5e3-ba694b84a614", $ids)){
    echo "BEng!!!";
} else{
    echo "Not BEng!!!";
}