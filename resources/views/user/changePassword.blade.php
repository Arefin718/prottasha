
@extends('layouts.user-layout')
@section('title', 'Change Password')


@section('content')

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">

                        <div class="alert alert-danger">
                            <ul>

                                    <li>{{ $error }}</li>

                            </ul>
                        </div>

                <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Change Password</h4>

                        <form class="register-form outer-top-xs" role="form" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Old Password<span>* </span></label>
                                <input type="password" name="oldPass" required class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">New Password <span>*</span></label>
                                <input type="password" name="newPassword" required class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">New Password <span>*</span></label>
                                <input type="password" name="confirmPassword" required class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
                            </div>


                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Change Password</button>
                        </form>
                        <br>
                        <div class="row links">
                            <a href="/{{Session::get('user.type')}}/dashboard">Dashboard</a>
                        </div>
                    </div>
                    <!-- Sign-in -->

                </div><!-- /.row -->
            </div>
             </div><!-- /.body-content -->

@endsection
