<?php

class Cashier extends Controller 
{
    public function index()
    {
        $data['product'] = $this->model('product_model')->getAllProduct();
        $this->view('templates/cashier/header');
        $this->view('cashier/index',$data);
        $this->view('templates/cashier/footer');
    }

    public function payComplete()
    {
        if ($this->model('user_auth')->isLogin()) {
            if ($this->model('user_auth')->isManager()) {
                if ($this->model('product_model')->tambahDataProduct($_POST) > 0) {
                    header('Location: ' . BASEURL . 'public/inventory');
                }
            }else
            {
                //flash message
                header('Location: ' . BASEURL . 'public/inventory');
            }
        }
    }
}