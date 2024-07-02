<?php

include 'inc/header.php';
include 'config.php';
?>

<!-- Add type -->
<div class="modal fade" id="sizeAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="savesize">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>
                <div class="mb-3">
                    <label for="">Product Code</label>
                    <input type="text" name="product_code" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Product Name</label>
                    <input type="text" name="product_name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Quantity</label>
                    <input type="text" name="qty" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Unit_Price</label>
                    <input type="text" name="unit_price" class="form-control" />
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
                <button type="submit" class="btn btn-primary">Save </button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit type Modal -->
<div class="modal fade" id="sizeupdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updatesize">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="product_id" id="product_id" >

                <div class="mb-3">
                    <label for="">Product Code</label>
                    <input type="text" name="product_code" id="product_code" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Quantity</label>
                    <input type="text" name="qty" id="qty" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Unit_Price</label>
                    <input type="text" name="unit_price" id="unit_price" class="form-control" />
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
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View type Modal -->
<div class="modal fade" id="sizeViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
            <div class="mb-3">
                    <label for="">Product Code</label>
                    <p id="view_product_code" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Product Name</label>
                    <p id="view_product_name" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Quantity</label>
                    <p id="view_qty" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Unit_Price</label>
                    <p id="view_unit_price" class="form-control"></p>
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
         <h2>Products list</h2>
      </div>
   </div>
</div>

<div class="row">
   <div class="col-md-12">
      <div class="white_shd full margin_bottom_30">
         <div class="full graph_head">
            <div class="heading1 margin_0">
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#sizeAddModal">
                            Add Product
                        </button>

            </div>
         </div>
         <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
            <?php
               $conn = mysqli_connect("localhost", "root", "", "hkm_db");
               $query = "SELECT * FROM products ";
               $query_run = mysqli_query($conn, $query);
               ?>
               <table id="sizeTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                 <th>Unit Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'config.php';

                            $query = "SELECT * FROM products";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $product)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $product['id'] ?></td>
                                        <td><?= $product['product_code'] ?></td>
                                        <td><?= $product['product_name'] ?></td>
                                        <td><?= $product['qty'] ?></td>
                                        <td><?= $product['unit_price'] ?></td>
                                         <td class="text-center">
                                                            <?php
                                                            switch ($product['status']) {
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
                                            <button type="button" value="<?=$product['id'];?>" class="viewbtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$product['id'];?>" class="sizebtn btn btn-success btn-sm">Edit</button>
                                            <button type="button" value="<?=$product['id'];?>" class="deletebtn btn btn-danger btn-sm">Delete</button>
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
       $(document).on('submit', '#savesize', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_size", true);

            $.ajax({
                type: "POST",
                url: "sizecode.php",
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
                        $('#sizeAddModal').modal('hide');
                        $('#savesize')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#sizeTable').load(location.href + " #sizeTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.sizebtn', function () {

var product_id = $(this).val();

$.ajax({
    type: "GET",
    url: "sizecode.php?product_id=" + product_id,
    success: function (response) {

        var res = jQuery.parseJSON(response);
        if(res.status == 404) {

            alert(res.message);
        }else if(res.status == 200){

            $('#product_id').val(res.data.id);
            $('#product_code').val(res.data.product_code);
            $('#product_name').val(res.data.product_name);
            $('#qty').val(res.data.qty);
            $('#unit_price').val(res.data.unit_price);
            $('#status').val(res.data.status);

            $('#sizeupdateModal').modal('show');
        }

    }
});

});

$(document).on('submit', '#updatesize', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_size", true);

            $.ajax({
                type: "POST",
                url: "sizecode.php",
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
                        
                        $('#sizeupdateModal').modal('hide');
                        $('#updatesize')[0].reset();

                        $('#sizeTable').load(location.href + " #sizeTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.viewbtn', function () {

var product_id = $(this).val();
$.ajax({
    type: "GET",
    url: "sizecode.php?product_id=" + product_id,
    success: function (response) {

        var res = jQuery.parseJSON(response);
        if(res.status == 404) {

            alert(res.message);
        }else if(res.status == 200){

            $('#view_product_code').text(res.data.product_code);
            $('#view_product_name').text(res.data.product_name);
            $('#view_qty').text(res.data.qty);
            $('#view_unit_price').text(res.data.unit_price);
            $('#view_status').text(res.data.status);

            $('#sizeViewModal').modal('show');
        }
    }
});
});

$(document).on('click', '.deletebtn', function (e) {
e.preventDefault();

if(confirm('Are you sure you want to delete this data?'))
{
    var product_id = $(this).val();
    $.ajax({
        type: "POST",
        url: "sizecode.php",
        data: {
            'delete_size': true,
            'product_id': product_id
        },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 500) {

                alert(res.message);
            }else{
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);

                $('#sizeTable').load(location.href + " #sizeTable");
            }
        }
    });
}
});

    
        </script>



