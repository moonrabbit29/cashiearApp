<?php

class Cashier extends Controller 
{

    private $product;
    private $bil;
    private $auth;
    public function __construct()
    {
        $this->product = $this->model('Product_model');
        $this->bil = $this->model('Bill');
        $this->auth = $this->model('User_auth');
    }
    
    public function pay()
    {
        $data['product'] = $this->model('product_model')->getAllProduct();
        $data['script'] = "<script type='text/javascript'>
        $(document).ready(function(){
            $('#formModal').modal('show');
        });</script>";
        $this->view('templates/cashier/header');
        $this->view('cashier/index',$data);
        $this->view('templates/cashier/footer',$data);
    }   

     public function createBill()
    {
        if($this->auth->isLogin())
        {
            if(isset($_POST['payment_success']))
            {
                $data = $this->bil-> createBill($_SESSION['staff_id'],$_POST['totalToPay']);
                

            }  
        }else{
            header('Location: ' . BASEURL . 'public/login');
        }
    }


    public function index()
    {
        $data['product'] = $this->model('product_model')->getAllProduct();
        $this->view('templates/cashier/header');
        $this->view('cashier/index',$data);
        $this->view('templates/cashier/footer');
    }


    // public function payComplete()
    // {
    //     if ($this->model('user_auth')->isLogin()) {
    //         if ($this->model('user_auth')->isManager()) {
    //             if ($this->model('product_model')->tambahDataProduct($_POST) > 0) {
    //                 header('Location: ' . BASEURL . 'public/cashier');
    //             }
    //         }else
    //         {
    //             //flash message
    //             header('Location: ' . BASEURL . 'public/cashier');
    //         }
    //     }
    // }
}