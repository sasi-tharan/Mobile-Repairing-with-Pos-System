<?php

include 'inc/header.php';
include 'config.php';
?>


<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Orders list</h2>
      </div>
   </div>
</div>

<div class="row">
   <div class="col-md-12">
      <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
            <div class="heading1 margin_0">
            <a href="add_new_order.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Add New order</a>

            </div>
         </div>
         <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
            <?php
               $conn = mysqli_connect("localhost", "root", "", "album_db");
               $query = "SELECT * FROM sizes ";
               $query_run = mysqli_query($conn, $query);
               ?>
               <table id="sizeTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Balance</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'config.php';

                            $query = "SELECT * FROM orders";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $order)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $order['id'] ?></td>
                                         <td><?= $order['order_id'] ?></td>
                                        <td><?= $order['order_date'] ?></td>
                                        <td><?= $order['customer_name'] ?></td>
                                        <td><?= $order['customer_phone'] ?></td>
                                        <td><?= $order['balance'] ?></td>
                                         <td class="text-center">
                                                            <?php
                                                            switch ($order['status']) {
                                                                case 1:
                                                                    echo '<span class="rounded-pill badge badge-success">Active</span>';
                                                                    break;
                                                                case 0:
                                                                    echo '<span class="rounded-pill badge badge-info">Deactive</span>';
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                        <td>
                                            <button type="button" value="<?=$order['id'];?>" class="viewbtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$order['id'];?>" class="ordereditbtn btn btn-success btn-sm">Edit</button>
                                            <button type="button" value="<?=$order['id'];?>" class="deletebtn btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    


