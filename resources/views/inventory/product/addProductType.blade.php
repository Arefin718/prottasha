@extends('layouts.inventory-layout')
@section('content')



    <div class="container-fluid" style="background-color: seashell">
        <div class="form-wrapper">


            <!-- BEGIN REGISTER FORM -->
            <form class="form-content" id="register-form" action="#" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="form-title text-center">Add Product Category</h2>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <label for="p_name">Product Type<span>* </span></label>
                        <input required  type="text" name="product_type" id="product_type"   placeholder="Product Type" required title="It must contain only letters and a length of minimum 2 characters">
                        <label style="color: #fff;">{{$errors->first('product_type')}}</label>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <button name="register-submit" type="submit" class="button green">Add Product Category</button>
                    </div>
                </div>
            </form><!-- END OF REGISTER FORM -->
        </div><!-- END OF WRAPPER DIV -->

    </div>


@endsection
