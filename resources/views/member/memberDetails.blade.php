@extends('layouts.member-layout')


@section('title', 'Prottasha | Member')

<link rel="stylesheet" href="{{ URL::asset('assets/css/normalize.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/form-styles.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/datepicker.css') }}">
<script src="{{ URL::asset('assets/js/memberdeposit.js') }}"></script>
@section('content')
<div class="row">

</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-wrapper collapse in">
                <div class="panel-body row">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table data-id="HTMLtoPDF"  class="HTMLtoPDF table display responsive product-overview mb-30" id="myTable">
                                <thead>
                                <tr>
                                    <th>Member ID</th>
                                    <th>Member Name</th>
                                    <th>Deposit Amount</th>
                                    <th>Deposit Date</th>
                                    <th>Deposit By</th>

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




@endsection

@section('script')
    <script>
    function HTMLtoPDF(){
    var pdf = new jsPDF('p', 'pt', 'letter');
    source = $('#HTMLtoPDF')[0];
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
    pdf.save('html2pdf.pdf');
    }
    )
    }
    </script>

@endsection
