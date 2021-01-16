<?php 

class Home extends Controller {

    private $user;
    
    public function __construct()
    {
        $this->user = $this->model('user_auth');
    }
    
    public function index()
    {
        
        if(isset($_SESSION['status']) && isset($_SESSION['staff_id']))
        {
            if($_SESSION['priviledge']=='Manager'){
                $data['title'] = 'cashier';
                $this->view('templates/cashier/header',$data);
                $this->view('home/manager');
                $this->view('templates/cashier/footer');
            }
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

    public function new()
    {
       $value= $this->user->newCashier();
       if($value>0)
       {
        $data['title'] = 'cashier';
        $this->view('templates/cashier/header',$data);
        $this->view('home/manager');
        $this->view('templates/cashier/footer');
       }else
       {
           echo "failed";
       }
    }

    public function edit($id)
    {
        $result = $this->user->editUSer($id);
        if($result>0){
            header('Location: ' . BASEURL . 'public/home');
        }
    }
}