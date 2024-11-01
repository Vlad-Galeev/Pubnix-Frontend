<?php
include_once "conf.php";
class dbHandler
{
    public function __construct()
    {
        // Connect to DB and save connection variables
    }

    public function fetchUser(){
        // Get user from database
        // Return username, status
    }

    public function createUser(){
        // Creates user with a randomly generated password
        // Return temp password
    }

    public function resetUser(){
        // Resets user password
        // Returns temp password
    }

    private function encryptString($string){

    }
}