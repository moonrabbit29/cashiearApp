<?php

class Bill
{

    private $db;
    private $table = 'receipt';
    public function __construct()
    {
        $this->db = new Database;
    }

    public function createBill($id,$amount)
    {
        $bill_date = date("Y-m-d H:i:s"); 
        $query = "INSERT INTO" . $this->table . "VALUES('','$bill_date','$id','$amount')";
        $this->db->query($query);
        $result = $this->db->execute();
        return $result;
    }
}
