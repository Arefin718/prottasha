function changeStatus(employeeId) {


    $.ajax({
        type: "POST",
        url: "/admin/deleteemployee",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id : employeeId,
        },
        success: function (result) {
            console.log(result);
        }
    });

}
