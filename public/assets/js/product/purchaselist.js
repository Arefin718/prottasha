$(document).ready(function(){
    $('#myTable').dataTable();
});

function ChangePurchaseStatus(purchase_id) {


    $.ajax({
        type: "POST",
        url: "/purchase/deletepurchase",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            purchase_id : purchase_id,
        },
        success: function (result) {
            $('#purchase_'+purchase_id).remove();
            console.log(result);
        }
    });

}
