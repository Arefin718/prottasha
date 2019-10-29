@extends('layouts.member-layout')


@section('title', 'Prottasha | Member')

<link rel="stylesheet" href="{{ URL::asset('assets/css/normalize.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/form-styles.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/datepicker.css') }}">
<script src="{{ URL::asset('assets/js/memberdeposit.js') }}"></script>
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body row">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <div id="htmltopdf">
                                    <table  class="HTMLtoPDF table display responsive product-overview mb-30">
                                        <thead>
                                        <tr>
                                            <th>Member ID</th>
                                            <th>Member Name</th>
                                            <th>Deposit Amount</th>
                                            <th>Deposit Date</th>
                                            <th>Deposit By</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id="deposit_history">

                                        @foreach($deposits as $deposit)

                                            <tr>
                                                <td class="txt-dark">{{$deposit->member_id}}</td>
                                                <td class="txt-dark">{{$deposit->name}}</td>
                                                <td class="txt-dark">{{$deposit->amount}}</td>
                                                <td class="txt-dark">{{$deposit->deposit_date}}</td>
                                                <td class="txt-dark"><a href="/user/details/{{$deposit->added_by}}">{{$deposit->added_name}}</a></td>

                                                <td><a href="#">Details</a></td>
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

<a href="#" id="button" onclick="HTMLtoPDF()">pdf</a>


@endsection

@section('scripts')
    <script src="{{ URL::asset('assets/js/jspdf.js') }}"></script>
    <script src="{{ URL::asset('assets/js/member/deposit.history.js') }}"></script>



@endsection
