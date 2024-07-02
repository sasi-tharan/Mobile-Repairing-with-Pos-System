<?php

require 'config.php';

if(isset($_POST['save_size']))
{
    $product_code = mysqli_real_escape_string($con, $_POST['product_code']);
    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
    $qty = mysqli_real_escape_string($con, $_POST['qty']);
    $unit_price = mysqli_real_escape_string($con, $_POST['unit_price']);
    $status = mysqli_real_escape_string($con, $_POST['status']);


    if($product_code == NULL ||  $product_name == NULL ||  $qty == NULL ||  $unit_price == NULL ||  $status == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO products (product_code,product_name,qty,unit_price,status) VALUES ('$product_code','$product_name','$qty','$unit_price','$status')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Product Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Product Not Created'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST['update_size']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $product_code = mysqli_real_escape_string($con, $_POST['product_code']);
    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
    $qty = mysqli_real_escape_string($con, $_POST['qty']);
    $unit_price = mysqli_real_escape_string($con, $_POST['unit_price']);
    $status = mysqli_real_escape_string($con, $_POST['status']);


    if($product_code == NULL ||  $product_name == NULL ||  $qty == NULL ||  $unit_price == NULL || $status == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE products SET product_code='$product_code',product_name='$product_name',qty='$qty',unit_price='$unit_price', status='$status' WHERE id='$product_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Product Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Product Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}

// if(isset($_POST['update_size']))
// {
//     $product_id = mysqli_real_escape_string($con, $_GET['product_id']);
//     $product_code = mysqli_real_escape_string($con, $_POST['product_code']);
//     $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
//     $qty = mysqli_real_escape_string($con, $_POST['qty']);
//     $unit_price = mysqli_real_escape_string($con, $_POST['unit_price']);
//     $status = mysqli_real_escape_string($con, $_POST['status']);


//     if($product_code == NULL ||  $product_name == NULL ||  $qty == NULL ||  $unit_price == NULL ||  $status == NULL)
//     {
//         $res = [
//             'status' => 422,
//             'message' => 'All fields are mandatory'
//         ];
//         echo json_encode($res);
//         return;
//     }

//     $query = "UPDATE products SET product_code='$product_code',product_name='$product_name',qty='$qty',unit_price='$unit_price', status='$status' WHERE id='$product_id'";
//     $query_run = mysqli_query($con, $query);

//     if($query_run)
//     {
//         $res = [
//             'status' => 200,
//             'message' => 'Product Updated Successfully'
//         ];
//         echo json_encode($res);
//         return;
//     }
//     else
//     {
//         $res = [
//             'status' => 500,
//             'message' => 'Product Not Updated'
//         ];
//         echo json_encode($res);
//         return;
//     }
// }

if(isset($_GET['product_id']))
{
    $product_id = mysqli_real_escape_string($con, $_GET['product_id']);

    $query = "SELECT * FROM products WHERE id='$product_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $product = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Product Fetch Successfully by id',
            'data' => $product
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'product_id Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_size']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $query = "DELETE FROM products WHERE id='$product_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Products Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Products Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>