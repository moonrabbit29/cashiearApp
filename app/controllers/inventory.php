<?php

class Inventory extends Controller
{
    private $user;
    private $product;

    public function __construct()
    {
        $this->user = $this->model('user_auth');
        $this->product = $this->model('product_model');
    }

    public function Index()
    {
        $data['title'] = 'Inventory';
        $data['inventory'] = $this->product->getAllProduct();
        $this->view('templates/cashier/header', $data);
        $this->view('inventory/index', $data);
        $this->view('templates/cashier/footer');
    }

    public function Tambah()
    {
        if ($this->model('user_auth')->isLogin()) {
            if ($this->user->isManager()) {
                if ($this->product->tambahDataProduct($_POST) > 0) {
                    header('Location: ' . BASEURL . 'public/inventory');
                }
            } else {
                //flash message
                header('Location: ' . BASEURL . 'public/inventory');
            }
        }
    }

    public function Delete($id)
    {
        if ($this->user->isManager()) {
            if ($this->product->deleteDataProduct($id, 'id') > 0) {
                header('Location: ' . BASEURL . 'public/inventory');
            } else {
                echo "failed";
            }
        } else {
            echo 'failed';
        }
    }

    public function Edit($id)
    {
        if ($this->user->isManager()) {
            if ($this->product->editDataProduct($id, 'id') > 0) {
                header('Location: ' . BASEURL . 'public/inventory');
            } else {
                //flassh message faile edit
            }
        } else {
            //flash message not manager
            echo 'failed';
        }
    }

    public function search()
    {
        $byname = $this->product->getProductByName($_POST['searchProduct'],"not cashier");
        $byid = $this->product->getProductById((int)($_POST['searchProduct']));
        if ($byname) 
        {
            $data['title'] = 'Inventory';
            $data['inventory'] = $byname;
            $this->view('templates/cashier/header', $data);
            $this->view('inventory/index', $data);
            $this->view('templates/cashier/footer');
        }else if($byid)
        {
            $data['title'] = 'Inventory';
            $data['inventory'] = $byid;
            $this->view('templates/cashier/header', $data);
            $this->view('inventory/index', $data);
            $this->view('templates/cashier/footer');
        }else
        {
            echo "failed";
        }
    }
}
