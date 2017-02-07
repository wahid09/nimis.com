<?php
    ob_start();
    session_start();             
   
    require_once 'classes/application.php';
    $obj_app = new Application();
    
    require_once 'classes/cart.php';
    $obj_cart = new Cart();

    require_once 'classes/checkout.php';
    $obj_checout= new Checkout();
    
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HOME</title>
        <!-- fonts files -->
        <link href='http://fonts.googleapis.com/css?family=Cabin:400,500,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


        <!-- Font awesome css -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <!-- Owl carousel css -->
        <link rel="stylesheet" href="assets/front_end/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/front_end/css/owl.transitions.css">
        <link rel="stylesheet" href="assets/front_end/css/owl.theme.css">

        <!-- bx-slider css -->
        <link rel="stylesheet" href="assets/front_end/css/jquery.bxslider.css">
        <!-- bootstrap select css -->
        <link rel="stylesheet" href="assets/front_end/css/bootstrap-select.min.css">
        <!-- lightbox css -->
        <link rel="stylesheet" href="assets/front_end/css/lightbox.css">
        <!-- Revolution slider css -->
        <link href="assets/front_end/js/rs-plugin/css/settings.css" rel="stylesheet" />
        <!-- Bootstrap css -->
        <link rel="stylesheet" href="assets/front_end/css/bootstrap.css">
        <!-- Custom css -->
        <link rel="stylesheet" href="assets/front_end/css/style.css">
        <link rel="stylesheet" href="assets/front_end/css/responsive.css">

        <!-- Favicons -->
        <link rel="apple-touch-icon-precomposed" href="assets/front_end/images/apple-touch-icon-precomposed.png">
        <link rel="shortcut icon" type="image/ico" href="assets/front_end/images/favicon.ico"/>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!-- This Template Is Fully Coded By Shakhawat H. from codingcouples.com -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <?php include './includes/header.php'; ?>
       
        <?php include './includes/menu.php'; ?>

        <!-- HOME SLIDER -->
        <?php
            if(isset($pages)) {
                if($pages == 'category') {
                     include './pages/category_content.php';
                }
                else if($pages == 'product-details') {
                    include './pages/product_details_content.php';
                }
                
                else if($pages == 'manufacturer') {
                    include './pages/manufacturer_content.php';
                }
                else if($pages == 'cart_view') {
                    include './pages/cart_view_content.php';
                }
                else if($pages == 'checkout') {
                    include './pages/checkout_content.php';
                }
                else if($pages == 'shipping') {
                    include './pages/shipping_content.php';
                }
                else if($pages == 'payment') {
                    include './pages/payment_content.php';
                }
                else if($pages == 'customer_home') {
                    include './pages/customer_home_content.php';
                }
                
            } else {
                include './pages/home_content.php';
            }
        
        ?>

        <?php include './includes/footer.php'; ?>

        <!-- JS Files -->
        <script src="https://code.jquery.com/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#slider-range").slider({
                    range: true,
                    min: 150,
                    max: 1500,
                    values: [520, 1100],
                    slide: function (event, ui) {
                        $("#amount").val("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
                    }
                });
                $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                        " - $" + $("#slider-range").slider("values", 1));
            });
        </script>

        <script src="assets/front_end/js/owl.carousel.min.js"></script>
        <script src="assets/front_end/js/lightbox.min.js"></script>
        <script src="assets/front_end/js/jquery.elevatezoom.js"></script>
        <script src="assets/front_end/js/jquery.bxslider.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.slider8').bxSlider({
                    mode: 'vertical',
                    slideWidth: 300,
                    minSlides: 3,
                    slideMargin: 10
                });
                $('.slider9').bxSlider({
                    mode: 'vertical',
                    slideWidth: 300,
                    minSlides: 3,
                    slideMargin: 10
                });
                $('.slider10').bxSlider({
                    mode: 'vertical',
                    slideWidth: 300,
                    minSlides: 3,
                    slideMargin: 10
                });
            });
        </script>
        <script src="assets/front_end/js/bootstrap-select.min.js"></script>
        <script src="assets/front_end/js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
        <script src="assets/front_end/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script src="assets/front_end/js/rs-plugin/rs.home.js"></script>
        <script src="assets/front_end/js/bootstrap.min.js"></script>
        <!--Opacity & Other IE fix for older browser-->
        <!--[if lte IE 8]>
                <script type="text/javascript" src="js/ie-opacity-polyfill.js"></script>
        <![endif]-->
        <script src="assets/front_end/js/main.js"></script>
    </body>
</html>
