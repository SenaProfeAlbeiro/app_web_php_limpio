<?php
    require_once "models/DataBase.php";    
    $view = isset($_REQUEST['c']) ? $_REQUEST['c'] : "Landing";
    $controller = $view;
    require_once "controllers/" . $controller . ".php";
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
?>