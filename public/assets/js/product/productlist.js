$(document).ready(function(){
    $('#myTable').dataTable();
});


function SearchProduct() {
    var keyword= $('#search_product').val();

//if(keyword !='') {
    $.ajax({
        url: '/product/getproducts',
        type: 'GET',
        data: {'keyword': keyword},
        success: function (response) {




            if (response.length > 0) {
                var products='';
                console.log(response);
                for (var i = 0; i < response.length; i++) {

                        products += '<tr>' +
                            '<td class="txt-dark">' + response[i]['product_id'] + '</td>' +
                            ' <td class="txt-dark" style="text-transform:capitalize">' + response[i]['product_name'] + '</td>' +
                            '<td class="txt-dark">' + response[i]['product_type'] + '</td>' +
                            ' <td class="txt-dark">' + response[i]['product_description'] + '</td>' +
                            ' <td class="txt-dark">' + response[i]['available_quantity'] + '</td>' +
                            '<td class="txt-dark">' + response[i]['buying_price'] + '</td>' +
                            ' <td class="txt-dark">' + response[i]['selling_price'] + '</td>' +
                            ' <td class="txt-dark">' + response[i]['updated_at'] + '</td>' +
                            '<td><a href="/product/productedit/'+response[i]['id'] +'" class="btn btn-primary a-btn-slide-text">\n' +
                            '                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>\n' +
                            '                                                    <span><strong>Edit</strong></span>\n' +
                            '                                                </a></td>\n' +
                            '<td><a href="/product/productdetails/'+response[i]['id'] +'" class="btn btn-primary a-btn-slide-text">\n' +
                            '                                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>\n' +
                            '                                                    <span><strong>Details</strong></span>\n' +
                            '                                                </a></td>' +
                            '<td>\n' +
                            '                                                <div class="toggle">\n' +
                            '                                                        <span class="mid">\n' +
                            '                                                            <label class="switch">\n';
                        if (response[i]['status'] == 1) {
                            products += ' <input type="checkbox" checked id="feature" onclick="changeStatus(' + response[i]['product_id'] + ')">';
                        }

                        products += '<span class="slider round"></span>\n' +
                            '                                                            </label>\n' +
                            '                                                        </span>\n' +
                            '                                                </div>\n' +
                            '                                            </td>\n' +
                            '                                        </tr>';



                }

            }

            $('#p_body').html(products);

        },
        error: function (response) {
            console.log(response);

        }
    });
//}


}


function changeStatus(product_id) {


    $.ajax({
        type: "POST",
        url: "/product/deleteproduct",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            product_id : product_id,
        },
        success: function (result) {
            console.log(result);
        }
    });

}


















