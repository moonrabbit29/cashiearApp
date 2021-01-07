<?php

class Cashier extends Controller
{

    private $product;
    private $bil;
    private $auth;
    public function __construct()
    {
        $this->product = $this->model('Product_model');
        $this->bill = $this->model('Bill');
        $this->auth = $this->model('User_auth');
    }


    public function createBill()
    {
        if ($this->auth->isLogin()) {
            if (isset($_POST['payment_success'])) {
                $id = $this->bill->createBill($_SESSION['staff_id'], $_POST['totalToPay']);
                $succes = $this->bill->billDetail($id, $_POST['rowCount']);
                if ($succes != []) {
                    if ($this->product->editDataproduct([], "P_name") > 0) {
                        $data['product'] = $this->model('product_model')->getAllProduct();
                        header("Location: ".BASEURL."public/cashier");
                    }
                } else {
                    echo "failed";
                }
            }
        } else {
            header('Location: ' . BASEURL . 'public/login');
        }
    }


    public function index()
    {
        $data['product'] = $this->product->getAllProduct();
        $this->view('templates/cashier/header');
        $this->view('cashier/index', $data);
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
