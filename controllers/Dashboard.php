<?php
class Dashboard{
    
    public function __construct(){        
        require_once "views/roles/admin/header.view.php";
        $this->main();
        require_once "views/roles/admin/footer.view.php";
    }
    
    public function main(){
        require_once "views/roles/admin/admin.view.php";
    }
}
?>