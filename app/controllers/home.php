<?php 

class Home extends Controller {

    private $user;
    private $bill;
    
    public function __construct()
    {
        $this->user = $this->model('user_auth');
        $this->bill = $this->model('Bill');
    }
    
    public function index()
    {
        
        if(isset($_SESSION['status']) && isset($_SESSION['staff_id']))
        {
            if($_SESSION['priviledge']=='Manager'){
                $data['title'] = 'Manager';
                $this->view('templates/cashier/header',$data);
                $this->view('home/manager');
                $this->view('templates/cashier/footer');
            }
            else{
            $data['title'] = 'cashier';
            $this->view('templates/cashier/header',$data);
            $this->view('home/cashier');
            $this->view('templates/cashier/footer');
            }
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

    public function salesReport()
    {
        if(isset($_POST['StartDate'])&&isset($_POST['EndDate'])&&
        $_SESSION['priviledge']=='Manager')
        {
        $dataResult= $this->bill->getBillByDateRange();
        $data['bill'] = $this->bill->salesReport($dataResult);
        $data['title'] = 'cashier';
        $this->view('templates/cashier/header',$data);
        $this->view('home/salesReport',$data);
        $this->view('templates/cashier/footer');
        }else
        {
            header('Location: ' . BASEURL . 'public/home');
        }
    }
}