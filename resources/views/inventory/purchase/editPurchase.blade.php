@extends('layouts.inventory-layout')

@section('title', 'Prottasha | Inventory')


@section('content')



    <div class="container-fluid" style="background-color: seashell">
        <div class="form-wrapper">


            <!-- BEGIN REGISTER FORM -->
            <form class="form-content" id="register-form" action="#" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
@foreach($purchases as $purchase)
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="form-title text-center">Update Purchase</h2>
                    </div>
                </div>
                <input type="text" name="product_table_id" id="product_table_id" hidden value="{{$purchase->product_id}}">
                <input type="text" name="purchase_id" id="product_table_id" hidden value="{{$purchase->id}}">

                <div class="row">
                    <div class="col-sm-12">
                        <label for="p_name">Product ID<span>* </span></label>
                        <input readonly  required  type="text" name="product_id" id="product_id" value="{{$purchase->p_id}}"   placeholder="Product ID" required >
                        <label style="color: #fff;">{{$errors->first('product_id')}}</label>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="p_name">Product Name<span>* </span></label>
                        <input readonly required  type="text" name="product_name" id="product_name" value="{{$purchase->product_name}}"    placeholder="Product Name" required title="It must contain only letters and a length of minimum 2 characters">
                        <label style="color: #fff;">{{$errors->first('product_name')}}</label>
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-12">
                        <label for="p_quantity">Add Quantity</label>
                        <input required  type="number" name="p_quantity" id="p_quantity"  value="{{$purchase->added_quantity}}"  placeholder="Product Quantity" min="0">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <label for="buying_price">Buying Price</label>
                        <input required  type="number" name="buying_price" id="buying_price" value="{{$purchase->buying_price}}"  placeholder="Buying Price" min="0">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <label for="selling_price">Selling Price</label>
                        <input required  type="number" name="selling_price" id="selling_price" value="{{$purchase->selling_price}}"  placeholder="Selling Price" min="0">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <button name="register-submit" type="submit" class="button green">Update Purchase</button>
                    </div>
                </div>
    @endforeach
            </form><!-- END OF REGISTER FORM -->
        </div><!-- END OF WRAPPER DIV -->

    </div>

@endsection




