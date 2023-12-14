<?php

require_once 'config.php';

class Database{
    private $username;
    private $password;
    private $host;
    private $database;

    public function __construct(){
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->host = HOST;
        $this->database = DATABASE;
    }
}