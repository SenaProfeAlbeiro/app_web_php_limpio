<?php
    require_once "models/User.php";
    class Login{
        // Controlador Principal
        public function main(){
            $user = new User(
                "vicente_fernandez@misena.edu.co",
                "54321"
            );
            $user = $user->login();
            if ($user) {
                print_r($user);
            } else {
                echo "El Usuario No Existe";
            }

        }
    }
?>