<?php
    require_once "models/User.php";
    class Users{        

        public function __construct(){
            $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'main';
            require_once "views/roles/admin/header.view.php";            
            if ($action == 'main') {
                $this->main();
            } elseif ($action == 'rolCreate') {
                $this->rolCreate();
            } elseif ($action == 'rolRead') {
                $this->rolRead();
            } elseif ($action == 'rolUpdate') {
                $this->rolUpdate();
            } elseif ($action == 'rolDelete') {
                $this->rolDelete();
            } 
            require_once "views/roles/admin/footer.view.php";
        }

        // Controlador Principal
        public function main(){
            require_once "views/roles/admin/admin.view.php";
        }

        // Controlador Crear Rol
        public function rolCreate(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/modules/users/rol_create.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rol = new User;
                $rol->setRolName("un_error");
                $rol->create_rol();
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
            $rolCode = 3;
            // Objeto_01. Crear el objeto a partir del registro db, según petición
            $rolId = new User;
            // $rolId = $rolId->getrol_bycode($rolCode);
            // print_r($rolId);

            // Objeto_02. Actualizar el usuario en la db, a partir del Objeto_01
            $rolUpdate = new User;
            $rolUpdate->setRolCode($rolCode);
            $rolUpdate->setRolName("seller");
            // $rolUpdate->update_rol();
            $this->rolRead();
            // header("Location:?c=Users&a=rolRead");            
            // require_once "views/modules/users/rol_read.view.php";
        }

        // Controlador Eliminar Rol
        public function rolDelete(){
            $rolCode = 3;
            $rol = new User;
            $rol->delete_rol($rolCode);
        }

        // Controlador Crear Usuario
        public function userCreate(){
            $user = new User(
                3,
                null,
                "Vicente",
                "Fernández",
                "456789321",
                "vicente_fernandez@misena.edu.co",
                "54321",
                1
            );
            $user->create_user();
        }

        // Controlador Consultar Usuarios
        public function userRead(){
            $users = new User;
            $users = $users->read_users();
            print_r($users);
        }

        // Controlador Actualizar Usuario
        public function userUpdate(){
            $userCode = 3;
            // Objeto_01. Crear el objeto a partir del registro db, según petición
            $user = new User;
            $user = $user->getuser_bycode($userCode);
            print_r($user);

            #Objeto_02. Actualizar el usuario en la db, a partir del Objeto_01
            $userUpdate = new User(
                3,
                $userCode,
                "Emily",
                "Rodriguez",
                "122344534",
                "em_rodriguez@misena.edu.co",
                "56432",
                0
            );

            $userUpdate->update_user();
        }

        // Controlador Eliminar Usuario
        public function userDelete(){
            $userCode = 2;
            $user = new User;
            $user->delete_user($userCode);
        }
    }
?>