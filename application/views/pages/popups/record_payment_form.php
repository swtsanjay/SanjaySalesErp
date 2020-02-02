<div class="modal-header ">
    <h5 class="modal-title">Record Payment</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body" style=" overflow: auto1;">

    <form id="record_payment">
        <?php unset($data[0]) ?>
        <?php //pr($data) ?>
        <input type="hidden" value="" name="type" id="payment_type">
        <input type="hidden" value="<?php echo $data[1][0]['client_id'] ?>" name="client_id">
        <input type="hidden" value="<?php echo $data[1][0]['party_id'] ?>" name="party_id">
        <div style="line-height: 34px;">
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
                

                <?php foreach($data as $i): ?>
                <tr>
                        <input type="hidden" value="<?php echo $i[0]['id'] ?>" name="id[]">
                    <td><?php echo $i[0]['id'] ?></td>
                    <td><input type="text" style="width: 100%" class="border-0" readonly value="<?php echo($i[0]['grand_total'] - $i[0]['paid_amt']) ?>"></td>
                    <td><input type="number" style="width: 100%" value="<?php echo($i[0]['grand_total'] - $i[0]['paid_amt']) ?>" name="payingAMT[]" onkeyup="calc_paying_amt()"></td>
                </tr>
                <?php endforeach ?>
                <tr>
                    <td colspan="2" align="right">Total:&emsp;</td>
                    <td><input type="text" style="width: 100%" class="border-0" readonly value="0" name="totalPayingAMT"></td>
                    <script> calc_paying_amt() </script>
                </tr>
                
            </tbody>
        </table>

    </form>
</div>
<div class="modal-footer  ">
    <button type="submit" class="btn btn-success" onclick="save_payment()">Record Payment</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>