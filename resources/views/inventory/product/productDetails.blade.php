@extends('layouts.inventory-layout')

@section('title', 'Prottasha | Inventory')


@section('content')

    <h1>Product Details</h1>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

            @foreach($products as $product)
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$product->product_name}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>

                                    <tr>
                                        <td>Product Title:</td>
                                        <td>{{$product->product_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Product Type:</td>
                                        <td>{{$product->product_type}}</td>
                                    </tr>
                                    <tr>
                                        <td>Product Description</td>
                                        <td>{{$product->product_description}}</td>
                                    </tr>
                                    <tr>
                                        @foreach($total_purchase as $t_purchase)
                                        <td>Total Purchase</td>
                                        <td>{{$t_purchase->total_purchase}}</td>

                                    </tr>
                                    <tr>
                                        <td>Total Sell</td>
                                        <td>{{$t_purchase->total_sell?:0}}</td>
                                    </tr>
                                    <tr>
                                        <td>Available Quantity</td>
                                        <td>{{$t_purchase->total_purchase - $t_purchase->total_sell}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>Buying Price</td>
                                        <td>{{$product->buying_price}}</td>
                                    </tr>
                                    <tr>
                                        <td>Buying Price</td>
                                        <td>{{$product->selling_price}}</td>
                                    </tr>

                                    <tr>
                                        <td>Last Updated By</td>
                                        <td><a href="/user/details/{{$product->updated_by}}">{{$product->updated_name}}</a>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                                @if(Session::get('user.type') =="Admin")
                                    <a href="/product/productedit/{{$product->id}}" class="btn btn-primary">Edit</a>

                                @endif
                            </div>
                        </div>
                    </div>


                </div>
                @endforeach
        </div>
    </div>
    <div class="md-form active-cyan-3 mb-4">
        <form class="form-inline md-form form-sm active-cyan-2">
            <input id="search_product" onkeyup="SearchProduct()" class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search Product" aria-label="Search">
            <i class="fa fa-search" aria-hidden="true"></i>

        </form>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body row">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table display responsive product-overview mb-30" id="myTable">
                                    <thead>
                                    <tr>
                                        <th>Purchase Date</th>
                                        <th>Purchase Quantity</th>
                                        <th>Buying Price</th>
                                        <th>Selling Price</th>
                                        <th>Purchase By</th>
                                    </tr>
                                    </thead>
                                    <tbody id="p_body">
                                    <div id="products_list">
                                        @foreach($purchases as $purchase)

                                            <tr>
                                                <td class="txt-dark">{{$purchase->created_at}}</td>
                                                <td class="txt-dark" style="text-transform:capitalize">{{$purchase->added_quantity}}</td>
                                                <td class="txt-dark">{{$purchase->buying_price}}</td>

                                                <td class="txt-dark">{{$purchase->selling_price}}</td>

                                                <td class="txt-dark"><a href="/user/details/{{$purchase->added_by}}">{{$purchase->added_by}}</a></td>


                                            </tr>

                                        @endforeach
                                    </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

    <script src="{{ URL::asset('assets/js/product/productlist.js') }}"></script>

@endsection
