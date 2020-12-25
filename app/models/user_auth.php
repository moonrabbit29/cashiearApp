<?php

class User_auth {

    private $table = 'april store';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
}