function formatDate(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return date.getDate() + "/" + date.getMonth() + "/" + date.getFullYear() + "  ";
}
var d = new Date();
var e = formatDate(d);
$(document).ready(function() {

    $("#order_date").val(e);

    document.getElementsByName('add_product').disabled = true;
    SubTotal();

});

function paymentType() {
   var option = $("#payment_type").val();
    if(option == "member"){

        $('.payment tr').eq(+1).before("<tr class='row member_id'>" +
            "<td>Member ID</td>" +
            "<td>" +
            "<input onkeyup='SearchMember()' id='member_id'  type='text'/>" +
            "<input hidden id='member_table_id' name='member_id' type='text' value=''/>" +
            "</td>" +
            "</tr>");

        $('.payment tr').eq(+2).before("<tr class='row current_balance'>" +
            "<td>Current Balance</td>" +
            "<td>" +
            "<input readonly id='current_balance' type='text'/>" +

            "</td>" +
            "</tr>");

    }


    if(option == "cash"){

        $(".member_id").remove();
        $(".current_balance").remove();

    }

}
var current_balance;
function SearchMember() {
    var member_id= $('#member_id').val();
var deposit_amount;
var purchase_amount;
if(member_id.length >= 4) {
    $.ajax({
        url: '/member/searchmemberfromshop',
        type: 'GET',
        data: {'member_id': member_id},
        success: function (response) {
            console.log(response);
             $("#customer_name").val(response[0]['name'])
            $("#customer_contact").val(response[0]['contact_number'])
            $("#member_table_id").val(response[0]['id'])
            if(response[0]['deposit_amount']==null){
                response[0]['deposit_amount']=0;
            }

            if(response[0]['purchase_amount']==null){
                response[0]['purchase_amount']=0;
            }

 current_balance=parseFloat(response[0]['deposit_amount'])-parseFloat(response[0]['purchase_amount']);
            $("#current_balance").val(current_balance);
            var total=parseFloat($("#total_amount").val());


            if(total>current_balance){
                document.getElementById("current_balance").style.color = "#ff0000";
            }else{
                document.getElementById("current_balance").style.color = "#000000";
            }
        },
        error: function (response) {
            console.log(response);

        }
    });
}
}
function Remove($id){
    $("#item_"+$id).remove();
    SubTotal();
}





var product;
function SearchProduct(){
    var keyword= $('#search_product_id').val();
    var id;
    var product_id;
    var product_name;
    var selling_price;
    var available_quantity;

    if(keyword.length >= 2) {

    $.ajax({
        url: '/product/searchproduct',
        type: 'GET',
        data: {'keyword': keyword},
        success: function (response) {
            console.log(response);
            if(response[0]['total_sell'] ==null){
                response[0]['total_sell']=0;
        }
            if(response[0]['total_purchase'] == null){
                response[0]['total_purchase']=0;
            }


            available_quantity=parseInt(response[0]['start_quantity'])+parseInt(response[0]['total_purchase'])
                -parseInt(response[0]['total_sell']);


            $("#search_product_name").val(response[0]['product_name'])
            $("#search_product_price").val(response[0]['selling_price'])
            $("#search_product_quantity").val(available_quantity);
            document.getElementsByName('add_product').disabled = false;
product=response;
        },
        error: function (response) {
            console.log(response);

        }
    });
}else{
        $("#search_product_name").val("")
        $("#search_product_price").val("")
        $("#search_product_quantity").val("");
        document.getElementsByName('add_product').disabled = true;
    }
}

function AddProduct(){
   var max_quantity=parseInt(product[0]['start_quantity'])+parseInt(product[0]['total_purchase'])
        -parseInt(product[0]['total_sell']);
if( document.getElementById('item_'+product[0]['id'])){
    var quantity=parseInt($("#quantity_"+product[0]['id']).val());
   quantity+=1;
    $("#quantity_"+product[0]['id']).val(quantity);
    var selling_price=parseInt($("#selling_price_"+product[0]['id']).val());
    var total=quantity*selling_price;
    $("#total_"+product[0]['id']).val(total);

    SubTotal()
}else {

    var newProduct = ' <tr class="item" id="item_' + product[0]['id'] + '">\n' +
        '<td><input  name="product_id[]"  type="text" value="'+product[0]['id']+'"/></td>' +
        '                                    <td><input readonly name="product_name[]" value="' + product[0]['product_name'] + '"/></td>\n' +
        '                                    <td class="cart-product-quantity">\n' +
        '                                        <input name="quantity[]" id="quantity_' + product[0]['id'] + '" max="' + max_quantity + '" min="1" onchange="OnQuantityChange(' + product[0]['id'] + ',' + product[0]['selling_price'] + ')"  type="number" value="1">\n' +
        '\n' +
        '                                    </td>\n' +
        '                                    <td><input readonly type="number"  id="selling_price_'+product[0]['id']+'" name="selling_price[]" value="' + product[0]['selling_price'] + '"/></td>\n' +
        '                                    <td> <input readonly name="total_price[]" type="number" class="total" id="total_'+product[0]['id'] +'"value="'+product[0]['selling_price']+'"/></td>\n' +
        '                                    <td class="romove-item"><a onclick="Remove(' + product[0]['id'] + ')" href="#" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>\n' +
        '                                </tr>';

    $('.product_table tbody:first').before(newProduct);
    $('#search_product_id').val("");
    $("#search_product_name").val("")
    $("#search_product_price").val("")
    $("#search_product_quantity").val("");
    document.getElementsByName('add_product').disabled = true;
    SubTotal();
}
}

function OnQuantityChange($id,$selling_price){
var quantity=$("#quantity_"+$id).val();
var total_price= quantity*parseInt($selling_price);

    $("#total_"+$id).val(total_price);

    SubTotal();
}

function SubTotal(){
    var sum = 0;
    $(".total").each(function() {

        var value = $(this).val();
        sum += parseFloat(value);

    });
    $("#sub_total").val(sum);
    TotalAmount();
}

function TotalAmount() {
var sub_total=$("#sub_total").val();
    var total_amount=sub_total;
    var discount=parseFloat($("#discount").val());
    if(discount==null){
        discount=0;
    }

    total_amount=total_amount-discount;
    var vat=parseFloat($("#vat").val());
    if(vat==null){
        vat=0;
    }
    total_amount=total_amount+(total_amount*vat/100);

    // total_amount=(sub_total*(vat/100));
    $("#total_amount").val(total_amount);
    PaymentAmount()

    if(total_amount>current_balance){
        document.getElementById("current_balance").style.color = "#ff0000";
    }else{
        document.getElementById("current_balance").style.color = "#000000";
    }
}

function PaymentAmount(){
    var total_amount=$("#total_amount").val();
    var payment_amount=$("#payment_amount").val();

var due_amount=total_amount-payment_amount;
var return_amount=payment_amount-total_amount;
if(due_amount<0){
    due_amount=0;
}



if(return_amount<0){
    return_amount=0;
}


    $("#due_amount").val(due_amount);
    $("#return_amount").val(return_amount);

}


function invoice() {
    
}
