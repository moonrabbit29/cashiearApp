<?php 


class Login extends Controller{


    public function index($params1 = null, $params2 = null)
    {   
        $data['title'] = 'Cashier';
        // $data['nama'] = $this->model('user_model')->getUser();
        if($this->model('user_auth')->isLogin())
        {
            header('Location: ' . BASEURL . 'public/home');
        }
        else{
            $this->view('templates/login/header',$data);
            $this->view('login/index',$data);
            $this->view('templates/login/footer');
        }
        
    }

    public function validate()
    {
        if (isset($_POST['submit']))
        {
            $this->setData('username',$_POST['username']);
            $this->setData('password',$_POST['password']);
            $auth = $this->model('user_auth')->validate_login($this->getData('username'),$this->getData('password'));
            if($auth>0){
                header('Location: ' . BASEURL . 'public/home');
            }else{

                header('Location: ' . BASEURL . 'public/login');
            }
        }
        
    }

}