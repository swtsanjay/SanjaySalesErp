<div class="clearfix " style="margin-top: 20px"></div>
<?php if ($_GET['inv_type'] == 'receipt') : ?>
    <!-- <script src="assets/js/jquery.js"></script> -->
    <script>
        $('#inv_receipt').tab('show');
    </script>
<?php endif ?>
<div class="form-inline d-block">
    <form action="index.php/receipts_nd_payments/" method="GET">
        <input type="hidden" name="inv_type" value="receipt">
        <input type="search" class="form-control " placeholder="Keywords..." name="key" value="<?php echo $_GET['key'] ?>">&nbsp;
        <button type="submit" class="btn btn-info btn-md " onclick="">Search</button>&ensp;
        <button type="button" class="btn btn-danger btn-md d-none "> <i class="fa fa-credit-card"></i> Record Payment</button>
        <!-- <button type="button" class="btn btn-success float-right" onclick="open_invoice_form(0)"><i class="fa fa-plus-circle"></i> Add New</button> -->
    </form>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-sm table-striped table-hover">
        <thead class="thead-dark uc">
            <tr>
                <th style="width: 60px;">SN</th>
                <th style="width: 250px;">Receipt Number</th>
                <th>Party Name</th>
                <th style="width: 150px;">Date </th>
                <th style="width: 150px;">Amount</th>
                <th style="width: 85px;"></th>
            </tr>
        </thead>
        <tbody>

            <?php $i=0;foreach ($dt as $key => $r) : ?>
                <?php if ($r['type'] == 'RECEIPT') : ?>
                    <tr>
                        <th><?php echo ++$i ?> </th>
                        <td><?php echo $r['receipt_number'] ?></td>
                        <td><?php echo $r['name'] ?></td>
                        <td style="width: 250px;"><?php echo $r['created'] ?></td>
                        <td style="width: 150px;"><?php echo $r['amt'] ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <!-- <a href="javascript:;;" class="btn btn-sm btn-primary" onclick="open_invoice_form('<?php echo $r['id'] ?>')"><i class="fa fa-edit"></i></a> -->
                                <a href="javascript:;;" class="btn btn-sm btn-danger" onclick="delete_receipt_payment('<?php echo $r['id'] ?>')"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endif ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>