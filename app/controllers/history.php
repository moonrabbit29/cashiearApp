<?php

class History extends Controller
{
    private $bill;
    public function __construct()
    {
        $this->bill = $this->model('Bill'); 
    }

    public function index()
    {
        $data['bill'] = $this->bill->getAllBillByCashierId($_SESSION['id']);
        $this->view('templates/cashier/header');
        $this->view('history/index',$data);
        $this->view('templates/cashier/footer');
    }
}