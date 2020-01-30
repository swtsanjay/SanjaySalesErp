
<div class="clearfix " style="margin-top: 20px">
    <div class="float-left pdT15 " style="    padding-top: 6px;">
        <h5 class="no-margin uc">List of Sold Invoices</h5>
    </div>
    <!-- <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#add_invoice"> <i class="fa fa-plus-circle"></i> Add New</button> -->
</div>
<hr>


<!-- <div class="row">
    <div class="col-2">
        <input type="text" class="form-control " placeholder=" Search by Invoice Number">
    </div>
    <div class="col-2">
        <button type="submit" class="btn btn-info btn-md ">Search</button>
    </div>
</div>
<div style="height: 20px"></div>
 -->

 <div class="form-inline d-block">
    <form action="index.php/items/load_items" method="POST">
        <input type="search" class="form-control " id="exampleInputPassword1" placeholder="Keywords..." name="key"value="<?php echo $key ?>">&nbsp;
        <button type="submit" class="btn btn-info btn-md " onclick="">Search</button>
        <button type="button" class="btn btn-success float-right" onclick="open_invoice_form(0)"><i class="fa fa-plus-circle"></i> Add New</button>
    </form>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-sm table-striped table-hover">
        <thead class="thead-dark uc">
            <tr>
                <th style="width: 250px;">Invoice Number</th>
                <th>Party Id</th>
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
                    <td class="invoice-no"><?php echo $r['invoice_number'] ?></td>
                    <td><?php echo $r['party_id'] ?></td>
                    <td><?php echo $r['total_amt'] ?></td>
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
                            <a href="user/form/<?php echo $r['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="user/delete/<?php echo $r['id'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
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