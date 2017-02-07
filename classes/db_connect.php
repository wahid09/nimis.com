<?php

class Db_Connect {

    public function database_connection() {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'db_seip_ecommerce34';
        $db_con = mysqli_connect($host_name, $user_name, $password, $db_name);
        if (!$db_con) {
            die('Connection Fail' . mysqli_error($db_con));
        }
        return $db_con;
    }

}
