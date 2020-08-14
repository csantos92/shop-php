<?php 
require_once 'models/userModel.php';

class userController{
    
    public function index(){
        echo "controller user, action index";
    }

    public function register(){
        require_once 'views/user/register.php';
    }

    public function save(){

        if(isset($_POST)){
            $name       = isset($_POST['name']) ? $_POST['name'] : false;
            $surname    = isset($_POST['surname']) ? $_POST['surname'] : false;
            $email      = isset($_POST['email']) ? $_POST['email'] : false;
            $password   = isset($_POST['password']) ? $_POST['password'] : false;

            if($name && $surname && $email && $password){
                $user = new User();
                $user->setName($name);
                $user->setSurname($surname);
                $user->setEmail($email);
                $user->setPassword($password);
    
                $save = $user->register();
                if($save){
                    $_SESSION['register'] = "completed";
                }else{
                    $_SESSION['register'] = "failed";
                }
            }else{
                $_SESSION['register'] = "failed";
            }
        }
        header("Location:".base_url."user/register");
    }

    public function login(){
        if(isset($_POST)){
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);

            $identity = $user->login();

            if($identity && is_object($identity)){
                $_SESSION['user'] = $identity;

                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }
            }else{
                $_SESSION['error_login'] = 'Identificación fallida';
            }
        }
        header("Location:".base_url);
    }

    public function logout(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        
        header("Location:".base_url);
    }
}