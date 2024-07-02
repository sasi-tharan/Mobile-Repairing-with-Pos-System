<?php

require 'config.php';

if(isset($_POST['save_repair']))
{
    $repair_code = mysqli_real_escape_string($con, $_POST['repair_code']);
    $repair_date = mysqli_real_escape_string($con, $_POST['repair_date']);
    $customer_name = mysqli_real_escape_string($con, $_POST['customer_name']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $imei = mysqli_real_escape_string($con, $_POST['imei']);
    $issues = mysqli_real_escape_string($con, $_POST['issues']);
    $accessories = mysqli_real_escape_string($con, $_POST['accessories']);
    $advance_amt = mysqli_real_escape_string($con, $_POST['advance_amt']);
    $status = mysqli_real_escape_string($con, $_POST['status']);


    if($repair_code == NULL ||  $repair_date == NULL ||  $customer_name == NULL ||  $mobile == NULL ||  $imei == NULL ||  $issues == NULL ||  $accessories == NULL || $status == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO repairs (repair_code,repair_date,customer_name,mobile,imei,issues,accessories,advance_amt,status) VALUES ('$repair_code','$repair_date','$customer_name','$mobile','$imei','$issues','$accessories','$advance_amt','$status')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Repair Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Repair Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_GET['repair_id']))
{
    $repair_id = mysqli_real_escape_string($con, $_GET['repair_id']);

    $query = "SELECT * FROM repairs WHERE id='$repair_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $repair = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Repair Fetch Successfully by id',
            'data' => $repair
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Repair ID Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_repair']))
{
    $repair_id = mysqli_real_escape_string($con, $_POST['repair_id']);

    $query = "DELETE FROM repairs WHERE id='$repair_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Repair Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Repair Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['update_repair']))
{
    $repair_id = mysqli_real_escape_string($con, $_POST['repair_id']);

    $repair_code = mysqli_real_escape_string($con, $_POST['repair_code']);
    $repair_date = mysqli_real_escape_string($con, $_POST['repair_date']);
    $customer_name = mysqli_real_escape_string($con, $_POST['customer_name']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $imei = mysqli_real_escape_string($con, $_POST['imei']);
    $issues = mysqli_real_escape_string($con, $_POST['issues']);
    $accessories = mysqli_real_escape_string($con, $_POST['accessories']);
    $advance_amt = mysqli_real_escape_string($con, $_POST['advance_amt']);
    $status = mysqli_real_escape_string($con, $_POST['status']);


    if($repair_code == NULL ||  $repair_date == NULL ||  $customer_name == NULL ||  $mobile == NULL ||  $imei == NULL ||  $issues == NULL ||  $accessories == NULL || $status == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE repairs SET repair_date='$repair_date',repair_code='$repair_code',customer_name='$customer_name',mobile='$mobile',imei='$imei',issues='$issues',accessories='$accessories',advance_amt='$advance_amt',status='$status' WHERE id='$repair_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Repair Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Repair Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}


?>