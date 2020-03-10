<html>

<head>
    <title><?php echo $page_title?$page_title:'Sales Erp'?></title>
    <base href="<?php echo ROOT_URL;?>">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css?<?php echo time()?>">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        var API_URL = '<?php echo URL?>';
    </script>
</head>

<body style="height: 100vh;">

    <nav class="navbar navbar-expand-sm navbar-dark sticky-top" style="background-color: hsl(0, 18%, 46%)!important;">
        <a class="navbar-brand" href="index.php/dashboard">
            <!-- <img src="assets/img/bootstrap-solid.svg" width="30" height="30" alt=""> -->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="index.php/invoices/load_invoices">Invoices & Bills</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php/items/load_items">Items</a>
                </li> -->
            </ul>
            <form class="form-inline my-2 my-lg-0 text-white">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <!-- <a class="nav-link d-inline-block" href="index.php/my_profile">
                            Welcome <?php echo $_SESSION['dtl'][0]['name']?>&emsp14;
                        </a> -->
                        Admin
                        <a class="nav-link d-inline-block " href="index.php/logout" style="color: red;">
                            <i class="fa fa-power-off"></i> Logout
                        </a>
                    </li>
                </ul>
            </form>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="pdT15">
            <?php $this->load->view('pages/users') ?>
        </div>
    </div>



    <script src="assets/js/jquery.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/site.js?<?php echo time()?>"></script>
</body>

</html>