<?php
require 'db_connect.php';

class Category extends Db_Connect {
    public $link;
    public function __construct() {
        $this->link=$this->database_connection();
    }
    public function save_category_info($data) {
        extract($data);
        $sql="INSERT INTO tbl_category (category_name, category_description, publication_status) VALUES ('$category_name', '$category_description', '$publication_status' )";
        if(mysqli_query($this->link, $sql)) {
            $message="Category info save successfully";
            return $message;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_all_category_info() {
        $sql="SELECT * FROM tbl_category";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function unpublished_category_info_by_id($category_id) {
        $sql="UPDATE tbl_category SET publication_status = 0 WHERE category_id = '$category_id' ";
        if(mysqli_query($this->link, $sql)) {
            $message='Category info unpublished successfully';
            return $message;
           // header('Loication: manage_category.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function published_category_info_by_id($category_id) {
        $sql="UPDATE tbl_category SET publication_status = 1 WHERE category_id = '$category_id' ";
        if(mysqli_query($this->link, $sql)) {
             $message='Category info published successfully';
            return $message;
            //header('Loication: manage_category.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_category_info_by_id($category_id) {
        $sql="SELECT * FROM tbl_category WHERE category_id = '$category_id' ";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function update_category_info_by_id($data) {
        extract($data);
        $sql="UPDATE tbl_category SET category_name = '$category_name', category_description = '$category_description', publication_status = '$publication_status' WHERE category_id = '$category_id' ";
        if(mysqli_query($this->link, $sql)) {
            $_SESSION['message']='Category info update successfully';
            header('Location: manage_category.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function delete_category_info_by_id($category_id) {
         $sql="DELETE FROM tbl_category WHERE category_id = '$category_id' ";
        if(mysqli_query($this->link, $sql)) {
            $_SESSION['message']='Category info delete successfully';
            header('Location: manage_category.php');
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
}
