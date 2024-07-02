<?php

include 'inc/header.php';
include 'config.php';
?>

<!-- Add type -->
<div class="modal fade" id="repairAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Repair</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saverepair">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>
                <div class="mb-3">
                    <label for="">Repair Code</label>
                    <input type="text" name="repair_code" class="form-control" />
                </div>
                 <div class="mb-3">
                    <label for="">Repair Date</label>
                    <input type="date" name="repair_date" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Customer Name</label>
                    <input type="text" name="customer_name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Mobile</label>
                    <input type="text" name="mobile" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">IMEI</label>
                    <input type="text" name="imei" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Issue</label>
                    <input type="text" name="issues" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Accessories</label>
                    <input type="text" name="accessories" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Advance Amount</label>
                    <input type="text" name="advance_amt" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Status</label>
                    <select class="select2" name="status" data-placeholder="" style="width: 100%;">
                     <option value="1" <?= isset($status) && $status == 1 ? "selected" : "" ?>>Pending</option>
                     <option value="0" <?= isset($status) && $status == 0 ? "selected" : "" ?>>Progress</option>
                  </select>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save </button>
            </div>
        </form>
        </div>
    </div>
</div>


<!-- View type Modal -->
<div class="modal fade" id="repairViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Repair</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
            <div class="mb-3">
                    <label for="">Repair Code</label>
                    <p id="view_repair_code" class="form-control"></p>
                </div>
                 <div class="mb-3">
                    <label for="">Repair Date</label>
                    <p id="view_repair_date" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Customer Name</label>
                    <p id="view_customer_name" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Mobile</label>
                    <p id="view_mobile" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">IMEI</label>
                    <p id="view_imei" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Issue</label>
                    <p id="view_issues" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Accessories</label>
                    <p id="view_accessories" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Advance Amount</label>
                    <p id="view_advance_amt" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Status</label>
                    <p id="view_status" class="form-control"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit type Modal -->
<div class="modal fade" id="repairupdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updaterepair">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="repair_id" id="repair_id" >
                <input type="hidden" name="repair_date" id="repair_date" >
                <input type="hidden" name="repair_code" id="repair_code" >
                <div class="mb-3">
                    <label for="">Customer Name</label>
                    <input type="text" name="customer_name" id="customer_name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">IMEI</label>
                    <input type="text" name="imei" id="imei" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Issues</label>
                    <input type="text" name="issues" id="issues" class="form-control" />
                </div>
                 <div class="mb-3">
                    <label for="">Accesories</label>
                    <input type="text" name="accessories" id="accessories" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Advance Amount</label>
                    <input type="text" name="advance_amt" id="advance_amt" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Status</label>
                    <select class="select2" name="status" id="status" data-placeholder="" style="width: 100%;">
                     <option value="1" <?= isset($status) && $status == 1 ? "selected" : "" ?>>Pending</option>
                     <option value="0" <?= isset($status) && $status == 0 ? "selected" : "" ?>>Progress</option>
                  </select>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Repair list</h2>
      </div>
   </div>
</div>

<div class="row">
   <div class="col-md-12">
      <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
            <div class="heading1 margin_0">
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#repairAddModal">
                            Add Repair
                        </button>

            </div>
         </div>
         <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
            <?php
               $conn = mysqli_connect("localhost", "root", "", "hkm_db");
               $query = "SELECT * FROM repairs ";
               $query_run = mysqli_query($conn, $query);
               ?>
               <table id="repairTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Repair Date</th>
                                <th>Repair Code</th>
                                <th>Customer Name</th>
                                <th>Mobile</th>
                                 <th>Advance Amount </th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'config.php';

                            $query = "SELECT * FROM repairs";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $repair)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $repair['id'] ?></td>
                                        <td><?= $repair['repair_date'] ?></td>
                                        <td><?= $repair['repair_code'] ?></td>
                                        <td><?= $repair['customer_name'] ?></td>
                                        <td><?= $repair['mobile'] ?></td>
                                        <td><?= $repair['advance_amt'] ?></td>
                                         <td class="text-center">
                                                            <?php
                                                            switch ($repair['status']) {
                                                                case 1:
                                                                    echo '<span class="rounded-pill badge badge-success">Pending</span>';
                                                                    break;
                                                                case 0:
                                                                    echo '<span class="rounded-pill badge badge-info">Progress</span>';
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                        <td>
                                            <button type="button" value="<?=$repair['id'];?>" class="viewbtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$repair['id'];?>" class="editbtn btn btn-success btn-sm">Edit</button>
                                            <button type="button" value="<?=$repair['id'];?>" class="deletebtn btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>
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
       $(document).on('submit', '#saverepair', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_repair", true);

            $.ajax({
                type: "POST",
                url: "repaircode.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#repairAddModal').modal('hide');
                        $('#saverepair')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#repairTable').load(location.href + " #repairTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });


        $(document).on('click', '.editbtn', function () {

var repair_id = $(this).val();

$.ajax({
    type: "GET",
    url: "repaircode.php?repair_id=" + repair_id,
    success: function (response) {

        var res = jQuery.parseJSON(response);
        if(res.status == 404) {

            alert(res.message);
        }else if(res.status == 200){

            $('#repair_id').val(res.data.id);
            $('#repair_date').val(res.data.repair_date);
            $('#repair_code').val(res.data.repair_code);
            $('#customer_name').val(res.data.customer_name);
            $('#mobile').val(res.data.mobile);
            $('#imei').val(res.data.imei);
            $('#issues').val(res.data.issues);
            $('#accessories').val(res.data.accessories);
            $('#advance_amt').val(res.data.advance_amt);
            $('#status').val(res.data.status);

            $('#repairupdateModal').modal('show');
        }

    }
});

});

$(document).on('submit', '#updaterepair', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_repair", true);

            $.ajax({
                type: "POST",
                url: "repaircode.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessageUpdate').addClass('d-none');

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                        
                        $('#repairupdateModal').modal('hide');
                        $('#updaterepair')[0].reset();

                        $('#repairTable').load(location.href + " #repairTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

       
        $(document).on('click', '.viewbtn', function () {

var repair_id = $(this).val();
$.ajax({
    type: "GET",
    url: "repaircode.php?repair_id=" + repair_id,
    success: function (response) {

        var res = jQuery.parseJSON(response);
        if(res.status == 404) {

            alert(res.message);
        }else if(res.status == 200){
            $('#view_repair_date').text(res.data.repair_date);
            $('#view_repair_code').text(res.data.repair_code);
            $('#view_customer_name').text(res.data.customer_name);
            $('#view_mobile').text(res.data.mobile);
            $('#view_imei').text(res.data.imei);
            $('#view_issues').text(res.data.issues);
            $('#view_accessories').text(res.data.accessories);
            $('#view_advance_amt').text(res.data.advance_amt);
            $('#view_status').text(res.data.status);

            $('#repairViewModal').modal('show');
        }
    }
});
});

$(document).on('click', '.deletebtn', function (e) {
e.preventDefault();

if(confirm('Are you sure you want to delete this data?'))
{
    var repair_id = $(this).val();
    $.ajax({
        type: "POST",
        url: "repaircode.php",
        data: {
            'delete_repair': true,
            'repair_id': repair_id
        },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 500) {

                alert(res.message);
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);

                $('#repairTable').load(location.href + " #repairTable");
            }
        }
    });
}
});

    
        </script>



