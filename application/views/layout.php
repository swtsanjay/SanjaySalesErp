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
    var API_URL='<?php echo URL?>';
    </script>
</head>

<body style="height: 100vh;">
    <?php $this->load->view("includes/header")?>

    <div class="container-fluid">
        <div class="pdT15">
            <?php $this->load->view($page)?>
        </div>
    </div>

    
<!-- 
    <script src="assets/js/jquery.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script> -->
    <link href="assets/css/select2.min.css" rel="stylesheet">
    <script src="assets/js/select2.min.js"></script>
    
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="assets/js/site.js?<?php echo time()?>"></script>
</body>

</html>