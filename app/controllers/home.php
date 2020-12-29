<?php 

class Home extends Controller {
    public function index()
    {
        
        if(isset($_SESSION['status']) && isset($_SESSION['staff_id']))
        {
            $data['title'] = 'cashier';
            $this->view('templates/cashier/header',$data);
            $this->view('home/index');
            $this->view('templates/cashier/footer');
        }
        else{
            header('Location: ' . BASEURL . 'public/login' );
        }
    }

    public function Logout()
    {
        session_destroy();
        header('Location: ' . BASEURL . 'public/login');
    }
}