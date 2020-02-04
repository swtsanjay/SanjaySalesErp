<div class="modal-header">
    <h5 class="modal-title">Invoice</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <?php //pr($data); 
    ?>
    <div class="row">
        <div class="col-md-4 font-weight-bold">TO:</div>
        <div class="col-md-1 ml-auto small">Invoice#</div>
        <div class="col-md-2  small">: <?php echo $data['invoice_number'] ?></div>
    </div>

    <div class="row">
        <div class="col-md-4 small1"><?php echo $data['party']['name'] ?></div>
        <div class="col-md-1 ml-auto small">Date </div>
        <div class="col-md-2  small">: <?php echo $data['i_date'] ?></div>
    </div>
    <div class="row">
        <div class="col-md-4 small"></div>
        <div class="col-md-1 ml-auto small">Amount </div>
        <div class="col-md-2  small">: <?php echo $data['total_amt'] ?></div>
    </div>

    <div class="row">
        <div class="col-md-4 small"></div>
        <div class="col-md-1 ml-auto small">GST </div>
        <div class="col-md-2  small">: <?php echo $data['total_gst'] ?></div>
    </div>

    <div class="row">
        <div class="col-md-4 small"></div>
        <div class="col-md-1 ml-auto small">Discount </div>
        <div class="col-md-2  small">: <?php echo $data['total_disc'] ?></div>
    </div>

    <div class="row">
        <div class="col-md-4 small"></div>
        <div class="col-md-1 ml-auto small">Total </div>
        <div class="col-md-2  small">: <?php echo $data['grand_total'] ?></div>
    </div>

    <div class="row">
        <div class="col-md-4 small"></div>
        <div class="col-md-1 ml-auto small">Paid </div>
        <div class="col-md-2  small">: <?php echo $data['paid_amt'] ?></div>
    </div>

    <div class="row">
        <div class="col-md-4 small"></div>
        <div class="col-md-1 ml-auto small">Remaining </div>
        <div class="col-md-2  small">: <?php echo $data['grand_total'] - $data['paid_amt'] ?></div>
    </div>

    <table class="table table-sm table-bordered1 mt-4">
        <tr style="width: 100%;" class="font-weight-bold table-info">
            <td style="width: 300px;">Item Name</td>
            <td style="width: 200px;">Item Code</td>
            <td style="width: 92px;" align="right">Rate</td>
            <td style="width: 95px;" align="right">Quantity</td>
            <td style="width: 92px;" align="right">Discount</td>
            <td style="width: 92px;" align="right">GST</td>
            <td align="right">Amount</td>
        </tr>
        <?php
        foreach ($data['invoice_items'] as $i) : ?>

            <tr class="invoice_dtl_amts">
                <td><?php echo $i['name'] ?> </td>
                <td><?php echo $i['code'] ?> </td>
                <td align="right"><?php echo $i['rate'] ?> </td>
                <td align="right"><?php echo $i['qnty'] ?> </td>
                <td align="right" id="invoice_dtl_disc"><?php echo $i['disc'] ?> </td>
                <td align="right" id="invoice_dtl_gst"><?php echo $i['gst'] ?> </td>
                <td align="right" id="invoice_dtl_amt"><?php echo $i['final_amt'] ?></td>
            </tr>


        <?php endforeach ?>

        <tr class="border-bottom border-0" id="total" align="right">
            <td colspan="3"></td>
            <th>Total:</th>
            <th align="right" id="invoice_dtl_tdisc"> </th>
            <th align="right" id="invoice_dtl_tgst"> </th>
            <th align="right" id="invoice_dtl_tamt"> </th>
        </tr>
        <tr class="border-bottom border-0" id="total" align="right">
            <td colspan="3"></td>
            <th colspan="3">Grand Total:</th>
            <th align="right" id="invoice_dtl_gtotal"></th>
        </tr>
    </table>
    <?php if($data['notes']): ?>
    <div class="form-group">
        <label >Notes</label>
        <textarea class="form-control bg-white disabled" rows="3" disabled><?php echo $data['notes'] ?></textarea>
    </div>
    <?php endif ?>
</div>
<div class="modal-footer  ">
    <!-- <button type="submit" class="btn btn-success" onclick="save_party()">Submit</button> -->
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>