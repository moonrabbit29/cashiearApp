<?php

class Inventory extends Controller
{
    public function Index()
    {
        $data['title'] = 'Inventory';
        $data['inventory'] = $this->model('product_model')->getAllProduct();
        $this->view('templates/cashier/header', $data);
        $this->view('inventory/index', $data);
        $this->view('templates/cashier/footer');
    }

    public function Tambah()
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
