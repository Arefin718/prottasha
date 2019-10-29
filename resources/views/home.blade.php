<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Prottasha</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
       <link rel="stylesheet" type="text/css" href="{{ url('assests/css/home.css') }}"">
        <!-- Styles -->
        @yield('styles')

    </head>
    <body>
        <div class="flex-center position-ref full-height">
          

            <div class="content">
                <div class="title m-b-md">
                    Prottasha
                </div>
{{csrf_field()}}
                <div class="links">
                    <a href="{{Session::get('user.type')}}/dashboard">Dashboard</a>
                    <a href="/member">Member</a>
                    <a href="/inventory">Inventory</a>
                    <a href="/shop">Shop</a>
                  
                </div>
            </div>
        </div>
    </body>
</html>
