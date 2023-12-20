<?php
namespace App\Controllers;
use App\Models\UserModel;
class LoginController
{
    public function loginUrl()
    {
       
        require(__DIR__ .'../../../view/login.php');
       

    }
    public function registerUrl()
    {
       
        require(__DIR__ .'../../../view/register.php');
       

    }

    public function login()
    {
        $userModel = new UserModel();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $erreur = "" ;
            $email = $_POST["email"];
            $password = $_POST["password"];
            $hashedPassword =  password_hash($password, PASSWORD_DEFAULT);
            // dump(password_verify($password, $hashedPassword));
            $users = $userModel->login($email);
         
            if ($users && password_verify($password, $hashedPassword)) {
                $_SESSION['autoriser'] = "oui";
               
                    $_SESSION['username'] = $users[0]['username'];
            
                    header("location:index.php");
            }else{
                ECHO $erreur = "login or password is invalid !";
            }
            // if($users){
            //     $_SESSION['autoriser'] = "oui";
            //     foreach($users as $user):
            //         $_SESSION['username'] = $user['username'];
            //         // dump($_SESSION['username']);
            //     endforeach;
            //     // ob_start();
            //     header("location:index.php");
            // }else{
            //     ECHO $erreur = "login or password is invalid !";
            // }
           
    }
}
public function register()
    {
        $userModel = new UserModel();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $hashedPassword =  password_hash($password, PASSWORD_DEFAULT);
            $users = $userModel->register($email ,  $hashedPassword);
            if($users){
              
                header("location:index.php?route=login");
            }else{
                ECHO $erreur = "login or password is invalid !";
            }
            
           
    }
}
public function logout()
{
    session_destroy();
   
    require(__DIR__ .'../../../view/login.php');
   

}

}
