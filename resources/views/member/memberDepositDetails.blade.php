@extends('layouts.member-layout')


@section('title', 'Prottasha | Member')

<link rel="stylesheet" href="{{ URL::asset('assets/css/normalize.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/form-styles.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/datepicker.css') }}">
<script src="{{ URL::asset('assets/js/memberdeposit.js') }}"></script>
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


        <div class="panel panel-info">
            <div class="panel-heading">
                @foreach($member as $member)
                <h3 class="panel-title">{{$member->name}}</h3>
            </div>
            <div class="panel-body">
                <div class="row">


                    <div class=" col-md-9 col-lg-9 ">
                        <table class="table table-user-information">
                            <tbody>

                            <tr>
                                <td>Join date:</td>
                                <td>{{$member->registration_date}}</td>
                            </tr>

                            <tr>
                                <td>Home Address</td>
                                <td>{{$member->parmanent_address}}</td>
                            </tr>


                            <tr>
                                <td>Phone Number</td>
                                <td>{{$member->contact_number}}
                            </tr>

                            <tr>
                                <td>Last Update</td>
                                <td>{{$member->updated_at}}
                            </tr>
                            <tr>
                                <td>Total Deposit Amount</td>
                                <td>{{$member->deposit_amount}}</td>
                            </tr>
                            <tr>
                                <td>Total Deposit Number</td>
                                <td>{{$member->total_deposit}}</td>
                            </tr>
                            <tr>
                                <td>Total purchaser</td>
                                <td>{{$member->purchase_amount}}</td>
                            </tr>
                            <tr>
                                <td>Due Amount</td>
                                <td>{{$member->payment_due}}</td>
                            </tr>
                            <tr>
                            <td>Added By</td>
                                <td><a href="/user/details/{{$member->added_by}}"> {{$member->added_name}}</a></td>
                            </tr>
                            <td>Last Updated By</td>
                            <td><a href="/user/details/{{$member->updated_by}}"> {{$member->updated_name}}</a></td>
                            </tr>
                            </tbody>
                        </table>

                        <a href="/member/edit/{{$member->id}}" class="btn btn-primary">Edit</a>
                        <a href="/member/" class="btn btn-primary">Back to DashBoard</a>
                    </div>
                </div>
            </div>
@endforeach
        </div>
        {{-- Tab Selection--}}
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#deposit">Deposit</a></li>
                <li><a data-toggle="tab" href="#purchase">Purchase</a></li>

            </ul>
        </div>
    </div>

        <div class="tab-content">
            {{-- Deposit Tab--}}
         <div id="deposit" class="tab-pane fade in active">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body row">
                        <div class=""><a href="#" class="btn btn-primary" onclick="Deposit()">Print</a></div>
                        <div class="table-wrap">

                            <div class="table-responsive">

                                <div id="depositTable_print">

                                    <table id="depositTable" class="HTMLtoPDF table display responsive product-overview mb-30 myTable">
                                        <thead>
                                        <tr>
                                            <th>Deposit Date</th>
                                            <th>Deposit Amount</th>
                                            <th>Deposit By</th>

                                        </tr>
                                        </thead>
                                        <tbody id="deposit_history">

                                        @foreach($deposits as $deposit)

                                            <tr>
                                                <td class="txt-dark">{{$deposit->deposit_date}}</td>
                                                <td class="txt-dark">{{$deposit->amount}}</td>
                                                <td class="txt-dark"><a href="/user/details/{{$deposit->added_by}}">{{$deposit->added_name}}</a></td>

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
            {{-- Purchase Tab--}}
        <div id="purchase" class="tab-pane fade">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body row">
                            <div class=""><a href="#" class="btn btn-primary" onclick="Purchase()">Print</a></div>
                            <div class="table-wrap">

                                <div class="table-responsive">

                                    <div id="purchaseTable_print">

                                        <table id="purchaseTable" class="HTMLtoPDF table display responsive product-overview mb-30 myTable">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Invoice Number</th>
                                                <th>Total Amount</th>
                                                <th>Amount Paid</th>
                                                <th>Due Amount</th>
                                                <th></th>

                                            </tr>
                                            </thead>
                                            <tbody id="deposit_history">

                                            @foreach($purchases as $purchase)

                                                <tr>
                                                    <td class="txt-dark">{{$purchase->created_at}}</td>
                                                    <td class="txt-dark">{{$purchase->invoice_number}}</td>
                                                    <td class="txt-dark">{{$purchase->total_amount}}</td>
                                                    <td class="txt-dark">{{$purchase->payment_amount}}</td>
                                                    <td class="txt-dark">{{$purchase->payment_due}}</td>
                                                    <td class="txt-dark">
                                                        <a onclick="PurchaseHistory('{{$purchase->invoice_number}}')" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Details</a>

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
    {{--Purchase History Modal--}}

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

    {{--Purchase History Modal End--}}

@endsection

@section('scripts')
    <script src="{{ URL::asset('assets/js/jspdf.js') }}"></script>
    <script src="{{ URL::asset('assets/js/member/deposit.history.js') }}"></script>




@endsection



