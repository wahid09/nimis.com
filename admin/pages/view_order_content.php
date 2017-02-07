<?php
    $order_id = $_GET['id'];
    $customer_query_result = $obj_order->select_customer_info_by_order_id($order_id);
    $customer_info = mysqli_fetch_assoc($customer_query_result);
    
    $shipping_query_result = $obj_order->select_shipping_info_by_order_id($order_id);
    $shipping_info = mysqli_fetch_assoc($shipping_query_result);
    
    $product_query_result = $obj_order->select_product_info_by_order_id($order_id);
    

?>
    <div class="row">
        <div class="col-lg-12">
            <hr/>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 class="text-center text-success">Customer Information for this order </h2>
                    <hr/>
                    <table class="table table-bordered table-hover">
                            <tr>
                                <td>Customer Name</td>
                                <td><?php echo $customer_info['first_name'].' '.$customer_info['last_name']; ?></td>
                            </tr>
                            <tr>
                                <td>Email Address</td>
                                <td><?php echo $customer_info['email_address']; ?></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><?php echo $customer_info['phone_number']; ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?php echo $customer_info['address']; ?></td>
                            </tr>
                        </table>
                    <h2 class="text-center text-success">Shipping Information for this order </h2>
                    <hr/>
                    <table class="table table-bordered table-hover">
                            <tr>
                                <td>Customer Name</td>
                                <td><?php echo $shipping_info['full_name']; ?></td>
                            </tr>
                            <tr>
                                <td>Email Address</td>
                                <td><?php echo $shipping_info['email_address']; ?></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><?php echo $shipping_info['phone_number']; ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?php echo $shipping_info['address']; ?></td>
                            </tr>
                        </table>
                    <h2 class="text-center text-success">Product Information for this order </h2>
                    <hr/>
                    <table class="table table-bordered table-hover">
                            <tr>
                                <td>Product ID</td>
                                <td>Product Name</td>
                                <td>Product Price</td>
                                <td>Product Quantity</td>
                            </tr>
                            <?php while ($product_info  = mysqli_fetch_assoc($product_query_result)) { ?>
                            <tr>
                                <td><?php echo $product_info['product_id']; ?></td>
                                <td><?php echo $product_info['product_name']; ?></td>
                                <td><?php echo $product_info['product_price']; ?></td>
                                <td><?php echo $product_info['product_quantity']; ?></td>
                            </tr>
                            <?php } ?>
                        </table>
                </div>
            </div>
        </div>
    </div>
