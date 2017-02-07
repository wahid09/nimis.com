<?php

require_once 'db_connect.php';

class Cart extends Db_Connect {
    //put your code here
    public $link;
    public function __construct() {
        $this->link=$this->database_connection();
    }
    public function add_to_cart($data) {
        $product_id = $data['product_id'];
        $sql="SELECT * FROM tbl_product WHERE product_id = '$product_id' ";
        $query_result = mysqli_query($this->link, $sql);
        $product_info = mysqli_fetch_assoc($query_result);
        $session_id = session_id();
        $sql="INSERT INTO tbl_temp_cart (session_id, product_id, product_name, product_price, product_quantity,"
                . " product_image) VALUES ('$session_id', '$data[product_id]', '$product_info[product_name]', "
                . " '$product_info[product_price]', '$data[product_quantity]', '$product_info[product_image]')";
        mysqli_query($this->link, $sql);
        header('Location: cart_view.php');
    }
    public function select_cart_product_by_session_id() {
        $session_id = session_id();
        $sql="SELECT * FROM tbl_temp_cart WHERE session_id = '$session_id' ";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link));
        }
    }
    public function update_cart_product_info($data) {
        $session_id = session_id();
        $sql="UPDATE tbl_temp_cart SET product_quantity = '$data[product_quantity]'  WHERE session_id = '$session_id' AND product_id = '$data[product_id]' ";
        if(mysqli_query($this->link, $sql)) {
            $message = 'Cart product info update successfully';
            return $message;
        } else {
            die('Query problem'.mysqli_error($this->link));
        }
    }
    public function delete_cart_product_info($product_id) {
        $session_id = session_id();
        $sql="DELETE FROM tbl_temp_cart  WHERE session_id = '$session_id' AND product_id = '$product_id' ";
        if(mysqli_query($this->link, $sql)) {
            $_SESSION['message'] = 'Cart product info delete successfully';
            header('Location: cart_view.php');
        } else {
            die('Query problem'.mysqli_error($this->link));
        }
    }
    
    
    
}
