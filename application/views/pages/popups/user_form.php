<div class="modal-header">
    <h5 class="modal-title"><?php echo $dt['id'] ? 'Update' : 'Add' ?> Party</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <form id="user_form">
        <input type="hidden" name="id" value="<?php echo $dt['id']?>">
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control " value="<?php echo $dt['name'] ?>" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label req">User Id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control " value="<?php echo $dt['user_name'] ?>" name="user_name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control " value="<?php echo $dt['password'] ?>" name="password">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Mobile No.</label>
            <div class="col-sm-10">
                <input type="text" class="form-control " value="<?php echo $dt['mobile'] ?>" name="mobile">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control " value="<?php echo $dt['email'] ?>" name="email">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Status</label>
            <div class="col-sm-10">
                <select class="custom-select mr-sm-2" name="status">
                    <option value="1" <?php if ($dt['status']) echo 'selected' ?>>Active</option>
                    <option value="0" <?php if (!$dt['status']) echo 'selected' ?>>Not Active</option>
                </select>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer  ">
    <button type="submit" class="btn btn-success" onclick="save_user()">Submit</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>