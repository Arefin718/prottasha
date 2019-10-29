@extends('layouts.member-layout')


@section('title', 'Prottasha | Member')

<link rel="stylesheet" href="{{ URL::asset('assets/css/normalize.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/form-styles.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/datepicker.css') }}">

@section('content')


    <div class="container-fluid" style="background-color: seashell">
        <div class="form-wrapper">

            <label style="color: #FF0000;">{{$errors->first('member_id')}}</label>
            <label style="color: #FF0000;">{{$errors->first('name')}}</label>

        <!-- BEGIN REGISTER FORM -->
            <form class="form-content" id="register-form" action="#" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="form-title text-center">Add New Member</h2>
                    </div>
                </div>

                <p class="section"><span class="number">1</span><span class="text">Basic information</span></p>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="memberid">Member ID<span>* </span></label>
                        <input required  type="text" name="member_id" id="member_id"  placeholder="Please enter member id" >
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <label for="name">Member Name<span>* </span></label>
                        <input required  type="text" name="name" id="name" pattern="[a-zA-Z ]{2,}"  placeholder="Please enter member full name" required title="It must contain only letters and a length of minimum 2 characters">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <label for="contact">Member Contact<span></span></label>
                        <input   type="text" name="contact" id="name"   placeholder="Please enter member contact" >

                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <label for="caddress">Current Address<span> </span></label>
                        <textarea class="form-control" name="caddress" rows="4"  id="caddress" placeholder="Please enter member current address"></textarea>

                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="paddress">Parmanent Address<span> </span></label>
                        <textarea class="form-control" name="paddress" rows="4"  id="paddress"  placeholder="Please enter member current address"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <label for="Reg date">Registration Date<span>* </span></label>

                        <div class="input-group date" data-provide="datepicker">
                            <input id="reg_date" name="reg_date" type="text" class="form-control"  placeholder="Please enter registration date">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="Book Issue">Book Issue Date<span>* </span></label>

                        <div class="input-group date" data-provide="datepicker">
                            <input id="bookissue_date" name="bookissue_date" type="text" class="form-control" placeholder="Please enter book issue date">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <label for="reg fee">Registration Fee<span> </span></label>
                        <input id="registration_fee" name="registration_fee" type="number" value="0" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <button name="register-submit" type="submit" class="button green">Add Member</button>
                    </div>
                </div>
            </form><!-- END OF REGISTER FORM -->
        </div><!-- END OF WRAPPER DIV -->

    </div>


@endsection


@section('scripts')
    <script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $.fn.datepicker.defaults.format = "yyyy-mm-dd";

        $('.reg_date').datepicker({


        });
        });

    </script>
@endsection
