<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="index.php/dashboard">
        <img src="assets/img/logo.png" width="30" height="30" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php //pr($_SESSION) ?>
            <?php if($_SESSION['dtl'][0]['id'] == $_SESSION['dtl'][0]['client_id']):  ?>
            <li class="nav-item active">
                <a class="nav-link" href="index.php/dashboard">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <?php endif ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php/invoices/load_invoices">Invoices & Bills</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php/parties/load_parties">Parties</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php/items/load_items">Items</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php/receipts_nd_payments">Receipts & Payments</a>
            </li>
            <?php if($_SESSION['dtl'][0]['id'] == $_SESSION['dtl'][0]['client_id']):  ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php/users">Users</a>
            </li>
            <?php endif ?>
            
        </ul>
        <form class="form-inline my-2 my-lg-0 text-white">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link d-inline-block" href="index.php/my_profile">
                        Welcome <?php echo $_SESSION['dtl'][0]['name']?>&emsp14;
                    </a>
                    <a class="nav-link d-inline-block " href="index.php/logout" style="color: red;">
                        <i class="fa fa-power-off"></i> Logout
                    </a>
                </li>
            </ul>
        </form>
    </div>
</nav>