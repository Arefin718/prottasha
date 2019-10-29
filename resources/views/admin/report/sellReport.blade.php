@extends('layouts.admin-layout')


@section('title', 'Prottasha | Admin')

<link rel="stylesheet" href="{{ URL::asset('assets/css/normalize.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/form-styles.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/datepicker.css') }}">

@section('content')

<div class="container-fluid">
    <h2>Sell Report</h2>

    <div class="row">
    <div class="input-daterange input-group col-sm-8" id="datepicker">
        <input type="text" class="input-sm form-control txtFromDate"  id="txtFromDate" name="sell_from" />
        <span class="input-group-addon ">to</span>
        <input type="text" class="input-sm form-control txtToDate"  id="txtToDate" name="sell_to"  />
        <span class="input-group-addon "><button onclick="SearchByDate()" class="btn btn-primary">Search</button></span>
    </div>
    </div>

    <div id="sell" class="row">

        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">

                    <div class="panel-body row">
                        <div class=""><a href="#" class="btn btn-primary" onclick="Purchase()">Print</a></div>

                        <div class="table-wrap">

                            <div class="table-responsive">

                                <div id="purchaseTable_print">

                                    <table id="sellsTable" class="HTMLtoPDF  sellsTable table display responsive product-overview mb-30 myTable">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>Date</th>
                                            <th>Total Amount</th>
                                            <th>Amount Paid</th>
                                            <th>Due Amount</th>
                                            <th>Total Quantity</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id="report_body">

                                        @foreach($sells as $sell)

                                            <tr>
                                                <td class="txt-dark">{{$sell->date}}</td>
                                                <td class="txt-dark">{{$sell->total_amount}}</td>
                                                <td class="txt-dark">{{$sell->amount_paid}}</td>
                                                <td class="txt-dark">{{$sell->amount_due}}</td>
                                                <td class="txt-dark">{{$sell->total_quantity}}</td>
                                                <td class="txt-dark">
                                                    <a onclick="" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Details</a>
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

    {{--Sell Details Modal--}}

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Shop Details</h4>
                </div>
                <div class="modal-body">
                    <table id="shop_details" class="table display responsive product-overview mb-30 myTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Qauntity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>


                        </tr>
                        </thead>
                        <tbody id="purchase_details">


                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
        {{--Sell Details Modal End--}}
@endsection

@section('scripts')

    <script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jspdf.js') }}"></script>
    <script src="{{ URL::asset('assets/js/admin/report/sellReport.js') }}"></script>



@endsection
