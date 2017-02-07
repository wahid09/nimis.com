<?php

require_once 'db_connect.php';

class Checkout extends Db_Connect {
    //put your code here
    public $link;
    public function __construct() {
        $this->link = $this->database_connection();
    }

    public function save_customer_info($data) {
        $password = md5($data['password']);
        $sql = "INSERT INTO tbl_customer (first_name, last_name, email_address, password, phone_number, address) VALUES ('$data[first_name]', '$data[last_name]', '$data[email_address]', '$password', '$data[phone_number]', '$data[address]')";
        if (mysqli_query($this->link, $sql)) {
            $customer_id = mysqli_insert_id($this->link);
            $_SESSION['customer_name'] = $data['first_name'] . ' ' . $data['last_name'];
            $_SESSION['customer_id'] = $customer_id;
            header('Location: shipping.php');
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }

    public function select_customer_info_by_id($customer_id) {
        $sql = "SELECT * FROM tbl_customer WHERE customer_id = '$customer_id' ";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }

    public function save_shipping_info($data) {
        $sql = "INSERT INTO tbl_shipping (full_name, email_address, phone_number, address) VALUES ('$data[full_name]', '$data[email_address]', '$data[phone_number]', '$data[address]')";
        if (mysqli_query($this->link, $sql)) {
            $shipping_id = mysqli_insert_id($this->link);
            $_SESSION['shipping_id'] = $shipping_id;

            header('Location: payment.php');
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }

    public function save_order_info($data) {
        $payment_type = $data['payment_type'];
        if ($payment_type == 'cash_on_delivery') {
            $customer_id = $_SESSION['customer_id'];
            $shipping_id = $_SESSION['shipping_id'];
            $order_total = $_SESSION['order_total'];

            $sql = "INSERT INTO tbl_order (customer_id, shipping_id, order_total) VALUES ('$customer_id', '$shipping_id', '$order_total')";
            if (mysqli_query($this->link, $sql) ) {
            
            $order_id = mysqli_insert_id($this->link);
            $sql = "INSERT INTO tbl_payment (order_id, payment_type) VALUES ('$order_id', '$payment_type')";
            mysqli_query($this->link, $sql);
            $session_id = session_id();
            $sql="SELECT * FROM tbl_temp_cart WHERE session_id = '$session_id' ";
            $query_result= mysqli_query($this->link, $sql);
            while ($cart_product = mysqli_fetch_assoc($query_result)) {
                $sql="INSERT INTO tbl_order_details (order_id, product_id, product_name, product_price, product_quantity) VALUES ('$order_id', '$cart_product[product_id]', '$cart_product[product_name]', '$cart_product[product_price]', '$cart_product[product_quantity]')";
                mysqli_query($this->link, $sql);
            }
            $sql="DELETE FROM tbl_temp_cart WHERE session_id = '$session_id' ";
            mysqli_query($this->link, $sql);
            } else {
                die("Order query problem".mysqli_error($this->link));
            }
            
            header('Location: customer_home.php');
        } else if ($payment_type == 'bkash') {
            echo $payment_type;
            exit();
        } else if ($payment_type == 'paypal') {
            echo $payment_type;
            exit();
        }
    }
    public function customer_logout() {
        unset($_SESSION['customer_name']);
        unset($_SESSION['customer_id']);
        
        header('Location: index.php');
    }
    

}
