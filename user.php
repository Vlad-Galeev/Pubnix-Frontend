<?php
session_start();
require "vendor/autoload.php";

use myPHPnotes\Microsoft\Auth;
use myPHPnotes\Microsoft\Handlers\Session;
use myPHPnotes\Microsoft\Models\User;
// check cookies
if (is_null(Session::get("tenant_id"))) {
    // if not logged in
    // login logic
    echo "MS Login Here:";
    ?>
    <br><a href="/login.php">LOGIN</a>
    <?php
} else {
    $microsoft = new Auth(Session::get("tenant_id"),Session::get("client_id"),  Session::get("client_secret"), Session::get("redirect_uri"), Session::get("scopes"));
    $user = (new User); // User get pulled only if access token was generated for scope User.Read
    echo $user->data;
    $groups = $user->graph()->createRequest("get", "/me/memberOf")->execute()->getBody()["value"];
    $ids = array_column($groups, 'id');
    ?>
    <hr>
    <p>Username is <code><?php echo $user->data->getGivenName(); ?></code></p>
    <p id="conn_string">Connection command: <code>ssh <?php echo $_COOKIE['username']; ?>@pubnix.engsoc.net</code> <button onclick="myFunction()">Copy</button></p>
    <button>Reset Password</button>
    <?php
    // account doesnt exist
    ?>
    <hr>
    <p id="conn_string">Connection command: <code>ssh USERNAME@pubnix.engsoc.net</code></p>
    <button>Create Account</button>
    <?php
    // account banned
    ?>
    <hr>
    <h1 style="text-align: center;color: darkred">Account banned</h1>
    <?php
}