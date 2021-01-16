<?php

class History extends Controller
{
    private $bill;
    private $data;
    public function __construct()
    {
        $this->bill = $this->model('Bill');
    }

    public function index()
    {
        if($_SESSION['priviledge'] == 'Manager')
        {
            $data['bill'] = $this->bill->getAllBill();
        }else
        {
            $data['bill'] = $this->bill->getAllBillByCashierId($_SESSION['id']);
        }
        $this->data = $data;
        $this->view('templates/cashier/header');
        $this->view('history/index', $data);
        $this->view('templates/cashier/footer');
    }
    public function sortByDate($comand)
    {
        $data['bill'] = $this->bill->getAllBillByCashierId($_SESSION['id']);
        $new = usort($data['bill']['bill'], function ($a1, $a2) use ($comand) {
            $v1 = strtotime($a1['bill_date']);
            $v2 = strtotime($a2['bill_date']);
            print_r( $v2);
            if ($comand == 'reverse') {
                return $v2 - $v1;
            } else {
                return $v1 - $v2;
            }
        });
        $this->view('templates/cashier/header');
        $this->view('history/index', $data);
        $this->view('templates/cashier/footer');
    }

    public function search()
    {
        $data['bill'] =$this->bill->getBillById($_POST['BillSearch']);
        if($data)
        {
            $this->view('templates/cashier/header');
            $this->view('history/index', $data);
            $this->view('templates/cashier/footer');  
        }else
        {
            //flash message
            echo "failed";
        }
    }

    public function getBillByDate()
    {
        $data['bill'] = $this->bill->getBillByDateRange();
    }
}
