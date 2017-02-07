<?php
    $category_id = $_GET['id'];
    $query_result = $obj_app->select_product_info_by_category_id($category_id);

?>

<section class="breadcumb_top_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="bread_top_box">
                    <h2>Men</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="breadcumb_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="bread_box">
                    <ul class="breadcumb">
                        <li><a href="index.html">home <span>|</span></a></li>
                        <li><a href="">Shop <span>|</span></a></li>
                        <li><a href="">Category <span>|</span></a></li>
                        <li class="active"><a href="">Men</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="filter_area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="filter_box_left">
                    <p>FILTERING:</p>
                    <div class="filter_cont">
                        <ul>
                            <li><a href="category-1.html">on</a></li>
                            <li><img src="assets/front_end/images/filter_ico_off.png" alt="" /></li>
                            <li><a href="category-2.html">off</a></li>
                        </ul>
                    </div>
                    <div class="s_results">
                        <p><span>|</span> showing 1-12 of 30 results</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-4 col-xs-12">
                <div class="filter_box_right">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">sort by newness <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Category 1-1</a></li>
                        <li><a href="#">Category 1-2</a></li>
                        <li><a href="#">Category 1-3</a></li>                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="main_category_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="main_category_right cat-2">
                    <div class="row">
                        <?php while ($category_product = mysqli_fetch_assoc($query_result)) { ?>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="main_cat_item">
                                <div class="item">
                                    <div class="item-img">
                                        <img src="assets/<?php echo $category_product['product_image'] ;?>" alt="" style="height: 200px; width: 200px; " />
                                        <div class="tr-add-cart">
                                            <ul>
                                                <li><a class="fa fa-shopping-cart tr_cart" href="#"></a></li>
                                                <li><a class="tr_text" href="product-detail.php?id=<?php echo $category_product['product_id']; ?>">Product Details</a></li>
                                                <li><a class="fa fa-heart tr_heart" href="#"></a></li>
                                                <li><a class="fa fa-search tr_search" href="product-detail.php?id=<?php echo $category_product['product_id']; ?>"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="item-new">
                                        <p>Sale</p>
                                    </div>
                                    <div class="item-sub">
                                        <a href="product-detail.html"><h5><?php echo $category_product['product_name'] ;?></h5></a>
                                        <p>BDT <?php echo $category_product['product_price'] ;?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="pagi_line"></div>
                            <div class="pagi_ul">
                                <ul id="pagination">
                                    <li><a href="">Previous</a></li>
                                    <li><a href="">1</a></li>
                                    <li><a href="">2</a></li>
                                    <li><a href="">3</a></li>
                                    <li><a href="">4</a></li>
                                    <li><a href="">5 ...</a></li>
                                    <li><a href="">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>