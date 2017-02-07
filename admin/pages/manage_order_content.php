<?php
$message = '';
if (isset($_GET['status'])) {
    $manufacturer_id = $_GET['id'];
    if ($_GET['status'] == 'unpublished') {
        $message = $obj_manufacturer->unpublished_manufacturer_info_by_id($manufacturer_id);
    } else if ($_GET['status'] == 'published') {
        $message = $obj_manufacturer->published_manufacturer_info_by_id($manufacturer_id);
    } else if ($_GET['status'] == 'delete') {
        $message = $obj_manufacturer->delete_manufacturer_info_by_id($manufacturer_id);
    }
}
$query_result = $obj_order->select_all_order_info();
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
                All Order information goes here
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Order Total</th>
                            <th>Order Status</th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($order_info = mysqli_fetch_assoc($query_result)) {
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $order_info['order_id']; ?></td>
                                <td><?php echo $order_info['first_name'].' '.$order_info['last_name']; ?></td>
                                <td><?php echo $order_info['order_total']; ?></td>
                                <td><?php echo $order_info['order_status']; ?></td>
                                <td><?php echo $order_info['payment_type']; ?></td>
                                <td class="center"><?php  echo $order_info['payment_status'];  ?></td>
                                <td class="center">
                                    <a href="view_order.php?id=<?php echo $order_info['order_id']; ?>" class="btn btn-success" title="VIEW ORDER">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                        <a href="view_invoice.php?id=<?php echo $order_info['order_id']; ?>" class="btn btn-primary" title="VIEW INVOICE">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </a>

                                        <a href="download_invoice.php?<?php echo $order_info['order_id']; ?>" class="btn btn-danger" title="DOWNLOAD INVOICE">
                                            <span class="glyphicon glyphicon-download"></span>
                                        </a>

                                    <a href="edit_order.php?id=<?php echo $order_info['order_id']; ?>" class="btn btn-success" title="Edit ORDER">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="?status=delete&&id=<?php echo $order_info['order_id']; ?>" class="btn btn-danger" title="Delete ORDER" onclick="return check_delete_status();
                                       ">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php   } ?>
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