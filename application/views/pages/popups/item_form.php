<div class="modal-header">
    <h5 class="modal-title"> <?php echo $e_i['id']?'Update':'Add'?> Item</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <form id="item_form">
        <input type="hidden" name="id" value="<?php echo $e_i['id']?>">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Type</label>
            <div class="col-sm-10">
                <?php echo form_dropdown('type', [''=>'Select', 'product'=>'Product', 'service'=>'Service'], $e_i['type'], 'class="custom-select mr-sm-2 "')?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Item Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control " value="<?php echo $e_i['name'] ?>" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Item Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control  req" value="<?php echo $e_i['item_code'] ?>" name="item_code">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">UOM</label>
            <div class="col-sm-10">
                <input type="text" class="form-control " value="<?php echo $e_i['uom'] ?>" name="uom">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Unit Cost</label>
            <div class="col-sm-10">
                <input type="number" class="form-control  req" value="<?php echo $e_i['unit_cost'] ?>" name="unit_cost">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Sale Price</label>
            <div class="col-sm-10">
                <input type="number" class="form-control " value="<?php echo $e_i['sale_cost'] ?>" name="sale_cost">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Status</label>
            <div class="col-sm-10">
                <?php echo form_dropdown('status', [''=>'Select', 'avl'=>'Available', 'not_avl'=>'Not Available'], $e_i['status'], 'class="custom-select mr-sm-2 "')?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control " id="exampleFormControlTextarea1" rows="3" value="<?php echo $e_i['dscrp'] ?>" name="dscrp"></textarea>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-success" onclick="save_item()">Submit</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>