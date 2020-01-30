<html>

<head>
    <base href="<?php echo ROOT_URL;?>">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg">
    <div class="container-fluid p-0">
        <div class="align-content-center d-flex">
            <div class=" rounded-lg w-360 bg-white p-4 flex-m-a ">

                <form action="" method="post">
                    <input type="hidden" value="test" name="test">
                    <div class="text-center f-s-25 text-dark pb-3">Saleserp</div>
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend ">
                            <label class="input-group-text bg-white <?php if($error) echo 'b-danger';?>" for="name">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </label>
                        </div>
                        <input type="text" class="form-control <?php if($error) echo 'b-danger';?>" placeholder="Username" name="username" id="name" value="<?php if($name) echo $name?>">
                        <div class="invalid-feedback ferr <?php if($error) echo 'btn-block';?> ">
                            <?php
                                if($name_error)
                                    echo $name_error;
                            ?>
                        </div>

                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text bg-white <?php if($error) echo 'b-danger';?>" for="password">
                                <i class="fa fa-lock"></i>
                            </label>
                        </div>
                        <input type="password" class="form-control <?php if($error) echo 'b-danger';?>" placeholder="Password" name="password" id="password">
                        <div class="invalid-feedback ferr <?php if($error) echo 'btn-block';?>">
                            <?php
                                if($name_error)
                                    echo $pass_error;
                            ?>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-block btn-info ">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>