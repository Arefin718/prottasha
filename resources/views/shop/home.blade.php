@extends('layouts.shop-layout')

@section('title', 'Prottasha | Shop')


@section('content')


    <div class="container">



<div class="row"><a href="/home">Home</a></div>
        <form class="form-content" id="shop-form" action="#" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="col-xs-12 row">
<table class="table">
    <tr>
        <td>
            Invoice No:
        </td>
        <td>
            <input name="invoice_number" readonly id="invoice_no" type="text" value="{{$invoice_number}}">
        </td>
        <td>
            Order Date:
        </td>
        <td>
            <input name="date" readonly id="order_date" type="text" /><br>
        </td>
    </tr>
</table>


            </div>
        <br>
        <br>

        {{--  Product Seacrh --}}
        <div class="col-xs-12 panel panel-default">
        <div class="panel-body">
            Search product
            <table class="table">
                <tr>
                    <td>
                        Product ID:
                    </td>
                    <td>
                        <input  id="search_product_id" type="text" placeholder="Search Product By ID" onkeyup="SearchProduct()">
                    </td>
                    <td>
                        Product Name:
                    </td>
                    <td>
                        <input readonly id="search_product_name" type="text" value=""/><br>
                    </td>
                    <td>
                        Unit Price:
                    </td>
                    <td>
                        <input readonly id="search_product_price" type="number" min="0" value="">
                    </td>
                    <td>
                        Available Quantity:
                    </td>
                    <td>
                        <input readonly id="search_product_quantity" type="number" value="" /><br>
                    </td>
                    <td>
                        <button type="button" name="add_product"  class="button btn btn-primary" onclick="AddProduct()">Add</button>
                    </td>
                </tr>
            </table>
        </div>
        </div>
        {{--  Product Seacrh  End--}}

        <div class="col-xs-12" style="overflow:scroll; height:200px;">
            <div class="shopping-cart">

                <div class="shopping-cart-table ">
                    <div class="table-responsive">

                        <table class="table product_table" id="product_table">
                            <thead>

                            <tr>
                                <th class="cart-product-name item">Product ID</th>
                                <th class="cart-product-name item">Product Name</th>
                                <th class="cart-qty item">Quantity</th>
                                <th class="cart-sub-total item">Unit Cost</th>
                                <th class="cart-total last-item">Total Cost</th>
                                <th class="cart-romove item">Remove</th>
                            </tr>
                            </thead>

                            <tbody>


                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div>
                </div><!-- /.shopping-cart-table -->


              		</div><!-- /.shopping-cart -->

        </div> <!-- /.row -->


        {{--  Amount Calculation --}}
        <div class="row col-xs-6 ">
            <table>
                <tr class="row">
                    <td>
                        Sub Amount:
                    </td>
                    <td>
                        <input readonly name="sub_amount" id="sub_total" type="text" >
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        VAT:
                    </td>
                    <td>
                        <input onkeyup="TotalAmount()" name="vat" id="vat" max="20" min="0" onchange=""  type="number" value="0">
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        Discount:
                    </td>
                    <td>
                        <input onkeyup="TotalAmount()" name="discount" id="discount" max="" min="0" onchange=""  type="number" value="0">
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        Total Amount:
                    </td>
                    <td>
                        <input name="total_amount" id="total_amount" type="text" >
                    </td>
                </tr>

            </table>
        </div>
        {{--  Amount Calculation End --}}


        {{-- Payment Details --}}
        <div class="row col-xs-5 ">
            <table class="payment">
                <tr class="row">
                    <td>
                        Payment Type
                    </td>
                    <td>
                        <select onchange="paymentType()" required name="payment_type" id="payment_type">
                            <option value="cash">Cash</option>
                            <option value="member">Member</option>
                        </select>
                    </td>
                </tr>

                <tr class="row">
                    <td>
                        Customer Name
                    </td>
                    <td>
                        <input name="customer_name" id="customer_name"   type="text" value="">
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        Customer Contact
                    </td>
                    <td>
                        <input name="customer_contact" id="customer_contact"   type="text" value="">
                    </td>
                </tr>
                <tr class="row">
                    <td>
                       Payment Amount
                    </td>
                    <td>
                        <input onkeyup="PaymentAmount()" name="payment_amount" id="payment_amount" min="0"   type="number" value="0">
                    </td>
                </tr>
                <tr class="row">
                    <td>
                        Due Amount
                    </td>
                    <td>
                        <input readonly name="due_amount" id="due_amount" min="0" onchange=""  type="number" value="0">
                    </td>
                </tr>

                <tr class="row">
                    <td>
                        Return Amount
                    </td>
                    <td>
                        <input readonly name="return_amount" id="return_amount" min="0"  type="number" value="0">
                    </td>
                </tr>

                <tr class="row">

                    <td>
                        <button name="register-submit" type="submit" class="button btn btn-primary">Print</button>
                    </td>
                    <td>
                        <button name="register-submit" type="submit" class="button btn btn-primary btn-danger">Cancel</button>
                    </td>

                </tr>

            </table>
        </div>
        {{-- Payment Details End --}}
        </form>
    </div>






@endsection
@section('scripts')

    <script src="{{ URL::asset('assets/js/shop/home.js') }}"></script>




@endsection
