@extends('layouts.inventory-layout')

@section('title', 'Prottasha | Inventory')


@section('content')

    <h1>Product Category List</h1>



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

                                        <th>Product Category</th>

                                        <th>Last Update</th>

                                    </tr>
                                    </thead>
                                    <tbody id="p_body">
                                    <div id="type_list">
                                        @foreach($types as $type)

                                            <tr>
                                                <td class="txt-dark">{{$type->product_type}}</td>
                                                <td class="txt-dark">{{$type->updated_at}}</td>

                                                <td><a href="/product/editproducttype/{{$type->id}}" class="btn btn-primary a-btn-slide-text">
                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                        <span><strong>Edit</strong></span>
                                                    </a></td>





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



@endsection
