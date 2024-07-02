<?php

include 'inc/header.php';
include 'config.php';
?>

<!-- Add type -->
<div class="modal fade" id="typeAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add type</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="savetype">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="">Type Name</label>
                    <input type="text" name="type_name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Status</label>
                    <select class="select2" name="status" data-placeholder="" style="width: 100%;">
                     <option value="1" <?= isset($status) && $status == 1 ? "selected" : "" ?>>Active</option>
                     <option value="0" <?= isset($status) && $status == 0 ? "selected" : "" ?>>Deactive</option>
                  </select>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save type</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit type Modal -->
<div class="modal fade" id="typeEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit type</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updatetype">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="type_id" id="type_id" >

                <div class="mb-3">
                    <label for="">Type Name</label>
                    <input type="text" name="type_name" id="type_name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Status</label>
                    <select class="select2" name="status" id="status" data-placeholder="" style="width: 100%;">
                     <option value="1" <?= isset($status) && $status == 1 ? "selected" : "" ?>>Active</option>
                     <option value="0" <?= isset($status) && $status == 0 ? "selected" : "" ?>>Deactive</option>
                  </select>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update type</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View type Modal -->
<div class="modal fade" id="typeViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View type</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">Type Name</label>
                    <p id="view_type_name" class="form-control"></p>
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

<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Types list</h2>
      </div>
   </div>
</div>

<div class="row">
   <div class="col-md-12">
      <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
            <div class="heading1 margin_0">
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#typeAddModal">
                            Add type
                        </button>

            </div>
         </div>
         <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
               <?php
               $conn = mysqli_connect("localhost", "root", "", "album_db");
               $query = "SELECT * FROM types ";
               $query_run = mysqli_query($conn, $query);
               ?>
               <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'config.php';

                            $query = "SELECT * FROM types";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $type)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $type['id'] ?></td>
                                        <td><?= $type['type_name'] ?></td>
                                         <td class="text-center">
                                                            <?php
                                                            switch ($type['status']) {
                                                                case 1:
                                                                    echo '<span class="rounded-pill badge badge-success">Active</span>';
                                                                    break;
                                                                case 0:
                                                                    echo '<span class="rounded-pill badge badge-info">Deactive</span>';
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                        <td>
                                            <!-- <button type="button" value="<?=$type['id'];?>" class="viewtypeBtn btn btn-info btn-sm">View</button> -->
                                            <button type="button" value="<?=$type['id'];?>" class="edittypeBtn btn btn-success btn-sm">Edit</button>
                                            <button type="button" value="<?=$type['id'];?>" class="deletetypeBtn btn btn-danger btn-sm">Delete</button>
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
      $(document).ready(function() {
    	$('#myTable').DataTable();
	});

       $(document).on('submit', '#savetype', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_type", true);

            $.ajax({
                type: "POST",
                url: "code.php",
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
                        $('#typeAddModal').modal('hide');
                        $('#savetype')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.edittypeBtn', function () {

            var type_id = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "code.php?type_id=" + type_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#type_id').val(res.data.id);
                        $('#type_name').val(res.data.type_name);
                        $('#status').val(res.data.status);

                        $('#typeEditModal').modal('show');
                    }

                }
            });

        });

        $(document).on('submit', '#updatetype', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_type", true);

            $.ajax({
                type: "POST",
                url: "code.php",
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
                        
                        $('#typeEditModal').modal('hide');
                        $('#updatetype')[0].reset();

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.viewtypeBtn', function () {

            var type_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "code.php?type_id=" + type_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#view_type_name').text(res.data.type_name);
                        $('#view_status').text(res.data.status);

                        $('#typeViewModal').modal('show');
                    }
                }
            });
        });

        $(document).on('click', '.deletetypeBtn', function (e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this data?'))
            {
                var type_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'delete_type': true,
                        'type_id': type_id
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable').load(location.href + " #myTable");
                        }
                    }
                });
            }
        });

    </script>
    <!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


