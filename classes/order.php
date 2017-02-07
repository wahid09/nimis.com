<?php

require_once 'db_connect.php';
class Order extends Db_Connect {
    //put your code here
    protected $link;
    public function __construct() {
        $this->link = $this->database_connection();
    }
    public function select_all_order_info() {
        $sql="SELECT o.*, c.first_name, c.last_name, p.payment_type, p.payment_status FROM tbl_order as o, tbl_customer as c, tbl_payment as p WHERE o.customer_id = c.customer_id AND o.order_id = p.order_id ";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_customer_info_by_order_id($order_id) {
        $sql="SELECT c.* FROM tbl_order as o, tbl_customer as c WHERE o.customer_id = c.customer_id AND o.order_id = '$order_id' ";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_shipping_info_by_order_id($order_id) {
        $sql="SELECT s.* FROM tbl_order as o, tbl_shipping as s WHERE o.shipping_id = s.shipping_id AND o.order_id = '$order_id' ";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_product_info_by_order_id($order_id)  {
        $sql="SELECT od.* FROM tbl_order as o, tbl_order_details as od WHERE o.order_id = od.order_id AND o.order_id = '$order_id' ";
        if(mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    
    
    
}
