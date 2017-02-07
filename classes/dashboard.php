<?php


class Dashboard {
    


    public function admin_logout() {
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_id']);
        
        header('Location: index.php');
    }
}
