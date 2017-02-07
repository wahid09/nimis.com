<?php
$message= '';

if(isset($_GET['status'])) {
    $category_id=$_GET['id'];
    if($_GET['status'] == 'unpublished') {
        $message = $obj_category->unpublished_category_info_by_id($category_id);
    }
    else if ($_GET['status'] == 'published') {
         $message = $obj_category->published_category_info_by_id($category_id);
    }
    else if ($_GET['status'] == 'delete') {
         $message = $obj_category->delete_category_info_by_id($category_id);
    }
} 
$query_result = $obj_category->select_all_category_info();
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center text-success">
            <?php echo $message; ?>
            <?php
                if(isset($_SESSION['message'])) {
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                }
            ?>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center lead">
                All Category information goese here
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; while ( $category_info = mysqli_fetch_assoc($query_result))  { ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $category_info['category_name']; ?></td>
                            <td><?php echo $category_info['category_description']; ?></td>
                            <td class="center"><?php 
                                if ( $category_info['publication_status'] == 1 ) {
                                    echo 'Published';
                                }  else {
                                    echo 'Unpublished';
                                }
                            ?></td>
                            <td class="center">
                                <?php  if ( $category_info['publication_status'] == 1 ) { ?>
                                <a href="?status=unpublished&&id=<?php echo $category_info['category_id']; ?>" class="btn btn-primary" title="Unpublished">
                                    <span class="glyphicon glyphicon-arrow-down"></span>
                                </a>
                                <?php } else { ?>
                                <a href="?status=published&&id=<?php echo $category_info['category_id']; ?>" class="btn btn-danger" title="Published">
                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                </a>
                                <?php } ?>
                                <a href="edit_category.php?id=<?php echo $category_info['category_id']; ?>" class="btn btn-success" title="Edit">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="?status=delete&&id=<?php echo $category_info['category_id']; ?>" class="btn btn-danger" title="Delete" onclick="return check_delete_status(); ">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
                
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>