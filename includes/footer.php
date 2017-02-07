<?php
    
    $query_result = $obj_app->select_all_published_manufacturer_info();
?>

<footer class="entire_footer_area">
    <div class="footer_top_area">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="footer_top_left">
                        <a href=""><i class="fa fa-envelope"></i>signup newsletter</a>
                        <input type="text" placeholder=""/>
                        <input type="submit" value="submit"/>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="footer_top_right">
                        <ul id="payment">
                            <li><a href="">
                                    <img src="assets/front_end/images/pay1.png" alt="" />
                                </a></li>
                            <li><a href="">
                                    <img src="assets/front_end/images/pay2.png" alt="" />
                                </a></li>
                            <li><a href="">
                                    <img src="assets/front_end/images/pay3.png" alt="" />
                                </a></li>
                            <li><a href="">
                                    <img src="assets/front_end/images/pay4.png" alt="" />
                                </a></li>
                            <li><a href="">
                                    <img src="assets/front_end/images/pay5.png" alt="" />
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="single_widget">
                        <h5>Our Manufacturer</h5>
                        <div class="wid_line"></div>
                        <ul class="widget_nav">
                            <?php while ($manufacturer_info = mysqli_fetch_assoc($query_result)) { ?>
                            <li><a href="manufacturer.php?id=<?php echo $manufacturer_info['manufacturer_id']; ?>"><?php echo $manufacturer_info['manufacturer_name']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="single_widget">
                        <h5>my account</h5>
                        <div class="wid_line"></div>
                        <ul class="widget_nav">
                            <li><a href="">My Account</a></li>
                            <li><a href="">Personal Information</a></li>
                            <li><a href="">Addresses</a></li>
                            <li><a href="">Discounts</a></li>
                            <li><a href="">Order History</a></li>
                            <li><a href="">Your Vouchers</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="single_widget">
                        <h5>customer service</h5>
                        <div class="wid_line"></div>
                        <ul class="widget_nav">
                            <li><a href="">Help & Contact</a></li>
                            <li><a href="">Shipping & Taxes</a></li>
                            <li><a href="">Return Policy</a></li>
                            <li><a href="">Careers</a></li>
                            <li><a href="">Affliates</a></li>
                            <li><a href="">Legal Notice</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="single_widget">
                        <h5>contact Info</h5>
                        <div class="wid_line"></div>
                        <address>
                            Address : 44 New Design Street,<br>
                            Melbourne 005<br>
                            Phone : (01) 800 433 633<br>
                            Email : info@Example.com
                        </address>
                        <ul class="wid_social">
                            <li><a class="fa fa-facebook" href=""></a></li>
                            <li><a class="fa fa-twitter" href=""></a></li>
                            <li><a class="fa fa-google-plus" href=""></a></li>
                            <li><a class="fa fa-pinterest" href=""></a></li>
                            <li><a class="fa fa-rss" href=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="footer_bottom">
                        <p>Copyright &copy; 2015 <a href="index.html">Men’swaer</a>. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>