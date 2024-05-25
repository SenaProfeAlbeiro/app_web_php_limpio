<?php
require_once "models/User.php";
class Login
{
    // Controlador Principal
    public function main()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once "views/company/login.view.php";
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User(
                $_POST['user_email'],
                $_POST['user_pass']
            );
            $user = $user->login();            
            if ($user) {                
                $_SESSION['session'] = $user->getRolName();
                header("Location:?c=Dashboard");
            } else {
                echo "El Usuario No Existe";
            }
        }
    }
}
