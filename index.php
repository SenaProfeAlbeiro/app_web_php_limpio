<?php
    ob_start();
    require_once "models/DataBase.php";    
    $controller = isset($_REQUEST['c']) ? $_REQUEST['c'] : "Landing";    
    $route_controller = "controllers/" . $controller . ".php";
    if (file_exists($route_controller)) {        
        $view = $controller;
        require_once $route_controller;
        $controller = new $controller;
        $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'main';
        if ($view === 'Landing') {        
            require_once "views/company/header.view.php";
            call_user_func(array($controller, $action));
            require_once "views/company/footer.view.php";
        } else {
            require_once "views/roles/admin/header.view.php";            
            call_user_func(array($controller, $action));            
            require_once "views/roles/admin/footer.view.php";
        }    
    } else {
        header("Location:?");
    }
    ob_end_flush();
?>