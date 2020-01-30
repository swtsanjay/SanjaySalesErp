<div class="modal-header">
    <h5 class="modal-title"><?php echo $e_p['id'] ? 'Update' : 'Add' ?> Party</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <form id="party_form">
        <input type="hidden" name="id" value="<?php echo $e_p['id']?>">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Type</label>
            <div class="col-sm-10">
                <select class="custom-select mr-sm-2" name="type">
                    <option value="customer" <?php if ($e_p['type'] == 'customer') echo 'selected' ?>>Customer</option>
                    <option value="vendor" <?php if ($e_p['type'] == 'vendor') echo 'selected' ?>>Vendor</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control " value="<?php echo $e_p['name'] ?>" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Mobile No.</label>
            <div class="col-sm-10">
                <input type="text" class="form-control " value="<?php echo $e_p['mobile'] ?>" name="mobile">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control " value="<?php echo $e_p['email'] ?>" name="email">
            </div>
        </div>
    </form>
</div>
<div class="modal-footer  ">
    <button type="submit" class="btn btn-success" onclick="save_party()">Submit</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>