<div class="modal-header">
    <h5 class="modal-title"><?php echo $e_p['id'] ? 'Update' : 'Add' ?> Party</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <?php //pr($data); ?>
    <div class="row">
        <div class="col-md-4 font-weight-bold">FROM:</div>
        <div class="col-md-1 ml-auto small">Receipt#</div>
        <div class="col-md-2  small">: <?php echo $data['receipts']['receipt_number'] ?></div>
    </div>

    <div class="row">
        <div class="col-md-4 small"><?php echo $data['receipts']['name'] ?></div>
        <div class="col-md-1 ml-auto small">Date </div>
        <div class="col-md-2  small">: <?php echo $data['receipts']['created'] ?></div>
    </div>
    <div class="row">
        <div class="col-md-4 small"></div>
        <div class="col-md-1 ml-auto small">Amount </div>
        <div class="col-md-2  small">: <?php echo $data['receipts']['amt'] ?></div>
    </div>

    <table class="table mt-4 table-sm">
        <thead class="table-primary">
            <tr>
                <td class="font-weight-bold">Item Details</td>
                <td align="right"  class="font-weight-bold">Amount</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['receipt_items'] as $i): ?>
            <tr>
                <td>Invoice: <?php echo $i['invoice_id'] ?></td>
                <td align="right" class="receipt_dtl_amt"><?php echo $i['amt'] ?></td>
            </tr>
            <?php endforeach ?>
            <tr>
                <td></td>
                <td align="right" id="receipt_dtl_total"  class="font-weight-bold"></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="modal-footer  ">
    <!-- <button type="submit" class="btn btn-success" onclick="save_party()">Submit</button> -->
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>