<?php
$message = '';

if (isset($_POST['btn'])) {
    $message = $obj_cart->update_cart_product_info($_POST);
}

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'delete') {
        $product_id = $_GET['id'];
        $obj_cart->delete_cart_product_info($product_id);
    }
}

$query_result = $obj_cart->select_cart_product_by_session_id();
?>
<section class="main_cart_area">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-12 text-center">
                <h1><?php echo $message; ?></h1>
                <h1><?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                    }
                    unset($_SESSION['message']);
                    ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="main_cart_left">
                    <div class="cart_heading">
                        <div class="h_item1">
                            <p>product</p>
                        </div>
                        <div class="h_item2">
                            <p>Price</p>
                        </div>
                        <div class="h_item3">
                            <p>Quantity</p>
                        </div>
                        <div class="h_item4">
                            <p>total</p>
                        </div>
                    </div>
                    <?php $subtotal=0; while ($cart_product = mysqli_fetch_assoc($query_result)) { ?>
                        <div class="cart_item">
                            <div class="cart_item_img">
                                <img src="images/<?php echo $cart_product['product_image']; ?>" alt="" style="height: 80px; width: 80px;" />
                                <p><?php echo $cart_product['product_name']; ?></p>
                            </div>
                            <div class="cart_price">
                                <p>BDT <?php echo $cart_product['product_price']; ?></p>
                            </div>
                            <div class="cart_quantity">
                                <form action="" method="post">
                                    <ul>
                                        <li>
                                            <input type="number" min="1" name="product_quantity" value="<?php echo $cart_product['product_quantity']; ?>">
                                            <input type="hidden" name="product_id" value="<?php echo $cart_product['product_id']; ?>">
                                        </li>
                                        <li><input type="submit" name="btn" value="Update"></li>
                                    </ul>
                                </form>
                                <a href="?status=delete&&id=<?php echo $cart_product['product_id']; ?>">Delete</a>
                            </div>
                            <div class="cart_total">
                                <p>
                                    <?php
                                    $item_total = $cart_product['product_quantity'] * $cart_product['product_price'];
                                    echo 'BDT ' . ' ' . $item_total;
                                    ?>
                                </p>
                                <span><i class="fa fa-close"></i></span>
                            </div>
                        </div>
                    <?php $subtotal = $subtotal+ $item_total; } ?>
                    <div class="coupon_box">
                        <input type="text" placeholder="coupon code"/>
                        <input type="submit" value="apply coupon">
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="main_cart_right">
                    <div class="product_form_total">


                        <div class="panel-group" id="home-accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default collapse">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#home-accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            CALCULATE SHIPPING
                                            <span class="floatright"><i class="fa fa-minus"></i></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <select class="selectpicker">
                                            <option>Melbourne</option>
                                            <option>Dhaka</option>
                                            <option>New York</option>
                                        </select>
                                        <select class="selectpicker sel_state">
                                            <option>Sate/Country</option>
                                            <option>Bangladesh</option>
                                            <option>USA</option>
                                            <option>UK</option>
                                            <option>Canda</option>
                                            <option>Australia</option>
                                        </select>
                                        <input type="text" placeholder="Postcode/zip"/>
                                        <input type="submit" value="Update Totals">
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#home-accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Cart totals
                                            <span class="floatright"><i class="fa fa-plus"></i></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body cart_p_body">
                                        <div class="c_single_item">
                                            <p>SubTotal</p>
                                            <span> BDT <?php echo $subtotal; ?></span>
                                        </div>
                                        <div class="c_single_item">
                                            <p>Vat</p>
                                            <span><?php 
                                                $vat = ($subtotal*15) /100;
                                                echo 'BDT'.' '.$vat;
                                            ?></span>
                                        </div>
                                        <div class="c_single_item cart_last_total">
                                            <p>Shipping Charge</p>
                                            <span>Free</span>
                                        </div>
                                        <div class="c_total_item sp_single_item">
                                            <p>Grand Total</p>
                                            <span>BDT <?php
                                                $grand_total = $subtotal + $vat;
                                                echo ' '.$grand_total;
                                                $_SESSION['order_total'] = $grand_total; 
                                            ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($_SESSION['customer_id']) && isset($_SESSION['shipping_id'])) { ?>
                        <a href="payment.php" class="cart_update">Checkout</a>
                        <?php } else if (isset($_SESSION['customer_id'])) { ?>
                        <a href="shipping.php" class="cart_update">Checkout</a>
                        <?php } else { ?>
                         <a href="checkout.php" class="cart_update">Checkout</a>
                        <?php } ?>
                        <input type="submit" value="Proceed to checkout">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>