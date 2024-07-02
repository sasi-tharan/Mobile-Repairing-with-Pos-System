<?php
include('inc/header.php');
?>


<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Dashboard</h2>
      </div>
   </div>
</div>
<div class="row column1">
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div>
               <i class="fa fa-user yellow_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no">
                  <?php
                  require('config.php');
                  $query = "SELECT * from invoice";

                  if ($result = mysqli_query($con, $query)) {

                     // Return the number of rows in result set
                     $rowcount = mysqli_num_rows($result);

                     // Display result
                     printf($rowcount);
                  }
                  ?>
               </p>
               <p class="head_couter">Total Invoice</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div>
               <i class="fa fa-clock-o blue1_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no">
                  <?php
                  require('config.php');

                  $query = "SELECT sum(total_cost) as total FROM invoice";

                  $query_run = mysqli_query($con, $query);

                  while ($row = mysqli_fetch_assoc($query_run)) {
                     echo $row['total'];
                     echo '.00';
                  }

                  mysqli_close($con);
                  ?>
               </p>
               <p class="head_couter">Total Sales</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div>
               <i class="fa fa-cloud-download green_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no">
                  <?php
                  require('config.php');

                  $query = "SELECT sum(amt_paid) as total FROM invoice";

                  $query_run = mysqli_query($con, $query);

                  while ($row = mysqli_fetch_assoc($query_run)) {
                     echo $row['total'];
                     echo '.00';
                  }

                  mysqli_close($con);
                  ?>
               </p>
               <p class="head_couter">Amount Recieved</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div>
               <i class="fa fa-comments-o red_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no">
                  <?php
                  require('config.php');

                  $query = "SELECT sum(balance) as total FROM invoice";

                  $query_run = mysqli_query($con, $query);

                  while ($row = mysqli_fetch_assoc($query_run)) {
                     echo $row['total'];
                     echo '.00';
                  }

                  mysqli_close($con);
                  ?>
               </p>
               <p class="head_couter">Due Balance</p>
            </div>
         </div>
      </div>
   </div>

   <div class="row column2">
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div>
               <i class="fa fa-user yellow_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no">
                  <?php
                  require('config.php');
                  $query = "SELECT * from repair_invoice";

                  if ($result = mysqli_query($con, $query)) {

                     // Return the number of rows in result set
                     $rowcount = mysqli_num_rows($result);

                     // Display result
                     printf($rowcount);
                  }
                  ?>
               </p>
               <p class="head_couter">Total Mobile RepairInvoice</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div>
               <i class="fa fa-clock-o blue1_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no">
                  <?php
                  require('config.php');

                  $query = "SELECT sum(total_cost) as total FROM repair_invoice";

                  $query_run = mysqli_query($con, $query);

                  while ($row = mysqli_fetch_assoc($query_run)) {
                     echo $row['total'];
                     echo '.00';
                  }

                  mysqli_close($con);
                  ?>
               </p>
               <p class="head_couter">Total Mobile Sales</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div>
               <i class="fa fa-cloud-download green_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no">
                  <?php
                  require('config.php');

                  $query = "SELECT sum(amt_paid) as total FROM repair_invoice";

                  $query_run = mysqli_query($con, $query);

                  while ($row = mysqli_fetch_assoc($query_run)) {
                     echo $row['total'];
                     echo '.00';
                  }

                  mysqli_close($con);
                  ?>
               </p>
               <p class="head_couter">Amount Recieved</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div>
               <i class="fa fa-comments-o red_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no">
                  <?php
                  require('config.php');

                  $query = "SELECT sum(due_balance) as total FROM repair_invoice";

                  $query_run = mysqli_query($con, $query);

                  while ($row = mysqli_fetch_assoc($query_run)) {
                     echo $row['total'];
                     echo '.00';
                  }

                  mysqli_close($con);
                  ?>
               </p>
               <p class="head_couter">Due Balance</p>
            </div>
         </div>
      </div>
   </div>

   </div>



   <?php include('inc/footer.php') ?>