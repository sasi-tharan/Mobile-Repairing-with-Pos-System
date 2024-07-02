<?php

require 'config.php';

if(isset($_POST['update_repair_invoice']))
{
      $repair_invoice_id = mysqli_real_escape_string($con, $_POST['repair_invoice_id']);
      $due_balance = mysqli_real_escape_string($con, $_POST["due_balance"]);
      $pay_balance = mysqli_real_escape_string($con, $_POST["pay_balance"]);
      $status = mysqli_real_escape_string($con, $_POST["status"]);
      $paymentupdate_date = mysqli_real_escape_string($con, $_POST["paymentupdate_date"]);


    if($due_balance == NULL ||  $pay_balance == NULL ||  $status == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE repair_invoice SET due_balance='$due_balance',pay_balance='$pay_balance',status='$status',paymentupdate_date='$paymentupdate_date'WHERE repair_invoice_id='$repair_invoice_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Invoice Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Invoice Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_GET['repair_invoice_id']))
{
    $repair_invoice_id = mysqli_real_escape_string($con, $_GET['repair_invoice_id']);

    $query = "SELECT * FROM repair_invoice WHERE repair_invoice_id='$repair_invoice_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $repair_invoice = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Invoice Fetch Successfully by id',
            'data' => $repair_invoice
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Invoice Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_invoice']))
{
    $repair_invoice_id = mysqli_real_escape_string($con, $_POST['repair_invoice_id']);

    $query = "DELETE FROM repair_invoice WHERE repair_invoice_id='$repair_invoice_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Invoice Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Invoice Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}


?>