<?php
$category_id = $_GET['id']; 
$query_result = $obj_category->select_category_info_by_id($category_id);
 $catgory_info = mysqli_fetch_assoc($query_result);
 extract($catgory_info);

   if(isset($_POST['btn'])) {
       $obj_category->update_category_info_by_id($_POST);
   }
   
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead">Edit Category Form</p>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" name="edit_category_form">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Category Name</label>
                        <div class="col-lg-9">
                            <input type="text" name="category_name" value="<?php echo $category_name; ?>" class="form-control" required>
                            <input type="hidden" name="category_id" value="<?php echo $category_id; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Category Description</label>
                        <div class="col-lg-9">
                            <textarea name="category_description" class="form-control" rows="6"><?php echo $category_description; ?></textarea>
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
                            <input type="submit" name="btn" value="Update Category Info" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['edit_category_form'].elements['publication_status'].value='<?php echo $publication_status; ?>';
</script>