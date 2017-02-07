<?php
$message = '';

if (isset($_POST['btn'])) {
    $message = $obj_manufacturer->save_manufacturer_info($_POST);
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead">Add Manufacturer Form</p>
                <h3 class="text-center text-success lead"><?php echo $message; ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Manufacturer Name</label>
                        <div class="col-lg-9">
                            <input type="text" name="manufacturer_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Manufacturer Description</label>
                        <div class="col-lg-9">
                            <textarea name="manufacturer_description" class="form-control" rows="6"></textarea>
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
                            <input type="submit" name="btn" value="Save Manufacturer Info" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>