

    @extends('layouts.user-layout')


@section('content')
    <div class="container-fluid">

        <h2>Sell List</h2>

        <div id="sell" class="row">

            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">

                        <div class="panel-body row">
                            <div class=""><a href="#" class="btn btn-primary" onclick="">Print</a></div>

                            <div class="table-wrap">

                                <div class="table-responsive">

                                    <div id="purchaseTable_print">

                                        <table id="sellsTable" class="HTMLtoPDF  sellsTable table display responsive product-overview mb-30 myTable">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th>Date</th>
                                                <th>Invoice Number</th>
                                                <th>Total Amount</th>
                                                <th>Amount Paid</th>
                                                <th>Amount Due</th>
                                                <th>Payment Type</th>
                                                <th>Customer Name</th>
                                                <th>Customer Contact</th>

                                                <th></th>
                                                @if($user->type=='Admin'||$user->type=='Manager')
                                                <th></th>
                                                <th></th>
                                                    @endif
                                            </tr>
                                            </thead>
                                            <tbody id="table_body">

                                            @foreach($sells as $sell)

                                                <tr>
                                                    <td class="txt-dark">{{$sell->created_at}}</td>
                                                    <td class="txt-dark">{{$sell->invoice_number}}</td>
                                                    <td class="txt-dark">{{$sell->total_amount}}</td>
                                                    <td class="txt-dark">{{$sell->payment_amount}}</td>
                                                    <td class="txt-dark">{{$sell->payment_due}}</td>
                                                    <td class="txt-dark">{{$sell->payment_type}}</td>
                                                    <td class="txt-dark">{{$sell->customer_name}}</td>
                                                    <td class="txt-dark">{{$sell->customer_contact}}</td>
                                                    <td class="txt-dark">
                                                        <a onclick="" type="button" class="btn btn-info" data-toggle="modal" data-target="#detailsModel">Details</a>
                                                    </td>
                                                    @if($user->type=='Admin'||$user->type=='Manager')
                                                    <td class="txt-dark">
                                                        <a onclick="" type="button" class="btn btn-info" data-toggle="modal" data-target="#editModel">Edit</a>
                                                    </td>
                                                    <td class="txt-dark">
                                                        <a onclick="" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Remove</a>
                                                    </td>
                                                        @endif
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

@endsection
@section('scripts')
    <script>
        $(document).ready( function () {
            $('#sellsTable').DataTable();
        } );

    </script>
    @endsection
