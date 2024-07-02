<?php

require 'config.php';

if(isset($_POST['save_type']))
{
    $type_name = mysqli_real_escape_string($con, $_POST['type_name']);
    $status = mysqli_real_escape_string($con, $_POST['status']);


    if($type_name == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO types (type_name,status) VALUES ('$type_name','$status')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'type Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'type Not Created'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST['update_type']))
{
    $type_id = mysqli_real_escape_string($con, $_POST['type_id']);

    $type_name = mysqli_real_escape_string($con, $_POST['type_name']);
    $status = mysqli_real_escape_string($con, $_POST['status']);


    if($type_name == NULL || $status == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE types SET type_name='$type_name', status='$status' WHERE id='$type_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'type Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'type Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_GET['type_id']))
{
    $type_id = mysqli_real_escape_string($con, $_GET['type_id']);

    $query = "SELECT * FROM types WHERE id='$type_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $type = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'type Fetch Successfully by id',
            'data' => $type
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'type Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_type']))
{
    $type_id = mysqli_real_escape_string($con, $_POST['type_id']);

    $query = "DELETE FROM types WHERE id='$type_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'type Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'type Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>