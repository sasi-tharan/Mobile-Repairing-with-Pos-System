<?php
  // establish database connection
  $con = mysqli_connect('localhost', 'root', '', 'hkm_db');
  
  // get customer name from POST data
  $customer_name = mysqli_real_escape_string($con, $_POST['customer_name']);
  
  // retrieve repair details from database
  $query = "SELECT repair_code, repair_date, issues, advance_amt FROM repairs WHERE customer_name = '$customer_name'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);
  
  // close database connection
  mysqli_close($con);
  
  // return repair details in JSON format
  echo json_encode($row);
?>