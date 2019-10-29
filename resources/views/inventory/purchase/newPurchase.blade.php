@extends('layouts.inventory-layout')

@section('title', 'Prottasha | Inventory')


@section('content')



    <div class="container-fluid" style="background-color: seashell">
        <div class="form-wrapper">


            <!-- BEGIN REGISTER FORM -->
            <form class="form-content" id="register-form" action="#" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="form-title text-center">Add New Purchase</h2>
                    </div>
                </div>
<input type="text" name="product_table_id" id="product_table_id" hidden value="{{$product->id}}">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="p_name">Product ID<span>* </span></label>
                        <input readonly  required  type="text" name="product_id" id="product_id" value="{{$product->product_id}}"   placeholder="Product ID" required >
                        <label style="color: #fff;">{{$errors->first('product_id')}}</label>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="p_name">Product Name<span>* </span></label>
                        <input readonly required  type="text" name="product_name" id="product_name" value="{{$product->product_name}}"    placeholder="Product Name" required title="It must contain only letters and a length of minimum 2 characters">
                        <label style="color: #fff;">{{$errors->first('product_name')}}</label>
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-12">
                        <label for="p_quantity">Add Quantity</label>
                        <input required  type="number" name="p_quantity" id="p_quantity"   placeholder="Product Quantity" min="0">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <label for="buying_price">Buying Price</label>
                        <input required  type="number" name="buying_price" id="buying_price"   placeholder="Buying Price" min="0">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <label for="selling_price">Selling Price</label>
                        <input required  type="number" name="selling_price" id="selling_price"   placeholder="Selling Price" min="0">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <button name="register-submit" type="submit" class="button green">New Purchase</button>
                    </div>
                </div>
            </form><!-- END OF REGISTER FORM -->
        </div><!-- END OF WRAPPER DIV -->

    </div>

@endsection




