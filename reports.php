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
            <h2>Reports</h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <a href="index.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-back"></i> Back</a>

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
                                    <h4 class="card-title">Generate Report</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="generate_report.php" method="POST">
                                    <div class="form-group">
                                        <label for="start_date">Start Date:</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">End Date:</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Generate Report</button>
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