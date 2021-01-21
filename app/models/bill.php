<?php

class Bill
{

    private $db;
    private $table = 'receipt';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function createBill($id, $amount)
    {
        echo $id;
        $amount = floatval($amount);
        $bill_date = date("Y-m-d");
        $query = "INSERT INTO " . $this->table . " VALUES('','$bill_date','$amount','$id')";
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
        for ($i = 1; $i <= $_POST['rowCount']; $i++) {
            $quantity = $string . "{$i}" . "-" . "quantity";
            $quantityValue = $_POST[$quantity];
            echo $quantityValue;
            $name = $string . "{$i}" . "-" . "name";
            $nameValue = $_POST[$name];
            $subtotal = $string . "{$i}" . "-" . "Subtotal";
            $subtotalValue = $_POST[$subtotal];
            $valuesArr[] = "('$bill_id','$quantityValue','$subtotalValue','$nameValue')";
        }
        $query = "INSERT INTO " . $table . " (bill_id,jumlah,subtotal,P_name) VALUES ";
        $query .= implode(',', $valuesArr);
        $this->db->query($query);
        $this->db->execute();
        if ($this->db->rowCount() > 0)
            return $valuesArr;
        else
            return [];
    }

    public function getAllBill($limita, $limitb)
    {
        if ($limita != 'awal' && $limitb != 'akhir')
            $query = "SELECT * FROM receipt limit $limita,$limitb";
        else
            $query = "SELECT * FROM receipt";
        $this->db->query($query);
        $data['bill'] = $this->db->resultSet();
        if ($data['bill']) {
            $arrayForBillDetail = array();
            foreach ($data['bill'] as $bill) {
                $arrayForBillDetail[] = "bill_id='$bill[bill_Id]'";
            }
            $query = "SELECT * FROM receipdetail WHERE ";
            $query .= implode('OR ', $arrayForBillDetail);
            $this->db->query($query);
            $data['billDetail'] = $this->db->resultSet();
            return $data;
        } else {
            $data['billDetail'] = array();
            return $data;
        }
    }

    public function getAllBillByCashierId($id, $limita, $limitb)
    {
        if ($limita != 'awal' && $limitb != 'akhir')
            $query = "SELECT * FROM receipt WHERE Id ='$id' limit $limita,$limitb";
        else
            $query = "SELECT * FROM receipt WHERE Id ='$id'";
        $this->db->query($query);
        $data['bill'] = $this->db->resultSet();
        if ($data['bill']) {
            $arrayForBillDetail = array();
            foreach ($data['bill'] as $bill) {
                $arrayForBillDetail[] = "bill_id='$bill[bill_Id]'";
            }
            $query = "SELECT * FROM receipdetail WHERE ";
            $query .= implode('OR ', $arrayForBillDetail);
            $this->db->query($query);
            $data['billDetail'] = $this->db->resultSet();
            return $data;
        } else {
            $data['billDetail'] = array();
            return $data;
        }
    }

    public function getBillById($id)
    {
        $query = "SELECT * FROM receipt WHERE bill_Id = '$id'";
        $this->db->query($query);
        $data['bill'] = $this->db->resultSet();
        $arrayForBillDetail = array();
        foreach ($data['bill'] as $bill) {
            $arrayForBillDetail[] = "bill_id='$bill[bill_Id]'";
        }
        $query = "SELECT * FROM receipdetail WHERE ";
        $query .= implode('OR ', $arrayForBillDetail);
        $this->db->query($query);
        $data['billDetail'] = $this->db->resultSet();
        return $data;
    }

    public function getBillByDateRange()
    {
        $awal = $_POST['StartDate'];
        $akhir = $_POST['EndDate'];
        $query = "SELECT * FROM receipt";
        $this->db->query($query);
        $dummy = $this->db->resultSet();
        $data['bill'] = array();
        $arrayForBillDetail = array();
        foreach ($dummy as $bill) {
            if ($bill['bill_date'] >= $awal && $bill['bill_date'] <= $akhir) {
                $data['bill'][] = $bill;
                $arrayForBillDetail[] = "bill_id='$bill[bill_Id]'";
            }
        }
        $query = "SELECT * FROM receipdetail WHERE ";
        $query .= implode('OR ', $arrayForBillDetail);
        $this->db->query($query);
        $data['billDetail'] = $this->db->resultSet();
        return $data;
    }

    function salesReport($data)
    {
        $awal = new DateTime($_POST['StartDate']);
        $akhir = new DateTime($_POST['EndDate']);
        $currentDate = $awal;
        $returnData['date'] = array();
        $returnData['total'] = 0;
        $total = 0;
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($awal, $interval, $akhir);
        $idx = 0;
        foreach ($period as $dt) {
            foreach ($data['bill'] as $d) {
                if ($d['bill_date'] == $dt->format('Y-m-d')) {
                    $total += $d['amount'];
                }
            }
            if($total!=0){
                $returnData['date'][$idx]['date'] = $dt->format('Y-m-d');
                $returnData['date'][$idx]['nominal'] = $total;
                $idx+=1;
            }  
            $returnData['total'] += $total;
            $total = 0;
        }
        return $returnData;
    }
}
