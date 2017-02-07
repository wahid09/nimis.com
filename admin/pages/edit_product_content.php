<?php
require '../classes/application.php';
$obj_app = new Application();

$category_result = $obj_app->select_all_published_category_info();
$manufacturer_result = $obj_app->select_all_published_manufacturer_info();

if (isset($_POST['btn'])) {
    $message = $obj_product->update_product_info($_POST);
}

$product_id = $_GET['id'];
$query_result = $obj_product->select_product_info_by_id($product_id);
$product_info = mysqli_fetch_assoc($query_result);
extract($product_info);
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead"><?php
                    if (isset($message)) {
                        echo $message;
                    }
                ?></p>                      
                <p class="text-center text-success lead">Edit Product</p>
                <div class="panel-body">
                    <form name="edit_product_form" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-lg-3">Product Name</label>
                            <div class="col-lg-9">
                                <input type="text" name="product_name" value="<?php echo $product_name; ?>" class="form-control">
                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" class="form-control">
                            </div>
                        </div>=
                        <div class="form-group">
                            <label class="control-label col-lg-3">Category Name</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="category_id">
                                    <option>--Select publication status--</option>
                                    <?php while ($published_category = mysqli_fetch_assoc($category_result)) { ?>
                                        <option value="<?php echo $published_category['category_id']; ?>"><?php echo $published_category['category_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3">Manufacturer Name</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="manufacturer_id">
                                    <option>--Select publication status--</option>
                                    <?php while ($published_manufacturer = mysqli_fetch_assoc($manufacturer_result)) { ?>
                                        <option value="<?php echo $published_manufacturer['manufacturer_id']; ?>"><?php echo $published_manufacturer['manufacturer_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Product Price</label>
                            <div class="col-lg-9">
                                <input type="number" name="product_price" value="<?php echo $product_price; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Product Quantity</label>
                            <div class="col-lg-9">
                                <input type="number" name="product_quantity" value="<?php echo $product_quantity; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Product short Description </label>
                            <div class="col-lg-9">
                                <textarea name="product_short_description" class="form-control" rows='4'><?php echo $product_short_description; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Product Long Description </label>
                            <div class="col-lg-9">
                                <textarea name="product_long_description" class="form-control" rows='6'><?php echo $product_long_description; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3">Product Image</label>
                            <div class="col-lg-9">
                                <input type="file"  name="product_image" id="img1">
                                <img src="<?php echo $product_image; ?>" alt="" class="img-circle" height="150" width="150">
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3">publication Status</label>
                            <div class="col-lg-9">
                                <select class="form-control" name="publication_status">
                                    <option>--Select publication status--</option>
                                    <option value="1">publish</option>
                                    <option value="0">Unpublish</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3"></label>
                            <div class="col-jg-offset-3 col-lg-9">
                                <input type="submit" name="btn"  value="Update Product Info" class="btn btn-success btn-block">
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['edit_product_form'].elements['publication_status'].value = '<?php echo $publication_status; ?>';
    document.forms['edit_product_form'].elements['category_id'].value = '<?php echo $category_id; ?>';
    document.forms['edit_product_form'].elements['manufacturer_id'].value = '<?php echo $manufacturer_id; ?>';

</script>
