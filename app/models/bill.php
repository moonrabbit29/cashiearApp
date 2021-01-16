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
        $amount = floatval($amount);
        $bill_date = date("Y-m-d"); 
        $query = "INSERT INTO " .$this->table ." VALUES('','$bill_date','$id','$amount')";
        $this->db->query($query);
        $result = $this->db->execute();
        return $result;
    }

    public function billDetail($bill_id)
    {
        /*post item :
            1. name
            2. quantity
            3. Subtotal
        */

        $string = "item";
        $table = "receipdetail";
        $valuesArr = array();
        for($i=1;$i<=$_POST['rowCount'];$i++)
        {
            $quantity = $string."{$i}"."-"."quantity";
            $quantityValue = $_POST[$quantity];
            echo $quantityValue;
            $name = $string."{$i}"."-"."name";
            $nameValue = $_POST[$name];
            $subtotal = $string."{$i}"."-"."Subtotal";
            $subtotalValue = $_POST[$subtotal];
            $valuesArr[] = "('$bill_id','$quantityValue','$subtotalValue','$nameValue')";
        }
        $query = "INSERT INTO ". $table . " (bill_id,jumlah,subtotal,P_name) VALUES ";
        $query.=implode(',',$valuesArr);
        $this->db->query($query);
        $this->db->execute();
        if($this->db->rowCount()>0)
        return $valuesArr;
        else 
        return [];
    }

    public function getAllBill()
    {
        $query = "SELECT * FROM receipt";
        $this->db->query($query);
        $data['bill'] = $this->db->resultSet();
        $arrayForBillDetail = array();
        foreach ($data['bill'] as $bill){
            $arrayForBillDetail[] = "bill_id='$bill[bill_Id]'";
        }
        $query = "SELECT * FROM receipdetail WHERE ";
        $query.=implode('OR ',$arrayForBillDetail);
        $this->db->query($query);
        $data['billDetail'] = $this->db->resultSet();
        return $data;
    }

    public function getAllBillByCashierId($id)
    {
        $query = "SELECT * FROM receipt WHERE Id = '$id'";
        $this->db->query($query);
        $data['bill'] = $this->db->resultSet();
        $arrayForBillDetail = array();
        foreach ($data['bill'] as $bill){
            $arrayForBillDetail[] = "bill_id='$bill[bill_Id]'";
        }
        $query = "SELECT * FROM receipdetail WHERE ";
        $query.=implode('OR ',$arrayForBillDetail);
        $this->db->query($query);
        $data['billDetail'] = $this->db->resultSet();
        return $data;
    }

    public function getBillById($id)
    {
        $query = "SELECT * FROM receipt WHERE bill_Id = '$id'";
        $this->db->query($query);
        $data['bill'] = $this->db->resultSet();
        $arrayForBillDetail = array();
        foreach ($data['bill'] as $bill){
            $arrayForBillDetail[] = "bill_id='$bill[bill_Id]'";
        }
        $query = "SELECT * FROM receipdetail WHERE ";
        $query.=implode('OR ',$arrayForBillDetail);
        $this->db->query($query);
        $data['billDetail'] = $this->db->resultSet();
        return $data;
    }
}
