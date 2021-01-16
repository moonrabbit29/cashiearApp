<?php

class User_auth
{

    private $db;

    private $data;

    private $table;

    public function __construct()
    {
        $this->db = new Database;
        $this->table = 'staff';
    }

    function validate_login($username, $password)
    {
        //prepare query 
        $query = 'SELECT * FROM staff WHERE username =:username AND password =:password';
        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);

        $result = $this->db->single();
        if ($result) {
            $_SESSION['status'] = 'login';
            $_SESSION['staff_id'] = $result['Id'];
            //$_SESSION['nama'];
            $id = $result['Id'];
            $this->db->query("SELECT * FROM manager WHERE Id ='$id' ");
            $tes = $this->db->single();
            if ($tes) {
                $_SESSION['priviledge'] = 'Manager';
                $_SESSION['id'] = $result['Id'];
                $_SESSION['address'] = $tes['M_address'];
                $_SESSION['name'] = $tes['M_name'];
            } else {
                $this->db->query("SELECT * FROM cashier WHERE Id ='$id' ");
                $tes = $this->db->single();
                $_SESSION['name'] = $tes['c_name'];
                $_SESSION['priviledge'] = 'Cashier';
                $_SESSION['id'] = $result['Id'];
                $_SESSION['address'] = $tes['C_address'];
            }
            return 1;
        } else {
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
        $var = ($_SESSION['priviledge'] == 'Manager') ? true : false;
        return $var;
    }

    function newCashier()
    {
        $query = "INSERT INTO " . $this->table . " (username,password) VALUES(:username, :password)";
        $this->db->query($query);
        $this->db->bind('username', $_POST['username']);
        $this->db->bind('password', $_POST['password']);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            $query = "INSERT INTO cashier (c_name,C_address) VALUES(:name,:address)";
            $this->db->query($query);
            $this->db->bind('name', $_POST['c_name']);
            $this->db->bind('address', $_POST['c_address']);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    function editUser($id)
    {
        $query = "UPDATE staff SET username=:username,password=:password where Id='$id'";
        $this->db->query($query);
        $this->db->bind('username', $_POST['username']);
        $this->db->bind('password', $_POST['password']);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            if ($id == 1)
                $query = "UPDATE manager M_address=:address,M_name=:name";
            else
                $query = "UPDATE manager C_address=:address,c_name=:name";

            $this->db->query($query);
            $this->db->bind('address', $_POST['M_address']);
            $this->db->bind('name', $_POST['M_name']);
            $this->db->execute();
            return $this->db->rowCount();
        } else {
            echo "failed";
        }
    }
}
