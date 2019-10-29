

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
       <link rel="stylesheet" type="text/css" href="{{ url('assests/css/home.css') }}"">
	<link rel="stylesheet" href="{{ url('assests/css/blue.css') }}">
    <link rel="stylesheet" href="{{ url('assests/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('assests/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ url('assests/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ url('assests/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ url('assests/css/bootstrap-select.min.css') }}">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Styles -->

    </head>
    <body>
                <div class="content">
                <div class="container full-height">	

                  <div class="title m-b-md">
                    Prottasha
                </div>

			
	<div class="row ">
		 <!-- Sign-in -->

                    <div class="col-md-6 col-sm-6 sign-in ">
                        <h4 class="">Sign in</h4>
                        

                        <form class="register-form outer-top-xs" role="form" method="post">
                         @csrf
                            <h4 style="color: #FF0000">{{$message}}</h4>
                            <div class="form-group m-b-md centered">
                                <label class="info-title" for="exampleInputEmail1">Email or Contact Number <span></span></label>
                                <input type="text" name="email" required class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span></span></label>
                                <input type="password" name="password" required class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                          
                        </form>
                    </div>
                    <!-- Sign-in -->
		
	</div>
</div>
       
  </div>

    </body>
</html>
