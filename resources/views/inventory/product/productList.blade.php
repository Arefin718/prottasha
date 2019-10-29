@extends('layouts.inventory-layout')

@section('title', 'Prottasha | Inventory')


@section('content')

    <h1>Product List</h1>


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
                                        <th>Product ID</th>
                                        <th>Product Title</th>
                                        <th>Product Type</th>
                                        <th>Product Description</th>
                                        <th>Total Purchase</th>
                                        <th>Available Quantity</th>
                                        <th>Buying Price</th>
                                        <th>Selling Price</th>
                                        <th>Last Update</th>

                                    </tr>
                                    </thead>
                                    <tbody id="p_body">
<div id="products_list">
                                    @foreach($products as $product)

                                        <tr>
                                            <td class="txt-dark">{{$product->product_id}}</td>
                                            <td class="txt-dark" style="text-transform:capitalize">{{$product->product_name}}</td>
                                            <td class="txt-dark">{{$product->product_type}}</td>

                                            <td class="txt-dark">{{$product->product_description}}</td>
                                            <td class="txt-dark">{{$product->total_purchase}}</td>
                                            <td class="txt-dark">{{$product->available_quantity}}</td>

                                            <td class="txt-dark">{{$product->buying_price}}</td>

                                            <td class="txt-dark">{{$product->selling_price}}</td>
                                            <td class="txt-dark">{{$product->updated_at}}</td>

                                            <td><a href="/product/productedit/{{$product->id}}" class="btn btn-primary a-btn-slide-text">
                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                    <span><strong>Edit</strong></span>
                                                </a></td>

                                            <td><a href="/purchase/newpurchase/{{$product->id}}" class="btn btn-primary a-btn-slide-text">
                                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                                    <span><strong>Purchase</strong></span>
                                                </a></td>
                                            <td><a href="/product/productdetails/{{$product->id}}" class="btn btn-primary a-btn-slide-text">
                                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                                    <span><strong>Details</strong></span>
                                                </a></td>

                                            <td>
                                                <div class="toggle">
                                                        <span class="mid">
                                                            <label class="switch">
                                                                @if($product->status==1)
                                                                    <input type="checkbox" checked id="feature" onclick="changeStatus({{$product->id}})">
                                                                @else
                                                                    <input type="checkbox" id="feature" onclick="changeStatus({{$product->id}})">

                                                                @endif
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </span>
                                                </div>
                                            </td>
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
