<?php
if (isset($_POST['btn'])) { 
    $obj_checout->save_order_info($_POST);
}
?>

<section class="checkout_area">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Dear <?php echo $_SESSION['customer_name']; ?>, You have to give us product payment information to complete your valuable order Thanks !</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="checkout_left">
                    <h2 style="text-align: center;">You can give us payment info here </h2>
                    <div class="dotted_line"></div>
                    <form action="" method="post">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td>Cash On Delivery</td>
                                <td><input type="radio" name="payment_type" value="cash_on_delivery"></td>
                            </tr>
                            <tr>
                                <td>BKash</td>
                                <td><input type="radio" name="payment_type" value="bkash"></td>
                            </tr>
                            <tr>
                                <td>Paypal</td>
                                <td><input type="radio" name="payment_type" value="paypal"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" name="btn" value="Confirm Order" class="btn btn-primary btn-block"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="checkout_right">
                    <h4>Review of Your Order</h4>

                    <div class="product_form_total">
                        <div class="c_main_item">
                            <p>Product</p>
                            <span>Total</span>
                        </div>
                        <div class="c_single_item">
                            <p>collarless coat x 1</p>
                            <span>$115.00</span>
                        </div>
                        <div class="c_single_item">
                            <p>wool t-shirt x 1</p>
                            <span>$184.00</span>
                        </div>
                        <div class="c_single_item">
                            <p>jean coat x 3 </p>
                            <span>$205.00</span>
                        </div>
                        <div class="c_single_item sp_single_item">
                            <p>casual shirt x 2</p>
                            <span>$375.00</span>
                        </div>
                        <div class="c_single_item">
                            <p>subtotal</p>
                            <span>$854.00</span>
                        </div>
                        <div class="c_single_item sp_single_item">
                            <p>Shipping Charge</p>
                            <span>Free</span>
                        </div>
                        <div class="c_total_item sp_single_item">
                            <p>Order Total</p>
                            <span>$854.00</span>
                        </div>
                        <div class="c_payment">
                            <p>Select Payment Method</p>
                            <select class="selectpicker sel_state">
                                <option>Direct Bank Transfer</option>
                                <option>Wire Transfer</option>
                                <option>VISA</option>
                            </select>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> I have Read & Accept <span>Terms & Conditions</span>
                            </label>
                        </div>
                        <input type="submit" value="Place order now"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>