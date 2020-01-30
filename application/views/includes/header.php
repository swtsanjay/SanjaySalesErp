<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="index.php/user/dashboard">
        <img src="assets/img/bootstrap-solid.svg" width="30" height="30" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php/user/dashboard">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php/invoices/load_invoices">Invoices</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php/parties/load_parties">Parties</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php/items/load_items">Items</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php/user/receipts">Receipts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php/user/stock">Stock</a>
            </li>

            
        </ul>
        <form class="form-inline my-2 my-lg-0 text-white">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle1" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        Welcome <?php echo $_SESSION['dtl'][0]['user_name']?>&emsp14;
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">My Profile</a>
                        <a class="dropdown-item" href="#">Stock</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            </ul>
        </form>
    </div>
</nav>