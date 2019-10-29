$(document).ready(function()
{
	
    $(".profile").on("error", function(){
        $(this).attr('src', 'https://www.w3schools.com/howto/img_avatar.png');
    });


//Employee Active check
 $('.active').each(function(e){
    if($(this).val() == 1){
        $(this).attr("checked", "checked");
        $(this).val() =0;
    }
});


   jQuery.ajax({
                  url: "{{ url('/employee/hr/active') }}",
                  method: 'post',
                  data: {
                     id: jQuery('#active').html(),
                     active: jQuery('#active').val()
                     
                  },
                  success: function(result){
                     alert("success");
                  }});

});

