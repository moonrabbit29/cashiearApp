<?php

class User_auth {

    private $db;

    private $data; 

    public function __construct()
    {
        $this->db = new Database;
    }

    function validate_login($username,$password)
    {
        //prepare query 
        $query = 'SELECT * FROM staff WHERE username =:username AND password =:password';
        $this->db->query($query);
        $this->db->bind('username',$username);
        $this->db->bind('password',$password);

        $result = $this->db->single();
        if($result)
        {
            echo "tes berhasil";
        }
        else 
        {
            echo "failed";
        }
    }
}