<?php

include 'inc/header.php';
include 'config.php';
?>

<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>Repair Sales list</h2>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <a href="repairs_sales.php" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-back"></i>
                        Back</a>

                </div>
            </div>
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
                            <h3 class="card-title">Add New Repair Invoice</h3>
                        </div>

                        <form action="repairsales_edit_code.php" method="POST">
                            <div class="card-body">
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
                                    <input type="text" name="due_balance" id="due_balance" class="form-control"
                                        balance />
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
                                        <option value="0" <?= isset($status) && $status == 0 ? "selected" : "" ?>>Progress
                                        </option>
                                        <option value="1" <?= isset($status) && $status == 1 ? "selected" : "" ?>>Pending
                                        </option>
                                        <option value="2" <?= isset($status) && $status == 2 ? "selected" : "" ?>>Checking
                                        </option>
                                        <option value="3" <?= isset($status) && $status == 3 ? "selected" : "" ?>>Completed
                                        </option>
                                        <option value="4" <?= isset($status) && $status == 4 ? "selected" : "" ?>>Cancelled
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                            </div>
                    </div>
                    <!-- /.card-body -->
                    </form>

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

</script>