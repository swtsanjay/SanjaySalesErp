<div class="modal-header ">
    <h5 class="modal-title">Add Item</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body" style=" overflow: auto1;">

    <form id="invoice_form">
        <label class="">Party</label>
        <div class="form-group row ">
            <div class="col-sm-8 ">
                <select class="form-control select-party" name="party" style="width: 100% !important;">
                    <option value="">Select</option>
                    <?php foreach ($parties as $p) : ?>
                        <option value=" <?php echo $p['id']; ?> "> <?php echo $p['name']; ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <label style="-ms-flex: 0 0 4%;flex: 0 0 4%;max-width: 4%;"></label>
            <button type="button" class="col-sm-3 btn btn-info" onclick="open_party_form(0)"><i class="fa fa-plus-circle"></i> New Party</button>

        </div>

        <div style="height: 20px;"></div>

        <div class="row">
            <div class="col-6">
                <label>Invoice number</label>
                <div class="form-group ">
                    <input type="text" class="form-control " value=" <?php echo $inv_no; ?> " readonly name="invoice_no">
                </div>
            </div>
            <div class="col-6">
                <label>Invoice date</label>
                <div class="form-group ">
                    <input type="date" class="form-control " name="date" value="<?php echo date('Y-m-d') ?>">
                </div>
            </div>

        </div>

        <div style="height: 20px;"></div>
        <div class="table-responsive">
            <table class="table table-sm table-bordered1">
                <thead class="thead-light">
                    <tr style="width: 100%;">
                        <th style="width: 300px;">Item Name</th>
                        <th style="width: 200px;">Item Code</th>
                        <th style="width: 92px;">Cost</th>
                        <th style="width: 92px;">Rate</th>
                        <th style="width: 95px;">Quantity</th>
                        <th style="width: 92px;">Discount</th>
                        <th style="width: 92px;">GST</th>
                        <th>Amount</th>
                        <th style="width: 45px;"></th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <tr class="border-bottom" id="total">

                        <td colspan="4"></td>
                        <th>Total:</th>
                        <th>    <input type="text" value="0" id="total_disc" name="total" class="w-100 border-0 inpt" readonly>  </th>
                        <th>    <input type="text" value="0" id="total_gst" name="total" class="w-100 border-0 inpt" readonly>  </th>
                        <th>    <input type="text" value="0" id="total_amt" name="total" class="w-100 border-0 inpt" readonly>  </th>
                        <td></td>
                    </tr>

                </tbody>
            </table>

        </div>

        <div class="form-group row pb-2">
            <div class="col-sm-8 ">
                <select class="form-control select-item" name="states" id="item_id" style="width: 100% !important;" onchange="add_table_item()">
                    <option></option>
                    <?php foreach ($products as $p) : ?>
                        <option value="<?php echo $p['id']; ?>"> <?php echo $p['name']; ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <label style="-ms-flex: 0 0 4%;flex: 0 0 4%;max-width: 4%;"></label>
            <button type="button" class="col-sm-3 btn btn-info" onclick="open_item_form(0)"><i class="fa fa-plus-circle"></i> New Item</button>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Notes</label>
            <textarea class="form-control " id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </form>
</div>
<div class="modal-footer  ">
    <button type="submit" class="btn btn-success" onclick="save_invoice()">Submit</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>