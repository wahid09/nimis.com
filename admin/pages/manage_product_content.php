<?php
$message = '';
if (isset($_GET['status'])) {
    $product_id = $_GET['id'];
    if ($_GET['status'] == 'unpublished') {
        $message = $obj_product->unpublished_product_info_by_id($product_id);
    } else if ($_GET['status'] == 'published') {
        $message = $obj_product->published_product_info_by_id($product_id);
    } else if ($_GET['status'] == 'delete') {
        $message = $obj_product->delete_product_info_by_id($product_id);
    }
}

$query_result = $obj_product->select_all_product_info();
//while ($all_product = mysqli_fetch_assoc($query_result)) {
//    echo '<pre>';
//    print_r($all_product);
//}
//exit();


?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center text-success">

            <?php echo $message; ?>
            <?php
            if (isset($_SESSION['message'])) {
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
                All Product information goes here
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Manufacturer Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                       while ($all_product = mysqli_fetch_assoc($query_result)) {
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $all_product['product_name']; ?></td>
                                <td><?php echo $all_product['category_name']; ?></td>
                                <td><?php echo $all_product['manufacturer_name']; ?></td>
                                <td><?php echo $all_product['product_price']; ?></td>
                                <td><?php echo $all_product['product_quantity']; ?></td>
                                <td class="center"><?php
                                    if ($all_product['publication_status'] == 1) {
                                        echo 'Published';
                                    } else {
                                        echo 'Unpublished';
                                    }
                                    ?></td>
                                <td class="center">
                                    <a href="view_product.php?id=<?php echo $all_product['product_id']; ?>" class="btn btn-success" title="View">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                    <?php if ($all_product['publication_status'] == 1) { ?>
                                        <a href="?status=unpublished&&id=<?php echo $all_product['product_id']; ?>" class="btn btn-primary" title="Unpublished">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    <?php } else { ?>
                                        <a href="?status=published&&id=<?php echo $all_product['product_id']; ?>" class="btn btn-danger" title="Published">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    <?php } ?>
                                    <a href="edit_product.php?id=<?php echo $all_product['product_id']; ?>" class="btn btn-success" title="Edit">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="?status=delete&&id=<?php echo $all_product['product_id']; ?>" class="btn btn-danger" title="Delete" onclick="return check_delete_status();
                                       ">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
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