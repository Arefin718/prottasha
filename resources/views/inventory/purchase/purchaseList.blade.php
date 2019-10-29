@extends('layouts.inventory-layout')

@section('title', 'Prottasha | Inventory')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body row">

                        <div class="table-wrap">
                            <div class="table-responsive">
                                <div class="row header" style="text-align:center;color:green">
                                    <h1>Purchase List</h1>
                                </div>
                                <table  class="table-striped table display responsive product-overview mb-30" id="myTable">
                                    <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Product Title</th>
                                        <th>Purchase Quanity</th>
                                        <th>Buying Price</th>
                                        <th>Total Price</th>
                                        <th>Selling Price</th>
                                        <th>Purchase Date</th>
                                        <th>Purchase By</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                    </thead>
                                    <tbody id="p_body">
                                    <div id="products_list">
                                        @foreach($purchases as $purchase)

                                            <tr id="purchase_{{$purchase->id}}">
                                                <td class="txt-dark">{{$purchase->p_id}}</td>
                                                <td class="txt-dark">{{$purchase->product_name}}</td>
                                                <td class="txt-dark">{{$purchase->added_quantity}}</td>
                                                <td class="txt-dark">{{$purchase->buying_price}}</td>
                                                <td class="txt-dark">{{$purchase->added_quantity * $purchase->buying_price}}</td>
                                                <td class="txt-dark">{{$purchase->selling_price}}</td>
                                                <td class="txt-dark">{{$purchase->created_at}}</td>
                                                <td class="txt-dark"><a href="/user/details/{{$purchase->added_by}}">{{$purchase->added_name}}</a></td>
                                                <td><a href="/purchase/editpurchase/{{$purchase->id}}" class="btn btn-primary a-btn-slide-text">
                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                        <span><strong>Edit</strong></span>
                                                    </a></td>

                                                <td>
                                                    <div class="toggle">
                                                        <span class="mid">
                                                            <label class="switch">
                                                                @if($purchase->status==1)
                                                                    <input type="checkbox" checked id="feature" onclick="ChangePurchaseStatus({{$purchase->id}})">
                                                                @else
                                                                    <input type="checkbox" id="feature" onclick="ChangePurchaseStatus({{$purchase->id}})">

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

    <script src="{{ URL::asset('assets/js/product/purchaselist.js') }}"></script>

    @endsection
