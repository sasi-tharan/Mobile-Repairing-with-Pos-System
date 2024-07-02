<?php
require "config.php";

if (isset($_POST["submit"])) {
    $invoice_date = mysqli_real_escape_string($con, $_POST["invoice_date"]);
    $customer_name = mysqli_real_escape_string($con, $_POST["customer_name"]);
    $repair_code = mysqli_real_escape_string($con, $_POST["repair_code"]);
    $repair_date = mysqli_real_escape_string($con, $_POST["repair_date"]);
    $advance_amt = mysqli_real_escape_string($con, $_POST["advance_amt"]);

    $subtotal = mysqli_real_escape_string($con, $_POST["sub_total"]);
    $total_cost = mysqli_real_escape_string($con, $_POST["total_cost"]);

    $serv_charge = mysqli_real_escape_string($con, $_POST["serv_charge"]);
    $amt_paid = mysqli_real_escape_string($con, $_POST["amt_paid"]);
    $balance = mysqli_real_escape_string($con, $_POST["balance"]);
    $duebalance = mysqli_real_escape_string($con, $_POST["due_balance"]);

     $payment = mysqli_real_escape_string($con, $_POST["payment"]);
      $status = mysqli_real_escape_string($con, $_POST["status"]);

    $sql = "INSERT INTO repair_invoice (invoice_date, customer_name, repair_code, repair_date, advance_amt,sub_total, total_cost,serv_charge,amt_paid,balance,due_balance,payment,status) VALUES ('{$invoice_date}', '{$customer_name}', '{$repair_code}', '{$repair_date}','{$advance_amt}', '{$subtotal}', '{$total_cost}', '{$serv_charge}','{$amt_paid}','{$balance}','{$duebalance}','{$payment}','{$status}')";

    if ($con->query($sql)) {
        $sid = $con->insert_id;
    
        if (isset($_POST["product_name"]) && is_array($_POST["product_name"])) {
            $product_names = $_POST["product_name"];
            $unit_prices = $_POST["unit_price"];
            $quantities = $_POST["qty"];
            $totals = $_POST["total"];
    
            $sql2 = "INSERT INTO invoice_products (repair_invoice_id , PNAME, PRICE, QTY, TOTAL) VALUES ";
    
            $rows = array();
            for ($i = 0; $i < count($_POST["product_name"]); $i++) {
                $pname = mysqli_real_escape_string($con, $_POST["product_name"][$i]);
                $price = mysqli_real_escape_string($con, $_POST["unit_price"][$i]);
                $qty = mysqli_real_escape_string($con, $_POST["qty"][$i]);
                $total = mysqli_real_escape_string($con, $_POST["total"][$i]);
                $rows[] = "('{$sid}', '{$pname}', '{$price}', '{$qty}', '{$total}')";
            }
    
            $sql2 .= implode(", ", $rows); // Concatenate the rows with comma separation
            $sql2 .= ";";
    
            if ($con->query($sql2)) {
                header("Location: repairs_sales.php?success=true");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Invoice Added Failed.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>No products selected.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Invoice Added Failed.</div>";
    } 
}
?> 