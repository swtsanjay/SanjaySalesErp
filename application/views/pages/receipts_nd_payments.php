<div style="height: 25px;"></div>

<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active " data-toggle="tab" href="#nav-receipts" role="tab" aria-controls="nav-receipts" aria-selected="true" type="sale">Receipts</a>
        <a class="nav-item nav-link " data-toggle="tab" href="#nav-payments" role="tab" aria-controls="nav-payments" aria-selected="false" type="purchase">Payments</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-receipts" role="tabpanel">
        <?php $this->load->view('pages/receipts') ?>
    </div>
    <div class="tab-pane fade" id="nav-payments" role="tabpanel">
        <?php $this->load->view('pages/payments') ?>
    </div>
</div>