
var member_details;

function searchMember() {

    var member_id = $('#member_id').val();
    var members= $('#members').html();

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
                        members +="<a href='#'  >"+"<li id='memberid_click' onclick='memberid_click("+response[i]['member_id']+")'>"+response[i]['member_id']+"</li></a>";

                    }

                    $('#show_member').html(members);
                    $('#members').html(members);
                }
            },
            error: function(response){
                $('#show_member').html(response);

                $('#name').val("");
            }
        });


    }else{
        $('#show_member').html("");
    }
if($('#name').val()!=''){
    $('#show_member').html("");
}
    for(var i=0; i<member_details.length; i++){
        if(member_id==member_details[i]['member_id']){
            $('#name').val(member_details[i]['name']);
            $('#member_id').val(member_details[i]['member_id']);
            $('#show_member').html("");

        }

    }
}


function memberid_click(response) {
    var member_id = $('#member_id').val();
    if(member_id !== '') {
        $('#member_id').val(response);
        for (var i = 0; i < member_details.length; i++) {
            if (response == member_details[i]['member_id']) {
                $('#name').val(member_details[i]['name']);
                // $('#member_id').val(member_details[i]['member_id']);
                $('#show_member').html("");

            }
        }
    }else{
        $('#name').val("");
        $('#show_member').html("");
    }
}



