<?php
$manufacturer_id = $_GET['id']; 
$query_result = $obj_manufacturer->select_manufacturer_info_by_id($manufacturer_id);
 $catgory_info = mysqli_fetch_assoc($query_result);
 extract($catgory_info);

   if(isset($_POST['btn'])) {
       $obj_manufacturer->update_manufacturer_info_by_id($_POST);
   }
   
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead">Edit Manufacturer Form</p>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" name="edit_manufacturer_form">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Manufacturer Name</label>
                        <div class="col-lg-9">
                            <input type="text" name="manufacturer_name" value="<?php echo $manufacturer_name; ?>" class="form-control" required>
                            <input type="hidden" name="manufacturer_id" value="<?php echo $manufacturer_id; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Manufacturer Description</label>
                        <div class="col-lg-9">
                            <textarea name="manufacturer_description" class="form-control" rows="6"><?php echo $manufacturer_description; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Publication Status</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="publication_status">
                                <option> --- Select Publication Status --- </option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <input type="submit" name="btn" value="Update manufacturer Info" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['edit_manufacturer_form'].elements['publication_status'].value='<?php echo $publication_status; ?>';
</script>