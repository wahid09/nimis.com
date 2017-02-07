<?php
require_once 'db_connect.php';

class Application extends Db_Connect {
    //put your code here
    public $link;
    public function __construct() {
        $this->link = $this->database_connection();
    }
    public function select_all_published_category_info() {
        $sql="SELECT * FROM tbl_category WHERE publication_status = 1 LIMIT 4";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_all_published_manufacturer_info() {
        $sql="SELECT * FROM tbl_manufacturer WHERE publication_status = 1";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_all_published_product() {
        $sql="SELECT * FROM tbl_product WHERE publication_status = 1";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_product_info_by_category_id($category_id) {
        $sql="SELECT * FROM tbl_product WHERE publication_status = 1 AND category_id = '$category_id' ";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_product_info_by_manufacturer_id($manufacturer_id) {
        $sql="SELECT * FROM tbl_product WHERE publication_status = 1 AND manufacturer_id = '$manufacturer_id' ";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
}
