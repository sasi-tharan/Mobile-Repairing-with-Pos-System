<?php
  include "config.php";
  $sql="select unit_price from products where id={$_POST["id"]}";
  $res=$con->query($sql);
  if($res->num_rows>0){
    $row=$res->fetch_assoc();
    echo $row["unit_price"];
  }
  else{
    echo "0";
  }
?>