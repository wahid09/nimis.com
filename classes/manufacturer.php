<?php

require_once 'db_connect.php';

class Manufacturer extends Db_Connect {

    //put your code here
    public $link;

    public function __construct() {
        $this->link = $this->database_connection();
    }

    public function save_manufacturer_info($data) {
        extract($data);
        $sql = "INSERT INTO tbl_manufacturer (manufacturer_name, manufacturer_description, publication_status) VALUES ('$manufacturer_name', '$manufacturer_description', '$publication_status' )";
        if (mysqli_query($this->link, $sql)) {
            $message = "Manufacturer info save successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }

    public function select_all_manufacturer_info() {
        $sql = "SELECT * FROM tbl_manufacturer";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }

    public function unpublished_manufacturer_info_by_id($manufacturer_id) {
        $sql = "UPDATE tbl_manufacturer SET publication_status = 0 WHERE manufacturer_id = '$manufacturer_id' ";
        if (mysqli_query($this->link, $sql)) {
            $message = 'manufacturer info unpublished successfully';
            return $message;
            // header('Loication: manage_manufacturer.php');
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }

    public function published_manufacturer_info_by_id($manufacturer_id) {
        $sql = "UPDATE tbl_manufacturer SET publication_status = 1 WHERE manufacturer_id = '$manufacturer_id' ";
        if (mysqli_query($this->link, $sql)) {
            $message = 'manufacturer info published successfully';
            return $message;
            //header('Loication: manage_manufacturer.php');
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }

    public function select_manufacturer_info_by_id($manufacturer_id) {
        $sql = "SELECT * FROM tbl_manufacturer WHERE manufacturer_id = '$manufacturer_id' ";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }

    public function update_manufacturer_info_by_id($data) {
        extract($data);
        $sql = "UPDATE tbl_manufacturer SET manufacturer_name = '$manufacturer_name', manufacturer_description = '$manufacturer_description', publication_status = '$publication_status' WHERE manufacturer_id = '$manufacturer_id' ";
        if (mysqli_query($this->link, $sql)) {
            $_SESSION['message'] = 'manufacturer info update successfully';
            header('Location: manage_manufacturer.php');
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }

    public function delete_manufacturer_info_by_id($manufacturer_id) {
        $sql = "DELETE FROM tbl_manufacturer WHERE manufacturer_id = '$manufacturer_id' ";
        if (mysqli_query($this->link, $sql)) {
//            $_SESSION['message'] = 'Manufacturer info delete successfully';
//            header('Location: manage_manufacturer.php');
            $message = 'Manufacturer info delete successfully';
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }

}
