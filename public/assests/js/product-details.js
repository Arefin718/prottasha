$("input[type=number]").bind('keyup input', function(){
    var pquantity= $('#available_quantity_product').text();
    var cartQty=$("#qtyToBeAddedInCart").val();

    if(cartQty>pquantity){
        alert('Max Reached');
        $("#qtyToBeAddedInCart").val(pquantity);
        $("#maxAvailable").text("Qualtity Available: "+pquantity);
        $("#maxAvailable").css("visibility", "visible");
    }else{
        $("#addToCartButton").removeClass("disabled");
    }


});


function updateAvailabelQuantity() {
    var color = $('input[name=color]:checked').val();
    var size= $('input[name=size]:checked').val();
    var pid= $('#product_id').text();




    $("#maxAvailable").css("visibility", "hidden");





    $.ajax({
        type: "POST",
        url: "/product/quantityByDetails",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            color : color,
            size : size,
            pid : pid
        },
        success: function (result) {

             if(result.length==0){
                $('#available_quantity_product').text(0);
            }else{
                var quantity = result[0].available_quantity;
                $('#available_quantity_product').text(quantity);
            }
        }
    });




    var pquantity= $('#available_quantity_product').text();
    var cartQty=$("#qtyToBeAddedInCart").val();
    if(cartQty>pquantity){
        alert('Max Reached');
        $("#qtyToBeAddedInCart").val(pquantity);
        $("#maxAvailable").text("Qualtity Available: "+pquantity);
        $("#maxAvailable").css("visibility", "visible");
    }else{
        $("#addToCartButton").removeClass("disabled");
    }



}