<?php

include 'inc/header.php';
include 'config.php';



$sql = "select id,product_name from products";
$products = "<option>Select</option>";
$res = $con->query($sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $products .= "<option value='{$row["id"]}'>{$row["product_name"]}</option>";
    }
}


?>


<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Sales list</h2>
      </div>
   </div>
</div>

<div class="row">
   <div class="col-md-12">
      <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
            <div class="heading1 margin_0">
            <a href="sales.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-back"></i> Back</a>

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
                                <h3 class="card-title">Add New Invoice</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="salescode.php" method="POST">
                                <div class="card-body">
                                    <div class="form-row">
                                    <div class="form-group col-md-4">
                                            <label for="exampleInputPassword1">Date</label>
                                            <input type="date" name="invoice_date" class="form-control" id="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">Customer Name</label>
                                            <input type="text" name="cname" class="form-control" id="" placeholder="Enter Customer Name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputPassword1">Address</label>
                                            <input type="text" name="caddress" class="form-control" id="" placeholder="Enter Address">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputPassword1">PhoneNumber</label>
                                            <input type="number" name="cphone" class="form-control" id="" placeholder="Enter PhoneNumber">
                                        </div>
                                        
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                        <table class='table table-bordered' >
                                                    <thead>
                                                        <tr> 
                                                        <th>Product</th>
                                                        <th>Unit Price</th>
                                                        <th>Qty</th>
                                                        <th>Total</th>
                                                        <th>Add</th>
                                                        <th>Remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbl">
                                                        <tr>
                                                        <td><select class='id' name="product_name[]"><?php echo $products; ?></select></td>
                                                        <td><input class='price' type='text' name='unit_price[]'></td>
                                                        <td><input class='qty' type='text' name='qty[]'></td>
                                                        <td><input class='total' type='text' name='total[]'></td>
                                                        <td><input type='button' value='+' class='add' ></td>
                                                        <td><input type='button' value='-' class='rmv'></td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputPassword1">Total Amount</label>
                                            <input type="number" class="form-control" name="total_cost" id="total_cost">       
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputPassword1">Amount Paid</label>
                                            <input type="number" name="amt_paid" class="form-control" id="amt_paid" onchange="GetGrandTotal()" placeholder="Enter Amount Paid">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputPassword1">Balance</label>
                                            <input type="number" class="form-control" id="balance" name="balance" value="0" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label>Payment</label>
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
                                        <button type="submit" name="submit" class="btn btn-primary">Proceed</button>
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
    <script>
      $(document).ready(function(){
        
        //Add Row
        $("body").on("click", ".add", function () {
  var products = "<?php echo $products; ?>";
  $("#tbl").append(
    "<tr> <td><select class='id' name='product_name[]'>" +
      products +
      "</select></td> <td><input class='price' type='text' name='unit_price[]'></td> <td><input class='qty' type='text' name='qty[]'></td> <td><input class='total' type='text' name='total[]'></td> <td><input type='button' value='+' class='add'></td> <td><input type='button' value='-' class='rmv'></td> </tr>"
  );
  total_cost();
});
        
        //Remove Row
        $("body").on("click",".rmv",function(){
          $(this).parents("tr").remove();
          total_cost();
        });
        
        //Get product price
        $("body").on("change",".id",function(){
          var id=$(this).val();
          var input=$(this).parents("tr").find(".price");
          $.ajax({
            url:"get_price.php",
            type:"post",
            data:{id:id},
            success:function(res){
              $(input).val(res);
            }
          });
        });
        
        //Find Total
        $("body").on("keyup",".qty",function(){
          var qty=Number($(this).val());
          var price=Number($(this).parents("tr").find(".price").val());
          $(this).parents("tr").find(".total").val(qty*price);
          total_cost();
        });

        function total_cost() {
                var tot = 0;
                $(".total").each(function() {
                    tot += Number($(this).val());
                });
                $("#total_cost").val(tot);
            }

            // Calculate balance
            $("body").on("keyup", "#amt_paid", function() {
                var grandTotal = Number($("#total_cost").val());
                var amtPaid = Number($(this).val());
                var balance = grandTotal - amtPaid;
                $("#balance").val(balance);
                total_cost();
            });
      });

      
    </script>


