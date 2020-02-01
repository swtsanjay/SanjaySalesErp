<div class="modal-header ">
    <h5 class="modal-title">Record Payment</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body" style=" overflow: auto1;">

    <form id="record_payment">
        <div style="line-height: 34px;">
            <!-- <div class="float-left">Party</div> -->
            <div class="float-right"> <input type="date" class="form-control bg-light" name="date" value="<?php echo date('Y-m-d') ?>"> </div>
            <div class="float-right">Date: &emsp;</div>
            <div style="clear: both; margin-bottom: 20px;"></div>
        </div>
        <table class="table table-bordered table-sm">
            <thead class="thead-light border-0">
                <tr>
                    <th style="width: 60%;">Invoice</th>
                    <th>Amount</th>
                    <th>Paying Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><input type="text" style="width: 100%" class="border-0" readonly value="ABS"></td>
                    <td><input type="text" style="width: 100%"></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td><input type="text" style="width: 100%" class="border-0" readonly value="ABC"></td>
                    <td><input type="text" style="width: 100%"></td>
                </tr>
                <tr>
                    <td colspan="2" align="right">Total:&emsp;</td>
                    <td><input type="text" style="width: 100%" class="border-0" readonly value="123"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>
<div class="modal-footer  ">
    <button type="submit" class="btn btn-success" onclick="save_invoice()">Record Payment</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>