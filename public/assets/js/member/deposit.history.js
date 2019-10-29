$(document).ready(function(){
    $('#depositTable').dataTable();
    $('#purchaseTable').dataTable();

   // $("#tabs").tabs();
});




function Deposit(){

    var pdf = new jsPDF('p', 'pt', 'letter');
    source = $('#depositTable_print')[0];
    console.log(source);
    specialElementHandlers = {
        '#bypassme': function(element, renderer){
            return true
        }
    }
    margins = {
        top: 50,
        left: 60,
        width: 545
    };
    pdf.fromHTML(
        source // HTML string or DOM elem ref.
        , margins.left // x coord
        , margins.top // y coord
        , {
            'width': margins.width // max width of content on PDF
            , 'elementHandlers': specialElementHandlers
        },
        function (dispose) {
            // dispose: object with X, Y of the last line add to the PDF
            //          this allow the insertion of new lines after html
            pdf.save('Deposit History.pdf');
        }
    )
}
function Purchase(){

    var pdf = new jsPDF('p', 'pt', 'letter');
    source = $('#purchaseTable_print')[0];
    console.log(source);
    specialElementHandlers = {
        '#bypassme': function(element, renderer){
            return true
        }
    }
    margins = {
        top: 50,
        left: 60,
        width: 545
    };
    pdf.fromHTML(
        source // HTML string or DOM elem ref.
        , margins.left // x coord
        , margins.top // y coord
        , {
            'width': margins.width // max width of content on PDF
            , 'elementHandlers': specialElementHandlers
        },
        function (dispose) {
            // dispose: object with X, Y of the last line add to the PDF
            //          this allow the insertion of new lines after html
            pdf.save('PurchaseHistory.pdf');
        }
    )
}

function PurchaseHistory($invoice_number){

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
console.log(item_list);
            $("#purchase_details").html(item_list);
        },
        error: function (response) {
            console.log(response);

        }
    });


}
