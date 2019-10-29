$(document).ready(function(){

    //$('#sellsTable').dataTable();

$.fn.datepicker.defaults.format = "yyyy-mm-dd";

    $("#txtFromDate").datepicker({

        maxDate:0,
        onSelect: function(selected) {

            $("#txtToDate").datepicker("option","minDate", selected)
        }
    });
    $("#txtToDate").datepicker({

        maxDate:0,
        numberOfMonths: 2,
        onSelect: function(selected) {
            alert(selected);
            $("#txtFromDate").datepicker("option","maxDate", selected)
        }
    });
});



function SearchByDate(){
    var from = $("#txtFromDate").val();
    var to = $("#txtToDate").val();
    if(to !=null || from != null) {


        $.ajax({
            url: '/report/sellbyrange',
            type: 'GET',
            data: {
                'from': from,
                'to': to
            },
            success: function (response) {

                var sells = '';
                console.log(response);
                for (var i = 0; i < response.length; i++) {
                    sells+='<tr>\n' +
                        '                                                <td class="txt-dark">'+response[i]['date']+'</td>\n' +
                        '                                                <td class="txt-dark">'+response[i]['total_amount']+'</td>\n' +
                        '                                                <td class="txt-dark">'+response[i]['amount_paid']+'</td>\n' +
                        '                                                <td class="txt-dark">'+response[i]['amount_due']+'</td>\n' +
                        '                                                <td class="txt-dark">'+response[i]['total_quantity']+'</td>\n' +
                        '                                                <td class="txt-dark">\n' +
                        '                                                    <a onclick="" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Details</a>\n' +
                        '                                                </td>\n' +
                        '                                            </tr>';

                }

                $("#report_body").html(sells);
                $("#txtFromDate").val("");
                $("#txtToDate").val("");
            },
            error: function (response) {
                console.log(response);

            }
        });
    }
}


function SellDetails($invoice_number){

    var item_list='';
    $.ajax({
        url: '/shop/details',
        type: 'GET',
        data: {'invoice_number': $invoice_number},
        success: function (response) {

            var item_list='';
            for (var i=0; i<response.length;i++) {
                item_list += ' <tr>\n' +
                    '                                <td class="txt-dark">'+response[i]['p_id']+'</td>\n' +
                    '                                <td class="txt-dark">'+response[i]['product_name']+'</td>\n' +
                    '                                <td class="txt-dark">'+response[i]['quantity']+'</td>\n' +
                    '                                <td class="txt-dark">'+response[i]['unit_price']+'</td>\n' +
                    '                                <td class="txt-dark">'+response[i]['total_price']+'</td>\n' +
                    '\n' +
                    '                            </tr>';

            }

            $("#purchase_details").html(item_list);
        },
        error: function (response) {
            console.log(response);

        }
    });
}


