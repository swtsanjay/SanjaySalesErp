<div style="height: 25px;"></div>

<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active " data-toggle="tab" id="inv_sale" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" type="sale">Sale Invoices</a>
        <a class="nav-item nav-link " data-toggle="tab" id="inv_purchase" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" type="purchase">Purchase Invoices</a>
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


<div class="modal fade" id="invoice_form_modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
        </div>
    </div>
</div>


<div class="modal fade1" id="item_form_modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
        </div>
    </div>
</div>

<div class="modal fade1" id="party_form_modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
        </div>
    </div>
</div>


<div class="modal fade" id="record_payment_form_modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        </div>
    </div>
</div>


<div class="modal fade" id="invoice_dtl_model" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        </div>
    </div>
</div>