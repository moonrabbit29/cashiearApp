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
            $_SESSION['status'] = 'login';
            $_SESSION['staff_id'] = $result['Id'];
            $_SESSION['nama'];
            $id = $result['id'];
            $this->db->query("SELECT * FROM manager WHERE Id ='$id' ");
            if($this->db->single())
            {
                $_SESSION['priviledge'] = 'Manager';
                $_SESSION['id'] = $result['Id'];
            }else
            {
                $_SESSION['priviledge'] = 'Cashier';
                $_SESSION['id'] = $result['Id'];
            }
            return 1;
        }
        else 
        {
            echo "failed";
            return 0;
        }
    }

    function isLogin()
    {
        $var = isset($_SESSION['status']) ? true : false;
        return $var;
    }
    
    function isManager()
    {
        $var = ($_SESSION['priviledge'] =='Manager') ? true : false;
        return $var;
    }
}