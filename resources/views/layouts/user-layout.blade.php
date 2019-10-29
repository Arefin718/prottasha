<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>{{Session::get('user.type')}}</title>
    <meta name="description" content="Admin Dashboard" />

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <link rel="stylesheet" type="text/css"/ href="{{asset('vendors/bower_components/jquery.steps/demo/css/jquery.steps.css')}}" >
    <link href="{{asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Morris Charts CSS -->

    <link href="{{asset('vendors/bower_components/morris.js/morris.css')}}" rel="stylesheet" type="text/css"/>


    <!-- Data table CSS -->
    <link href="{{asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css')}}" rel="stylesheet" type="text/css"/>


    <!-- bootstrap-select CSS -->
    <link href="{{asset('vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css"/>


    <!-- Bootstrap Switches CSS -->
    <link href="{{asset('vendors/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css"/>


    <!-- switchery CSS -->
    <link href="{{asset('vendors/bower_components/switchery/dist/switchery.min.css')}}" rel="stylesheet" type="text/css"/>


    <!-- Custom CSS -->
     <link href="{{ URL::asset('assets/css/hr.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('dist/css/style.css')}}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">



    @yield('styles')


</head>

<body>


<div class="page-wrapper">
        <div class="container-fluid pt-25">
            <div class="row"><a href="/{{Session::get('user.type')}}/dashboard">Back</a></div>
            @yield('content')

        </div>



<!-- /#wrapper -->

<!-- JavaScript -->

<!-- jQuery -->
<script src="{{asset('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>


<!-- Data table JavaScript -->
<script src="{{asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>


<!-- Slimscroll JavaScript -->
<script src="{{asset('dist/js/jquery.slimscroll.js')}}"></script>


<!-- simpleWeather JavaScript -->
<script src="{{asset('vendors/bower_components/moment/min/moment.min.js')}}"></script>

<script src="{{asset('vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js')}}"></script>

<script src="{{asset('dist/js/simpleweather-data.js')}}"></script>


<!-- Progressbar Animation JavaScript -->
<script src="{{asset('vendors/bower_components/waypoints/lib/jquery.waypoints.min.js')}}"></script>

<script src="{{asset('vendors/bower_components/jquery.counterup/jquery.counterup.min.js')}}"></script>


<!-- Fancy Dropdown JS -->
<script src="{{asset('dist/js/dropdown-bootstrap-extended.js')}}"></script>


<!-- Sparkline JavaScript -->
<script src="{{asset('vendors/jquery.sparkline/dist/jquery.sparkline.min.js')}}"></script>


<!-- Owl JavaScript -->
<script src="{{asset('vendors/bower_components/owl.carousel/dist/owl.carousel.min.js')}}"></script>


<!-- ChartJS JavaScript -->
<script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>


<!-- EasyPieChart JavaScript -->
<script src="{{asset('vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{asset('vendors/bower_components/raphael/raphael.min.js')}}"></script>

<script src="{{asset('vendors/bower_components/morris.js/morris.min.js')}}"></script>

<script src="{{asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>


<!-- Switchery JavaScript -->
<script src="{{asset('vendors/bower_components/switchery/dist/switchery.min.js')}}"></script>


<!-- Bootstrap Select JavaScript -->
<script src="{{asset('vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>


<!-- Init JavaScript -->
<script src="{{asset('dist/js/init.js')}}"></script>

<script src="{{asset('dist/js/ecommerce-data.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('dist/js/hr.js') }}"></script>
<script src="{{asset('dist/js/product-detail-data.js')}}"></script>
<script src="{{asset('dist/js/starrr.js')}}"></script>
<script src="{{asset('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{asset('vendors/bower_components/jquery.steps/build/jquery.steps.min.js')}}"></script>


@yield('scripts')

</body>

</html>
