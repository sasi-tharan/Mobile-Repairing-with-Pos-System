<?php

include 'inc/header.php';
include 'config.php';

// retrieve customer names from database
$query = "SELECT DISTINCT customer_name FROM repairs ORDER BY customer_name";
$result = mysqli_query($con, $query);

// Retrieve the repair information for the selected customer
if (isset($_POST['customer'])) {
    $customer = $_POST['customer'];
    $sql = "SELECT repair_code, repair_date, issues, advance_amt FROM repairs WHERE customer_name = '$customer'";
    $result = $con->query($sql);
  
    if ($result->num_rows > 0) {
      // Display the repair information in the form
      $row = $result->fetch_assoc();
      $repair_code = $row['repair_code'];
      $repair_date = $row['repair_date'];
      $issues = $row['issues'];
      $advance_amt = $row['advance_amt'];
      ?>
      <script>
        document.getElementById('repair_code').value = "<?php echo $repair_code; ?>";
        document.getElementById('repair_date').value = "<?php echo $repair_date; ?>";
        document.getElementById('issues').value = "<?php echo $issues; ?>";
        document.getElementById('advance_amt').value = "<?php echo $advance_amt; ?>";
      </script>
      <?php
    }
  }


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
            <h2>Repair Sales list</h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <a href="repairs_sales.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-back"></i> Back</a>

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
                                    <h3 class="card-title">Add New Repair Invoice</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="repairsalescode.php" method="POST">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputPassword1">Date</label>
                                                <input type="date" name="invoice_date" class="form-control" id="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">Customer Name</label>
                                                <select name="customer_name" id="customer_name" style="width: 100%;">
                                                    <?php
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo "<option value='" . $row['customer_name'] . "'>" . $row['customer_name'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
 
                                        </div>
                                        <div class="form-row">
                                        <div class="form-group col-md-3">
                                                <label for="exampleInputPassword1">Repair Code</label>
                                                <input type="text" name="repair_code" class="form-control" id="repair_code">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputPassword1">Repair Date</label>
                                                <input type="text" name="repair_date" class="form-control" id="repair_date">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputPassword1">Issue</label>
                                                <input type="text" name="issues" class="form-control" id="issues">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputPassword1">Advance Amount</label>
                                                <input type="text" name="advance_amt" class="form-control" id="advance_amt">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <table class='table table-bordered'>
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
                                                            <td><select class='id' name="product_name[]">
                                                                    <?php echo $products; ?>
                                                                </select></td>
                                                            <td><input class='price' type='text' name='unit_price[]'>
                                                            </td>
                                                            <td><input class='qty' type='text' name='qty[]'></td>
                                                            <td><input class='total' type='text' name='total[]'></td>
                                                            <td><input type='button' value='+' class='add'></td>
                                                            <td><input type='button' value='-' class='rmv'></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                             <div class="form-group col-md-3">
                                                <label for="exampleInputPassword1">Sub Total</label>
                                                <input type="number" class="form-control" name="sub_total"
                                                    id="sub_total">
                                            </div>
                                        <div class="form-group col-md-3">
                                                <label for="exampleInputPassword1">Service Charge</label>
                                                <input type="number" class="form-control" name="serv_charge"
                                                    id="serv_charge">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputPassword1">Total Amount</label>
                                                <input type="number" class="form-control" name="total_cost"
                                                    id="total_cost">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputPassword1">Balance</label>
                                                <input type="number" class="form-control" id="balance" name="balance"  
                                                    value="0" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputPassword1">Amount Paid</label>
                                                <input type="number" name="amt_paid" class="form-control" id="amt_paid"
                                                onchange="calculate_balance()" placeholder="Enter Amount Paid">
                                            </div>
                                            
                                             <div class="form-group col-md-3">
                                                <label for="exampleInputPassword1">Due Balance</label>
                                                <input type="number" class="form-control" id="due_balance" name="due_balance"  
                                                    value="0" readonly>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group">
                                                <label>Payment</label>
                                                <select class="select2" name="payment" data-placeholder=""
                                                    style="width: 100%;">
                                                    <option value="0" <?= isset($payment) && $payment == 0 ? "selected" : "" ?>>Paid</option>
                                                    <option value="1" <?= isset($payment) && $payment == 1 ? "selected" : "" ?>>UnPaid</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Status</label>
                                                <select class="select2" name="status" data-placeholder=""
                                                    style="width: 100%;">
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
  $(document).ready(function() {
    $('#customer_name').on('change', function() {
      var customer_name = $(this).val();
      if (customer_name) {
        $.ajax({
          url: 'get_repairs.php',
          type: 'POST',
          data: {customer_name: customer_name},
          dataType: 'json',
          success: function(data) {
            $('#repair_code').val(data.repair_code);
            $('#repair_date').val(data.repair_date);
            $('#issues').val(data.issues);
            $('#advance_amt').val(data.advance_amt);
          }
        });
      } else {
        $('#repair_code').val('');
        $('#repair_date').val('');
        $('#issues').val('');
        $('#advance_amt').val('');
      }
    });
  });
</script>


<script>
    $(document).ready(function () {

        //Add Row
        $("body").on("click", ".add", function () {
            var products = "<?php echo $products; ?>";
            $("#tbl").append(
                "<tr> <td><select class='id' name='product_name[]'>" +
                products +
                "</select></td> <td><input class='price' type='text' name='unit_price[]'></td> <td><input class='qty' type='text' name='qty[]'></td> <td><input class='total' type='text' name='total[]'></td> <td><input type='button' value='+' class='add'></td> <td><input type='button' value='-' class='rmv'></td> </tr>"
            );
            sub_total();
        });

        //Remove Row
        $("body").on("click", ".rmv", function () {
            $(this).parents("tr").remove();
            sub_total();
            calculate_balance();
        });

        //Get product price
        $("body").on("change", ".id", function () {
            var id = $(this).val();
            var input = $(this).parents("tr").find(".price");
            $.ajax({
                url: "get_price.php",
                type: "post",
                data: { id: id },
                success: function (res) {
                    $(input).val(res);
                }
            });
        });

        //Find Total
        $("body").on("keyup", ".qty", function () {
            var qty = Number($(this).val());
            var price = Number($(this).parents("tr").find(".price").val());
            $(this).parents("tr").find(".total").val(qty * price);
            sub_total();
            calculate_balance();
        });

        function sub_total() {
            var tot = 0;
            $(".total").each(function () {
                tot += Number($(this).val());
            });
            $("#sub_total").val(tot);
        }

        $("body").on("keyup","#serv_charge", function () {
            var subTotal = Number($("#sub_total").val());
            var servCharge = Number($(this).val());

            var totalCost = subTotal + servCharge ;
            $("#total_cost").val(totalCost);
            calculate_balance();
        });

        $("body").on("keyup","#advance_amt", function () {
            calculate_balance();
        });

        function calculate_balance() {
            var totalCost = Number($("#total_cost").val());
            var advanceAmount = Number($("#advance_amt").val());

            var balance = totalCost - advanceAmount;

            if (balance < 0) {
                balance = 0;
            }

            $("#balance").val(balance);
        }

        $("body").on("keyup","#amt_paid", function () {
            var balance = Number($("#balance").val());
            var amt_paid = Number($(this).val());

            var dueBalance = balance - amt_paid ;
            $("#due_balance").val(dueBalance);
        });

    });
</script>
