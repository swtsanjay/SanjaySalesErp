<div style="height: 25px;"></div>

<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active " data-toggle="tab" href="#nav-receipts" role="tab" aria-controls="nav-receipts" aria-selected="true" id="inv_receipt">Receipts</a>
        <a class="nav-item nav-link " data-toggle="tab" href="#nav-payments" role="tab" aria-controls="nav-payments" aria-selected="false" id="inv_payment">Payments</a>
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


<div class="modal fade" id="receipt_dtl_modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
        </div>
    </div>
</div>