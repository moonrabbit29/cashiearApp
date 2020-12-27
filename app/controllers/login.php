<?php 


class Login extends Controller{


    public function index($params1 = null, $params2 = null)
    {   
        $data['title'] = 'Cashier';
        // $data['nama'] = $this->model('user_model')->getUser();
        $this->view('templates/header',$data);
        $this->view('login/index',$data);
        $this->view('templates/footer');
    }

    public function validate()
    {
        if (isset($_POST['submit']))
        {
            $this->setData('username',$_POST['username']);
            $this->setData('password',$_POST['password']);
            $auth = $this->model('user_auth')->validate_login($this->getData('username'),$this->getData('password'));
        }
        
    }

}