<?php if($_GET): ?>
    <script>
        msg = '<?php echo($_GET['msg']) ?>';
        alert(msg);
    </script>
<?php endif ?>

<div class="container " style="width: 800px; margin-bottom: 200px;">
    <form class="bg-white p-5 mb-lg-51" action="index.php/my_profile/save_profile" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4"><h4 class="text-info">Name</h4></label>
                <input type="text" class="form-control border-info" id="inputEmail4" placeholder="Email" name="name" value="<?php echo $dtl['name']?>">
                <div class="invalid-feedback ferr d-block"><?php echo $err['name_msg'] ?></div>
            </div>
            <div class="form-group col-md-6">
                <label for="inputMobile"><h4 class="text-info">Mobile</h4></label>
                <input type="text" class="form-control border-info" id="inputMobile" placeholder="Mobile No." name="mobile" value="<?php echo $dtl['mobile']?>">
                <div class="invalid-feedback ferr d-block"><?php echo $err['mobile_msg'] ?></div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputUserId"><h4 class="text-info">User Id</h4></label>
                <input type="text" class="form-control border-info" id="inputUserId" placeholder="User id" name="user_name" value="<?php echo $dtl['user_name']?>">
                <div class="invalid-feedback ferr d-block"><?php echo $err['user_name_msg'] ?></div>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4"><h4 class="text-info">Password</h4></label>
                <input type="text" class="form-control border-info" id="inputPassword4" placeholder="Password" name="password" value="<?php echo $dtl['password']?>">
                <div class="invalid-feedback ferr d-block"><?php echo $err['password_msg'] ?></div>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail"><h4 class="text-info">Email</h4></label>
            <input type="email" class="form-control border-info" id="inputEmail" placeholder="Email id" name="email" value="<?php echo $dtl['email']?>">
            <div class="invalid-feedback ferr d-block"><?php echo $err['email_msg'] ?></div>
        </div>
        
        <button type="submit" class="btn btn-secondary pl-4 pr-4">Save</button>
    </form>
</div>