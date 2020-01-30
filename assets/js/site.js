page_reload =true;


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
            items=res.products;
            $("#invoice_form_modal .modal-content").html(res.html);
            $("#invoice_form_modal").modal();
            slct2();
            // page_reload =true;
        }
    });
}


function save_invoice() {
    $.ajax({
        url: API_URL + 'invoices/save_invoice/',
        type: 'POST',
        data: $('#invoice_form').serialize(),
        dataType: 'JSON',
        success: function(res) {
            alert(res.msg);
            if (res.success) {
                $('#invoice_form_modal').modal('hide');
                if(page_reload)
                    location.reload();
            }
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
    });

    $(".qnty").keyup(function() {
        qnty = parseInt($(this).val());
        rate = $(this).parent().parent().find('.rate').val();
        amt = rate*qnty;
        if(!amt)
            amt = 0;
        $(this).parent().parent().find('.amt').val(amt);
    });

    $(".rate").keyup(function() {
        rate = $(this).val();
        qnty = $(this).parent().parent().find('.qnty').val();
        amt = rate*qnty;
        if(!amt)
            amt = 0;
        $(this).parent().parent().find('.amt').val(amt);
        
        gst = $(this).parent().parent().find('.gst').attr('gst');

        gst = gst * amt / 100;
        $(this).parent().parent().find('.gst').val(gst);
    });
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
            }
            
        });

        $("#total").before(
            `<tr>
            <td><input type="text" value="${name}" name="name[]" class="w-100 border-0 inpt" readonly></td>
            <td><input type="text" value="${item_code}" name="code[]" class="w-100 border-0 inpt" readonly></td>
            <td><input type="text" value="${cost}" name="cost[]" class="w-100 border-0 inpt" readonly></td>
            <td><input type="number" value="${rate}" name="rate[]" class="w-75 rate border-0" readonly></td>
            <td><input type="number" value="1" name="qnty[]" class="w-75 qnty" min="1"></td>
            <td><input type="number" value="0" name="disc[]" class="w-75 disc" min="1"></td>
            <td><input type="number" value="${gst*rate/100}" gst="${gst}" name="gst[]" class="w-75 gst border-0" min="1" readonly></td>
            <td><input type="text" value="${rate}" name="amnt[]" class="w-100 border-0 inpt amt" readonly onkeyup="calc_amt()"></td>
            <td><i class="fa fa-trash-o btn-sm btn-danger"></i></td>
            <input type="hidden" value="${id}" name="id">
            </tr>`);

        slct2();

        // $("#tbody tr input[type='number']").each(function() { 
        //     id = $(this).attr('value');
        //     console.log(id);
        //     if($('#item_id').val() == id ){
        //         alert("Item is already selectyed");
        //         flag = true;
        //     }
        // });

        // $('#total').val(total_amt);
        
    }
}