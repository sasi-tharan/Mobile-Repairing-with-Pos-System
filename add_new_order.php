<?php

include 'inc/header.php';
include 'config.php';

$sql = "SELECT * FROM `types`";
    $all_types = mysqli_query($con,$sql);

    $sql2 = "SELECT * FROM `sizes`";
    $all_products = mysqli_query($con,$sql2);
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
            <a href="orders.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-back"></i> Back</a>

            </div>
         </div>
         <div class="table_section padding_infor_info">
            <div class="form-responsive-sm">
            <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Order Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="repair.php" method="POST">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">Customer Name</label>
                                            <input type="text" name="c_name" class="form-control" id="" placeholder="Enter Customer Name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputPassword1">Address</label>
                                            <input type="text" name="c_address" class="form-control" id="" placeholder="Enter Address">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputPassword1">PhoneNumber</label>
                                            <input type="number" name="c_phone" class="form-control" id="" placeholder="Enter PhoneNumber">
                                        </div>
                                        
                                    </div>
                                    <div class="form-row">
                                    <div class="form-group col-md-3">
                                            <label for="exampleInputPassword1">Order Date</label>
                                            <input type="date" name="order_date" class="form-control" id="" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">Order Person</label>
                                            <input type="text" name="order_person" class="form-control" id="" placeholder="Enter Person Entered">
                                        </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputPassword1">Remarks</label>
                                            <textarea class="form-control" name="remarks" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <table class="table table-bordered">
                                                <thead class="table-success">
                                                    <tr>
                                                        <th width="15%"scope="col">Type</th>
                                                         <th width="15%"scope="col">Product</th>
                                                        <th width="5%" class="text-end">Quantity</th>
                                                         <th width="5%"scope="col" class="text-end">Price</th>
                                                        <th width="5%"scope="col" class="text-end">Amount</th>
                                                        <th width="5%" class="NoPrint">
                                                            <button type="button" class="btn btn-sm btn-success" onclick="BtnAdd()">+</button>
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody id="TBody_1">
                                                    <tr id="TRow_1" class="d-none_1">
                                                        <td>
                                                        <select class='tid'>
                                                             <?php

                                                                        while ($type = mysqli_fetch_array(
                                                                                $all_types,MYSQLI_ASSOC)):;
                                                                    ?>
                                                                        <option value="<?php echo $type["id"];
                                                                            // The value we usually set is the primary key
                                                                        ?>">
                                                                            <?php echo $type["type_name"];
                                                                                // To show the category name to the user
                                                                            ?>
                                                                        </option>
                                                                    <?php
                                                                        endwhile;
                                                                        // While loop must be terminated
                                                                    ?>

                                                        </select>
                                                    </td>
                                                        <td>
                                                            <select class='pid'>
                                                            <?php

                                                                        while ($product = mysqli_fetch_array(
                                                                                $all_products,MYSQLI_ASSOC)):;
                                                                        ?>
                                                                        <option value="<?php echo $product["id"];
                                                                            // The value we usually set is the primary key
                                                                        ?>">
                                                                            <?php echo $product["product_name"];
                                                                                // To show the category name to the user
                                                                            ?>
                                                                        </option>
                                                                        <?php
                                                                        endwhile;
                                                                        // While loop must be terminated
                                                                        ?>

                                                        </select>
                                                    </td>
                                                        <td><input type="number" class="form-control text-end" name="qty" value="" onchange="Calc(this);"></td>
                                                        <td><input type="number" class="form-control text-end" name="product_price" value="" onchange="Calc(this);"></td>
                                                        <td><input type="number" class="form-control text-end" name="amount" value="" disabled=""></td>
                                                        <td class="NoPrint"><button type="button" class="btn btn-sm btn-danger" onclick="BtnDel(this)">X</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                    <div class="form-group col-md-3">
                                            <label for="exampleInputPassword1">Sub Total</label>
                                            <input type="number" class="form-control" name="sub_total"  id="sub_total">       
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputPassword1">Total Amount</label>
                                            <input type="number" class="form-control" name="total_cost" id="total_cost">       
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputPassword1">Amount Paid</label>
                                            <input type="number" name="amt_paid" class="form-control" id="amt_paid" onchange="GetGrandTotal()" placeholder="Enter Amount Paid">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputPassword1">Due Balance</label>
                                            <input type="number" class="form-control" id="payable_amount" name="payable_amount" value="0" disabled>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="select2" name="payment" data-placeholder="" style="width: 100%;">
                                                <option value="0" <?= isset($payment) && $payment == 0 ? "selected" : "" ?>>Paid</option>
                                                <option value="1" <?= isset($payment) && $payment == 1 ? "selected" : "" ?>>UnPaid</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Status</label>
                                            <select class="select2" name="status" data-placeholder="" style="width: 100%;">
                                                <option value="0" <?= isset($status) && $status == 0 ? "selected" : "" ?>>Progress</option>
                                                <option value="1" <?= isset($status) && $status == 1 ? "selected" : "" ?>>Pending</option>
                                                <option value="2" <?= isset($status) && $status == 2 ? "selected" : "" ?>>Checking</option>
                                                <option value="3" <?= isset($status) && $status == 3 ? "selected" : "" ?>>Completed</option>
                                                <option value="4" <?= isset($status) && $status == 4 ? "selected" : "" ?>>Cancelled</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" name="repair_btn" class="btn btn-primary">Proceed</button>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                        <!-- /.card -->
                        <!-- /.row -->
                        <!-- Main row -->
                    </div>
                </div>
               
            </div>
         </div>

      </div>
   </div>
</div>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    


