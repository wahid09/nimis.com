<?php
    if(isset($_POST['btn'])) {
        require_once 'classes/checkout.php';
    $obj_checout= new Checkout();
    $obj_checout->save_customer_info($_POST);
    }

?>

<section class="checkout_area">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>You have to login to complete checkout. If you are not registered then please login first Thanks !</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="checkout_left">
                    <h2 style="text-align: center;">You can login here</h2>
                    <div class="dotted_line"></div>
                    <div class="checkout_form">

                        <form class="form-horizontal" action="" method="post">  
                            <div class="form-group">
                                <label class="control-label col-lg-3">Email Address</label>
                                <div class="col-lg-9">
                                    <input type="email" name="email_address" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Password</label>
                                <div class="col-lg-9">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-9">
                                    <input type="submit" name="btn" class="btn btn-primary btn-block" value="Login">
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr/>
                    <h2 style="text-align: center;">You can sign up here</h2>
                    <div class="dotted_line"></div>
                    <form action="" method="post">
                        <div class="shipping_form">
                            <div class="c_name_box">
                                <div class="c_name_box_left">
                                    <p>First Name <span>*</span></p>
                                    <input type="text" name="first_name">
                                </div>
                                <div class="c_name_box_right">
                                    <p>Last Name <span>*</span></p>
                                    <input type="text" name="last_name">
                                </div>
                            </div>
                            <div class="company_name">
                                <p>First Name  <span>*</span></p>
                                <input type="text" name="first_name" class="form-control">
                            </div>
                            <div class="company_name">
                                <p>Last Name <span>*</span></p>
                                <input type="text" name="last_name" class="form-control">
                            </div>
                            <div class="company_name">
                                <p>Email Address <span>*</span></p>
                                <input type="email" name="email_address" class="form-control">
                            </div>
                            <div class="company_name">
                                <p>Password <span>*</span></p>
                                <input type="password" name="password" class="form-control" >
                            </div>
                            <div class="company_name">
                                <p>Phone Number <span>*</span></p>
                                <input type="number" name="phone_number" class="form-control" >
                            </div>
                            <div class="c_address">
                                <p>Address <span>*</span></p>
                                <textarea name="address" class="form-control"></textarea>
                            </div>
                            <div class="s_order">
                                <input type="submit" name="btn" class="btn btn-primary btn-block" value="Registration">
                            </div>
                        </div>
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