<?php
    require '../classes/application.php';
    $obj_app = new Application();
    
   $category_result = $obj_app->select_all_published_category_info();
   $manufacturer_result = $obj_app->select_all_published_manufacturer_info();
   
   if(isset($_POST['btn'])) {
       $message = $obj_product->save_product_info($_POST);
   }
   

?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead"><?php if(isset($message)) {echo $message;} ?></p>                      
                <p class="text-center text-success lead">Add Product</p>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Product Name</label>
                        <div class="col-lg-9">
                            <input type="text" name="product_name" class="form-control">
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
                            <input type="number" name="product_price" class="form-control">
                        </div>
                        </div>
                         <div class="form-group">
                        <label class="control-label col-lg-3">Product Quantity</label>
                        <div class="col-lg-9">
                            <input type="number" name="product_quantity" class="form-control">
                        </div>
                        </div>
                     <div class="form-group">
                        <label class="control-label col-lg-3">Product short Description </label>
                        <div class="col-lg-9">
                            <textarea name="product_short_description" class="form-control" rows='4'></textarea>
                        </div>
                        </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Product Long Description </label>
                        <div class="col-lg-9">
                            <textarea name="product_long_description" class="form-control" rows='6'></textarea>
                        </div>
                        </div>
                      <div class="form-group">
                        <label class="control-label col-lg-3">Product Image</label>
                        <div class="col-lg-9">
                            <input type="file"  name="product_image">
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
                            <input type="submit" name="btn"  value="Save Product Info" class="btn btn-success btn-block">
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

