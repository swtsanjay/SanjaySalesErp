<html>

<head>
    <base href="<?php echo ROOT_URL;?>">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container-fluid p-0">
        <div class="align-content-center d-flex">
            <div class="w-360 bg-white border p-4 ml-auto mr-auto mt-5 border-info rounded-0">
                <form action="" method="post">
                    <div class="text-center f-s-25 text-dark1 pb-3 text-info">Saleserp Admin Panel</div>
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $name?>">
                        <div class="invalid-feedback ferr d-block">
                            <?php   echo $name_error; ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="invalid-feedback ferr d-block">
                            <?php   echo $pass_error; ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-info ">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>