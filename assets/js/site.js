all_checked = false;
page_reload =true;
checked = false;

/** Ajax */
function open_item_form(id) {
    $.ajax({
        url: API_URL + 'items/item_dtl/' + id,
        dataType: 'JSON',
        success: function(res) {
            $("#item_form_modal .modal-content").html(res.html);
            $("#item_form_modal").modal();
        }
    });
}

function save_item() {
    $.ajax({
        url: API_URL + 'items/save_item',
        type: 'POST',
        data: $("#item_form").serialize(),
        dataType: 'JSON',
        success: function(res) {
            alert(res.msg);
            if (res.success) {
                $("#item_form_modal").modal('hide');
                if(page_reload)
                    location.reload();
            }
        }
    });
}

function item_delete(id) {
    if (confirm("Are you sure to delete this item!")) {
        $.ajax({
            url: API_URL + 'items/item_delete/' + id,
            dataType: 'JSON',
            success: function(res) {
                alert(res.msg);
                location.reload();
            }
        });
    }
}

function open_party_form(id) {
    $.ajax({
        url: API_URL + 'parties/party_dtl/' + id,
        dataType: 'JSON',
        success: function(res) {000000
            $("#party_form_modal .modal-content").html(res.html);
            $("#party_form_modal").modal();
        }
    });
}

function save_party() {
    $.ajax({
        url: API_URL + 'parties/save_party/',
        type: 'POST',
        data: $('#party_form').serialize(),
        dataType: 'JSON',
        success: function(res) {
            alert(res.msg);
            if (res.success) {
                $('#party_form_modal').modal('hide');
                if(page_reload)
                    location.reload();
            }
        }
    });
}

function delete_party(id) {
    if (confirm("Are you sure to delete this party!")) {
        $.ajax({
            url: API_URL + 'parties/delete_party/' + id,
            dataType: 'JSON',
            success: function(res) {
                alert(res.msg);
                location.reload();
            }
        });
    }
}

var items=[];
function open_invoice_form(id){
    page_reload = false;
    $.ajax({
        url: API_URL + 'invoices/invoice_dtl/' + id,
        dataType: 'JSON',    
        success: function(res) {
            // alert(9);
            items=res.products;
            $("#invoice_form_modal .modal-content").html(res.html);
            $("#invoice_form_modal").modal();
            slct2();
            // page_reload =true;
        }
    });
}


function save_invoice() {
    calc_total();
    $.ajax({
        url: API_URL + 'invoices/save_invoice/',
        type: 'POST',
        data: $('#invoice_form').serialize(),
        dataType: 'JSON',
        success: function(res) {
            alert(res.msg);
            if (res.success) {
                $('#invoice_form_modal').modal('hide');
                location.reload();
            }
        }
    });
}

function delete_invoice(id){
    $.ajax({
        url: API_URL + 'invoices/delete_invoice/' + id,
        dataType: 'JSON',
            success: function(res) {
                alert(res.msg);
                location.reload();
            }
    });
}

/** \ */

$(function() {
    $("li.nav-item").removeClass("active");
    var pathname = window.location.pathname;
    $(".nav-item").each(function() {
        path = $(this).find('a').attr('href')
        if (pathname.includes(path)) {
            $(this).find('a').parent().addClass("active");
        }
    });

    $("button").click(function() {
        $(".add-items").show();
    });

    
    
    
});

$(document).on('show.bs.modal', '.modal', function() {
    var zIndex = 1040 + (10 * $('.modal:visible').length);
    $(this).css('z-index', zIndex);
    setTimeout(function() {
        $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
    }, 0);
});

function slct2(){
    $('.js-example-basic-multiple').select2();
    $(".select2-selection__rendered").click(function() {
        $(this).addClass("us");
    });
    $(".select-party").select2({
        placeholder: "Party",
    });
    $(".select-item").select2({
        placeholder: "Select item to add"
    });
    $(".fa.fa-trash-o.btn-sm.btn-danger").click(function() {
        $(this).parent().parent().remove();
        calc_total();
    });

    $(".qnty").keyup(function() {
        qnty = parseInt($(this).val());
        rate = $(this).parent().parent().find('.rate').val();
        amt = rate*qnty;
        console.log(qnty);
        if(!amt)
            amt = 0;
        $(this).parent().parent().find('.amt').val(amt);
        gst = $(this).parent().parent().find('.gst').attr('gst');
        gst = gst * amt / 100;
        $(this).parent().parent().find('.gst').val(gst);
        calc_total();        
    });

    $('.disc').keyup(function(){
        calc_total();
    });

    calc_total();

    $('input[type=checkbox]').click(function(){

        checked = false;
        $('input[type=checkbox]').each(function(){
            if( $(this).prop( "checked" ) ){
                checked = true;
            }
        });
        if( $(this).attr('name') == 'for_all' ){
            if(!all_checked){
                $('input[type=checkbox]').prop( "checked", true );
                checked = all_checked = true;
            }
            else{
                $('input[type=checkbox]').prop( "checked", false );
                checked = all_checked = false;
            }
        }
        if(checked){
            $('.btn.btn-danger.btn-md').addClass('d-inline');
        }
        else{
            $('.btn.btn-danger.btn-md').removeClass('d-inline');
        }
    });

    $('.btn.btn-danger.btn-md').click(function(){
        arr=[]; id = '';
        $('input[type=checkbox]').each(function(){
            if( $(this).prop( "checked" ) ){
                name = $(this).parent().parent().find('.i-name').html();
                arr.push(name);
                id +=  'id' + $(this).attr('name') ;
            }
        });
        abc = true;
        arr.forEach(i => {
            if(arr[0] != i){
                abc = false;
            } 
        });
        if(abc){
            $.ajax({
                url: API_URL + 'invoices/get_payment_info/' + id,
                dataType: 'JSON',
                success: function(res) {
                    $("#record_payment_form_modal .modal-content").html(res.html);
                    $("#record_payment_form_modal").modal();
                }
            });
        }
        else{
            alert("Multiple selection is not allowed for different parties!");
        }
    });

}

function calc_paying_amt(){
    pamt = 0;
    $('input[name="payingAMT[]"]').each(function(){
        pamt += $(this).val()*1;
    });
    $('input[name=totalPayingAMT]').val(pamt);
}

function save_payment(){
    calc_paying_amt();
    $.ajax({
        url: API_URL + 'invoices/save_payment/',
        type: 'POST',
        data: $('#record_payment').serialize(),
        dataType: 'JSON',
        success: function(res) {
            alert(res.msg);
            if (res.success) {
                $('#record_payment_form_modal').modal('hide');
                location.reload();
            }
        }
    });
}
$(document).ready(function(){ 
    slct2();
}); 
function calc_total(){
    disc = 0; gst=0;    amt=0;  cost=0; rate=0;
    $('.disc').each(function(){
        disc += $(this).val()*1;
    });
    $('.gst').each(function(){
        gst += $(this).val()*1;
    });
    $('.amt').each(function(){
        amt += $(this).val()*1;
    });
    $('.cost').each(function(){
        cost += $(this).val()*1;
    });
    $('.rate').each(function(){
        rate += $(this).val()*1;
    });
    $('#total_disc').val(disc);
    $('#total_amt').val(amt);
    $('#total_gst').val(gst);
    $('#grand_total').val(amt+gst-disc);
    $('#total_cost').val(cost);
    $('#total_rate').val(rate);
}
function add_table_item(){
    flag = false;

    $("#tbody tr input[type='hidden']").each(function() { 
        id = $(this).attr('value');
        console.log(id);
        if($('#item_id').val() == id ){
            alert("Item is already selectyed");
            flag = true;
        }
    });
    
    if(!flag){
        var name, item_code, cost, rate, id;
        items.forEach(i => {
            if( i.id == $('#item_id').val() ){
                id = i.id;
                name = i.name;
                item_code = i.item_code;
                cost = i.unit_cost;
                rate = i.sale_cost;
                gst = i.gst;
                uom = i.uom;
            }
            
        });

        $("#total").before(
            `<tr>
            <input type="hidden" value="${id}" name="item_id[]">
            <td><input type="text" value="${name}" name="name[]" class="w-100 border-0 inpt" readonly></td>
            <td><input type="text" value="${item_code}" name="code[]" class="w-100 border-0 inpt" readonly></td>
            <td><input type="text" value="${cost}" name="cost[]" class="w-100 border-0 inpt cost" readonly></td>
            <td><input type="number" value="${rate}" name="rate[]" class="w-75 rate border-0" readonly></td>
            <td><input type="number" value="1" name="qnty[]" class="w-75 qnty" min="1"></td>
            <td><input type="number" value="0" name="disc[]" class="w-75 disc" min="1"></td>
            <td><input type="number" value="${gst*rate/100}" gst="${gst}" name="gst[]" class="w-75 gst border-0" min="1" readonly></td>
            <td><input type="text" value="${rate}" name="final_amt[]" class="w-100 border-0 inpt amt" readonly onkeyup="calc_amt()"></td>
            <td><i class="fa fa-trash-o btn-sm btn-danger"></i></td>
            <input type="hidden" value="${uom}" name="uom[]">
            </tr>`);

        slct2();
    }
}