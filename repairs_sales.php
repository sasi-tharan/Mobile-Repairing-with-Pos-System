<?php

include 'inc/header.php';
include 'config.php';
?>



<!-- View type Modal -->
<div class="modal fade" id="invoicerepairViewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Repair Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="">Repair Invoice ID</label>
                    <p id="view_repair_invoice_id" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Invoice Date</label>
                    <p id="view_invoice_date" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Customer Name</label>
                    <p id="view_customer_name" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Repair_code</label>
                    <p id="view_repair_code" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Advance Amount</label>
                    <p id="view_advance_amt" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Total Cost</label>
                    <p id="view_total_cost" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Amount Paid</label>
                    <p id="view_amt_paid" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Balance</label>
                    <p id="view_due_balance" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Last Paid Balance</label>
                    <p id="view_pay_balance" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Last Payment Updated Date</label>
                    <p id="view_paymentupdate_date" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Payment</label>
                    <p id="view_payment" class="form-control"></p>
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
            <h2>Repairs Invoice list</h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php
        // Check if success parameter is set
        if (isset($_GET['success']) && $_GET['success'] === 'true') {
            // Display success alert with close icon
            echo '<div class="alert alert-success alert-dismissible" role="alert">';
            echo 'Invoice Added Successfully';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }
        ?>
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <a href="add_new_repair_sales.php" class="btn btn-primary btn-sm btn-flat"><i
                            class="fa fa-plus"></i> Add New Invoice</a>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <!-- <?php
                    $conn = mysqli_connect("localhost", "root", "", "hkm_db");
                    $query = "SELECT * FROM repair_invoice ";
                    $query_run = mysqli_query($conn, $query);
                    ?> -->
                    <table id="repairsinvoiceTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Repair Invoice ID</th>
                                <th>Invoice Date</th>
                                <th>Repair Code</th>
                                <!-- <th>Repair Date</th> -->
                                <th>Customer Name</th>
                                <!-- <th>Advance Amount</th> -->
                                <th>Total Amount</th>
                                <th>Amount Paid</th>
                                <th>Due Balance</th>
                                <th>Status</th>
                                <th>Print Invoice</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'config.php';

                            $query = "SELECT * FROM repair_invoice";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $repair_invoice) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $repair_invoice['repair_invoice_id'] ?>
                                        </td>
                                        <td>
                                            <?= $repair_invoice['invoice_date'] ?>
                                        </td>
                                        <td>
                                            <?= $repair_invoice['repair_code'] ?>
                                        </td>
                                        <!-- <td><?= $repair_invoice['repair_date'] ?></td> -->
                                        <td>
                                            <?= $repair_invoice['customer_name'] ?>
                                        </td>
                                        <!-- <td><?= $repair_invoice['advance_amt'] ?></td> -->
                                        <td>
                                            <?= $repair_invoice['total_cost'] ?>
                                        </td>
                                        <td>
                                            <?= $repair_invoice['amt_paid'] ?>
                                        </td>
                                        <td>
                                            <?= $repair_invoice['due_balance'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            switch ($repair_invoice['status']) {
                                                case 0:
                                                    echo '<span class="rounded-pill badge badge-success">Progress</span>';
                                                    break;
                                                case 1:
                                                    echo '<span class="rounded-pill badge badge-info">Pending</span>';
                                                    break;
                                                case 2:
                                                    echo '<span class="rounded-pill badge badge-info">Checking</span>';
                                                    break;
                                                case 3:
                                                    echo '<span class="rounded-pill badge badge-info">Completed</span>';
                                                    break;
                                                case 4:
                                                    echo '<span class="rounded-pill badge badge-info">Cancelled</span>';
                                                    break;

                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <button type="button" value="<?= $repair_invoice['repair_invoice_id']; ?>"
                                                class="printbtn btn btn-info btn-sm">Print</button>


                                        </td>
                                        <td>
                                            <button type="button" value="<?= $repair_invoice['repair_invoice_id']; ?>"
                                                class="viewbtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?= $repair_invoice['repair_invoice_id']; ?>"
                                                class="editbtn btn btn-success btn-sm">Update</button>
                                            <button type="button" value="<?= $repair_invoice['repair_invoice_id']; ?>"
                                                class="deletebtn btn btn-danger btn-sm">Delete</button>
                                        </td> 
                                        <!-- <td>
                                            <form action="repair_invoice_edit.php" method="post">
                                                <input type="hidden" name="edit_id" value="<?= $repair_invoice['repair_invoice_id']; ?>">
                                                <button type="submit" name="editbtn" class="btn btn-success"> EDIT</button>
                                            </form>
                                        </td> -->
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

<!-- Edit type Modal -->
<div class="modal fade" id="repairinvoiceupdateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Repair Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updaterepairinvoice">
                <div class="modal-body">

                    <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                    <input type="hidden" name="repair_invoice_id" id="repair_invoice_id">
                    <input type="hidden" name="invoice_date" id="invoice_date">
                    <input type="hidden" name="customer_name" id="customer_name">
                    <input type="hidden" name="repair_code" id="repair_code">
                    <input type="hidden" name="advance_amt" id="advance_amt">
                    <input type="hidden" name="total_cost" id="total_cost">
                    <input type="hidden" name="amt_paid" id="amt_paid">
                    <div class="mb-3">
                        <label for="">Balance</label>
                        <input type="text" name="due_balance" id="due_balance" class="form-control" balance />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1">Date</label>
                        <input type="date" name="paymentupdate_date" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                        <label for="">Pay Balance</label>
                        <input type="text" name="pay_balance" id="pay_balance" class="form-control"
                            onkeyup="updateBalance()" />
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select class="select2" name="status" data-placeholder="" style="width: 100%;">
                            <option value="0" <?= isset($status) && $status == 0 ? "selected" : "" ?>>Progress</option>
                            <option value="1" <?= isset($status) && $status == 1 ? "selected" : "" ?>>Pending</option>
                            <option value="2" <?= isset($status) && $status == 2 ? "selected" : "" ?>>Checking</option>
                            <option value="3" <?= isset($status) && $status == 3 ? "selected" : "" ?>>Completed</option>
                            <option value="4" <?= isset($status) && $status == 4 ? "selected" : "" ?>>Cancelled</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>





<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
    // Function to open a new window or tab and print the invoice
    function printInvoice(repair_invoice_id) {
        var url = 'print_repair_invoice.php?id=' + repair_invoice_id;
        window.open(url, '_blank');
    }

    // Attach event listener to the print button
    var printButtons = document.querySelectorAll('.printbtn');
    printButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var repair_invoice_id = this.value;
            printInvoice(repair_invoice_id);
        });
    });
</script>

<script>
    function updateBalance() {
        var balance = parseFloat(document.getElementById('due_balance').value);
        var pay_balance = parseFloat(document.getElementById('pay_balance').value);

        var newBalance = balance - pay_balance;

        document.getElementById('due_balance').value = newBalance.toFixed(2);
        document.getElementById('amt_paid').value = pay_balance.toFixed(2);
    }
</script>

<script>
    $(document).on('click', '.editbtn', function () {

        var repair_invoice_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "repairinvoiceeditcode.php?repair_invoice_id=" + repair_invoice_id,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 404) {

                    alert(res.message);
                } else if (res.status == 200) {

                    $('#repair_invoice_id').val(res.data.repair_invoice_id);
                    $('#invoice_date').val(res.data.invoice_date);
                    $('#customer_name').val(res.data.customer_name);
                    $('#caddress').val(res.data.caddress);
                    $('#repair_code').val(res.data.repair_code);
                    $('#advance_amt').val(res.data.advance_amt);
                    $('#total_cost').val(res.data.total_cost);
                    $('#amt_paid').val(res.data.amt_paid);
                    $('#due_balance').val(res.data.due_balance);
                    $('#pay_balance').val(res.data.pay_balance);
                    $('#payment').val(res.data.payment);
                    $('#status').val(res.data.status);
                    $('#paymentupdate_date').val(res.data.paymentupdate_date);

                    $('#repairinvoiceupdateModal').modal('show');
                }

            }
        });

    });

    $(document).on('submit', '#updaterepairinvoice', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("update_repair_invoice", true);

        $.ajax({
            type: "POST",
            url: "repairinvoiceeditcode.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessageUpdate').removeClass('d-none');
                    $('#errorMessageUpdate').text(res.message);

                } else if (res.status == 200) {

                    $('#errorMessageUpdate').addClass('d-none');

                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(res.message);

                    $('#repairinvoiceupdateModal').modal('hide');
                    $('#updaterepairinvoice')[0].reset();

                    $('#repairsinvoiceTable').load(location.href + " #repairsinvoiceTable");

                } else if (res.status == 500) {
                    alert(res.message);
                }
            }
        });

    });

    $(document).on('click', '.viewbtn', function () {

        var repair_invoice_id = $(this).val();
        $.ajax({
            type: "GET",
            url: "repairinvoiceeditcode.php?repair_invoice_id=" + repair_invoice_id,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 404) {

                    alert(res.message);
                } else if (res.status == 200) {

                    $('#view_repair_invoice_id').text(res.data.repair_invoice_id);
                    $('#view_invoice_date').text(res.data.invoice_date);
                    $('#view_customer_name').text(res.data.customer_name);
                    $('#view_repair_code').text(res.data.repair_code);
                    $('#view_advance_amt').text(res.data.advance_amt);
                    $('#view_total_cost').text(res.data.total_cost);
                    $('#view_amt_paid').text(res.data.amt_paid);
                    $('#view_due_balance').text(res.data.due_balance);
                    $('#view_pay_balance').text(res.data.pay_balance);
                    $('#view_payment').text(res.data.payment);
                    $('#view_status').text(res.data.status);
                    $('#view_paymentupdate_date').text(res.data.paymentupdate_date);

                    $('#invoicerepairViewModal').modal('show');
                }
            }
        });
    });

    $(document).on('click', '.deletebtn', function (e) {
        e.preventDefault();

        if (confirm('Are you sure you want to delete this data?')) {
            var repair_invoice_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "repairinvoiceeditcode.php",
                data: {
                    'delete_invoice': true,
                    'repair_invoice_id': repair_invoice_id
                },
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 500) {

                        alert(res.message);
                    } else {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);

                        $('#repairsinvoiceTable').load(location.href + " #repairsinvoiceTable");
                    }
                }
            });
        }
    });

</script>