function changeStatus(vendorId) {


    $.ajax({
        type: "POST",
        url: "http://127.0.0.1:8000/vendor/changeVendorstatus",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            vid : vendorId,
        },
        success: function (result) {
            console.log(result);
        }
    });

}