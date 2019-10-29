function search() {
    var member_id= $('#search_member').val();
    //alert(keyword);

    if(member_id !== ''){

        $.ajax({
            url: '/member/getmember',
            type: 'GET',
            data: { 'id': member_id },
            success: function(response)
            {
                member_details=response;
                console.log(response);
                var members='';
                if(response.length>0){

                    for(var i=0; i<response.length; i++){

                        members +="<li><a href='/member/deposit/history/"+response[i]['id']+"'>"+response[i]['member_id']+"</a></li>";

                    }

                    $('#show_member').html(members);

                }
            },
            error: function(response){
                $('#show_member').html(response);

            }
        });


    }else{
        $('#show_member').html("");
    }


}

function changeStatus(memberId) {


    $.ajax({
        type: "POST",
        url: "/member/changestatus",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id : memberId,
        },
        success: function (result) {
            console.log(result);
        }
    });

}
