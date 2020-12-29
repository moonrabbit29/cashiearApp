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
}