<?php
    require_once "models/User.php";
    class Users{        

        public function __construct(){}

        // Controlador Principal
        public function main(){            
            header("Location: ?c=Dashboard");
        }

        // Controlador Crear Rol
        public function rolCreate(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/modules/users/rol_create.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rol = new User;
                $rol->setRolName($_POST['rol_name']);
                $rol->create_rol();
                header("Location: ?c=Users&a=rolRead");
            }
        }

        // Controlador Consultar Roles
        public function rolRead(){
            $roles = new User;
            $roles = $roles->read_roles();            
            require_once "views/modules/users/rol_read.view.php";
        }
        
        // Controlador Actualizar Rol
        public function rolUpdate(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $rolId = new User;
                $rolId = $rolId->getrol_bycode($_GET['idRol']);                
                require_once "views/modules/users/rol_update.view.php";                
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rolUpdate = new User;
                $rolUpdate->setRolCode($_POST['rol_code']);
                $rolUpdate->setRolName($_POST['rol_name']);
                $rolUpdate->update_rol();
                header("Location: ?c=Users&a=rolRead");
            }
        }

        // Controlador Eliminar Rol
        public function rolDelete(){
            $rol = new User;
            $rol->delete_rol($_GET['idRol']);
            header("Location: ?c=Users&a=rolRead");
        }

        // Controlador Crear Usuario
        public function userCreate(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $roles = new User;
                $roles = $roles->read_roles();
                require_once "views/modules/users/user_create.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {                
                $user = new User(
                    $_POST['rol_code'],
                    null,
                    $_POST['user_name'],
                    $_POST['user_lastname'],
                    $_POST['user_id'],
                    $_POST['user_email'],
                    $_POST['user_pass'],
                    $_POST['user_state']
                );                
                $user->create_user();
                header("Location: ?c=Users&a=userRead");
            }
        }

        // Controlador Consultar Usuarios
        public function userRead(){
            $state = ['Inactivo', 'Activo'];
            $users = new User;
            $users = $users->read_users();
            require_once "views/modules/users/user_read.view.php";
        }

        // Controlador Actualizar Usuario
        public function userUpdate(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $state = ['Inactivo', 'Activo'];
                $roles = new User;
                $roles = $roles->read_roles();
                $user = new User;                
                $user = $user->getuser_bycode($_GET['idUser']);                
                require_once "views/modules/users/user_update.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $userUpdate = new User(
                    $_POST['rol_code'],
                    $_POST['user_code'],                    
                    $_POST['user_name'],
                    $_POST['user_lastname'],
                    $_POST['user_id'],
                    $_POST['user_email'],
                    $_POST['user_pass'],
                    $_POST['user_state']
                );
                $userUpdate->update_user();
                header("Location: ?c=Users&a=userRead");
            }            
            

        }

        // Controlador Eliminar Usuario
        public function userDelete(){            
            $user = new User;
            $user->delete_user($_GET['idUser']);
            header("Location: ?c=Users&a=userRead");
        }
    }
?>