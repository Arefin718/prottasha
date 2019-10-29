@extends('layouts.shop-layout')

@section('title', 'Prottasha | Shop')


@section('content')



    <div class="container">
        {{csrf_field()}}
    <div class="card">
        <div class="card-header">
            Invoice
            <strong>{{$sell->invoice_number}}</strong>
            <span class="float-right"> <strong> Date:</strong> {{$sell->created_at}}</span>

        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="mb-3">From:</h6>
                    <div>
                        <strong>Prottasha</strong>
                    </div>
                    <div>Patgram, Lalmonirhat</div>

                </div>

                <div class="col-sm-6">
                    <h6 class="mb-3">To:</h6>
                    @if($sell->member_id != null)
                        <div>
                            <strong>Member ID: {{$sell->member_id}}</strong>
                        </div>
                    @endif
                        <div>
                        <strong>{{$sell->customer_name}}</strong>
                    </div>


                    <div>Phone: {{$sell->customer_contact}}</div>
                </div>



            </div>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Product</th>
                        <th class="right">Unit Cost</th>
                        <th class="center">Qty</th>
                        <th class="right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bills as $bill)
                    <tr>
                        <td class="center">{{$bill->p_id}}</td>
                        <td class="left strong">{{$bill->product_name}}</td>
                        <td class="left">{{$bill->unit_price}}</td>
                        <td class="right">{{$bill->quantity}}</td>
                        <td class="center">{{$bill->total_price}}</td>

                    </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">

                </div>

                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr>
                            <td class="left">
                                <strong>Subtotal</strong>
                            </td>
                            <td class="right">{{$sell->sub_amount}}</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>Discount</strong>
                            </td>
                            <td class="right">{{$sell->discount}}</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>VAT(in %)</strong>
                            </td>
                            <td class="right">{{$sell->vat}}</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>Total</strong>
                            </td>
                            <td class="right">
                                <strong>{{$sell->total_amount}}</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
</div>
    @endsection
@section('scripts')
<script>
    $( document ).ready(function() {
        document.title="invoice";
        window.print();
    });
</script>
@endsection
