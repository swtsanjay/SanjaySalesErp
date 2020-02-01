<div class="clearfix " style="margin-top: 20px">
    
</div>

 <div class="form-inline d-block">
    <form action="index.php/invoices/load_invoices" method="GET">
        <input type="search" class="form-control " placeholder="Keywords..." name="key" value="<?php echo $_GET['key'] ?>">&nbsp;
        <button type="submit" class="btn btn-info btn-md " onclick="">Search</button>&ensp;
        <button type="button" class="btn btn-danger btn-md d-none " > <i class="fa fa-credit-card"></i> Record Payment</button>
        <button type="button" class="btn btn-success float-right" onclick="open_invoice_form(0)"><i class="fa fa-plus-circle"></i> Add New</button>
    </form>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-sm table-striped table-hover">
        <thead class="thead-dark uc">
            <tr>
                <th style="width: 40px; text-align: center; line-height: 36px;"><input type="checkbox" name="for_all" class="for_all"> </th>
                <th style="width: 250px;">Invoice Number</th>
                <th>Party Name</th>
                <th style="width: 150px;">Total Amount</th>
                <th style="width: 150px;">Paid Amount</th>
                <th style="width: 150px;">Status</th>
                <th style="width: 250px;">Date Time</th>
                <th style="width: 85px;"></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($dt as $r) : ?>
                <tr>
                    <th style="text-align: center; padding: 10px 10px;"><input type="checkbox" name="<?php echo $r['id'] ?>"> </th>
                    <td class="invoice-no"><?php echo $r['invoice_number'] ?></td>
                    <td class='i-name'><?php echo $r['name'] ?></td>
                    <td><?php echo $r['grand_total'] ?></td>
                    <td><?php echo $r['paid_amt'] ?></td>
                    <?php 
                        if($r['status']=='paid')
                            $cls = 'paid';
                        if($r['status'] == 'part_paid')
                            $cls = 'part_paid';
                        if($r['status' == 'open'])
                            $cls = 'open';
                        if($r['status'] == 'cancelled')
                            $cls = 'cancelled';
                    ?>
                    <td class="<?php echo $cls;?>"><?php echo $r['status'] ?></td>
                    <td><?php echo date("D, j M y <br> h:i A"); ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="javascript:;;" class="btn btn-sm btn-primary" onclick="open_invoice_form('<?php echo $r['id'] ?>')"><i class="fa fa-edit"></i></a>
                            <a href="javascript:;;" class="btn btn-sm btn-danger"  onclick="delete_invoice('<?php echo $r['id'] ?>')"><i class="fa fa-trash-o"></i></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="invoice_form_modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
        </div>
    </div>
</div>

<div class="modal fade1" id="item_form_modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
        </div>
    </div>
</div>

<div class="modal fade1" id="party_form_modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
        </div>
    </div>
</div>


<div class="modal fade" id="record_payment_form_modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        </div>
    </div>
</div>