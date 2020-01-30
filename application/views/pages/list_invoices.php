<div style="height: 25px;"></div>

<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active " data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sale Invoices</a>
        <a class="nav-item nav-link " data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Purchase Invoices</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <?php $this->load->view('pages/sale_invoice') ?>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <?php $this->load->view('pages/purchase_invoice') ?>
    </div>
</div>
<?php
    pr($dtl);
?>
