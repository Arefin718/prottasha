<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin</title>
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
    <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery-ui.css') }}">



    @yield('styles')


</head>

<body>
<!-- Preloader -->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<!-- /Preloader -->
<div class="wrapper theme-3-active pimary-color-green">
    <!-- Top Menu Items -->

    <nav class="navbar navbar-inverse navbar-fixed-top">

        <div class="mobile-only-brand pull-left">
            <div class="nav-header pull-left">
                <div class="logo-wrap">
                    <a href="{{route('home')}}">
                        <img class="brand-img" src="{{asset('dist/img/logo.png')}}" alt="brand"/>
                        <span class="brand-text">Prottasha</span>
                    </a>
                </div>
            </div>
            <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
            <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
            <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>

        </div>

        <div class="mobile-only-nav pull-left col-md-offset-2">
            <h3>Dashboard</h3> <p class=" text-info" id="date">Date</p>

        </div>
        <div class="pull-left col-md-offset-2">
            {{--<div class="col-lg-2 col-md-2 col-sm-8">
                <ul class="notifications">
                    <li class="dropdown">



                        <a href="#" data-toggle="dropdown">
                            <i class="fa fa-users"></i>
                            <span class="badge badge-color1 header-badge" id="newSub"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-friend-requests" id="subscription-info">

                            <li>
                                <a href="#" class="all_notifications">All Notifications</a>
                            </li>

                        </ul>





                    </li>


                </ul>
            </div>--}}

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle 	glyphicon glyphicon-bell" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> (<b>2</b>)</a>
                    <ul class="dropdown-menu notify-drop">


                        <!-- notify content -->

                            <li>
                                <a href="#">Admin 1 added new product</a>
                            </li>
                        <hr>
                            <li>
                                <a href="#">Admin 1 added new member</a>
                            </li>




                        <hr>
                        <div class="notify-drop-footer text-center">
                            <a href="#"><i class="fa fa-eye"></i> All Notification</a>
                        </div>
                    </ul>
                </li>
            </ul>

        </div>

        <div id="mobile_only_nav" class="mobile-only-nav pull-right">
            <ul class="nav navbar-right top-nav pull-right">


                <li class="dropdown auth-drp">

                    <a href="#" class="dropdown-toggle pr-0 glyphicon glyphicon-picture" data-toggle="dropdown">{{Session::get('user.name')}}</a>

                    <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <li>
                            <a href="{{route('user.profile')}}"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
                        </li>
                        <li>
                            <a href="{{route('user.changePassword')}}"><i class="zmdi zmdi-account"></i><span>Change Password</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="zmdi zmdi-account"></i><span>My Activities</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('logout')}}"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>



    </nav>
    <!-- /Top Menu Items -->

    <!-- Left Sidebar Menu -->
    <div class="fixed-sidebar-left">
        <ul class="nav navbar-nav side-nav nicescroll-bar">

<!-- Admin list-->
<li class="navigation-header">
                <span>Admin</span>
                <i class="zmdi zmdi-more"></i>
            </li>


            <li>
                <a href="#" data-toggle="collapse" data-target="#maps_dr">
                    <div class="pull-left"><i class="zmdi zmdi-map mr-20"></i><span
                                class="right-nav-text">Admin</span></div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="maps_dr" class="collapse collapse-level-1">
                    <li>
                        <a href="{{route('admin.adminList')}}">Admin List</a>
                    </li>
                    <li>
                        <a href="{{route('admin.addAdmin')}}">Add Admin</a>
                    </li>
                </ul>
            </li>


<!-- Admin list end-->




            <li>
                <a href="{{route('admin.loginHistory')}}" ><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Login History</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
            </li>
            <li>
                <a href="{{route('user.myLoginHistory')}}" ><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">My Login History</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#maps_dr2">
                    <div class="pull-left"><i class="zmdi zmdi-map mr-20"></i><span
                                class="right-nav-text">Employee</span></div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="maps_dr2" class="collapse collapse-level-1">
                    <li>
                        <a href="{{route('admin.addEmployee')}}">Add Employee</a>
                    </li>
                    <li>
                        <a href="{{route('admin.employeeList')}}">Employee List</a>
                    </li>
                    <li>
                        <a href="{{route('admin.deletedemployeelist')}}">Deleted Employee List</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/shop/selllist">
                    <div class="pull-left"><i class="zmdi zmdi-map mr-20"></i><span
                            class="right-nav-text">Sell List</span></div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>

            </li>

            <li>
                <hr class="light-grey-hr mb-10"/></li>
            <li class="navigation-header">
                <span>Report</span>
                <i class="zmdi zmdi-more"></i>
            </li>



            <li>
                <a href="/report/sells"><div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span class="right-nav-text">Sale Report</span></div><div class="clearfix"></div></a>
            </li>



            <li>
                <a href="#"><div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span class="right-nav-text">Purchase Report</span></div><div class="clearfix"></div></a>
            </li>
            <li>
                <a href="#"><div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span class="right-nav-text">Member Report</span></div><div class="clearfix"></div></a>
            </li>


           
        </ul>
    </div>
    <!-- /Left Sidebar Menu -->

    <!-- Right Sidebar Menu -->

    <!-- /Right Sidebar Menu -->



    <!-- Right Sidebar Backdrop -->
    <div class="right-sidebar-backdrop"></div>
    <!-- /Right Sidebar Backdrop -->

    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid pt-25">

            @yield('content')

        </div>

        <!-- Footer -->
        <footer class="footer container-fluid pl-30 pr-30">
            <div class="row">
                <div class="col-sm-12">
                    <p>2018 &copy; Prottasha</p>
                </div>
            </div>
        </footer>
        <!-- /Footer -->

    </div>
    <!-- /Main Content -->

<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="form-content" id="register-form" action="imagechange" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
               <div class="row">
                    <div class="pcontainer">

                    <img class="pimage profile" id="profile" src="" alt="" />

                    {{--<!-- {{url($employee->image)}} -->--}}
                <img class="pimage profile" id="profile" src="" alt="" />

                
                    </div>
                </div>
               <div class="row">
                    <input  type="file" name="image" id="image">
                
               </div>
            
                
                <div class="row">
                    <div class="col-sm-12">
                        <button name="image-submit" type="submit" class="button green">Update Image</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
    

</div>
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

<script src="{{ URL::asset('assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.canvasjs.min.js') }}"></script>

<script type="text/javascript">

function formatDate(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm;
  return date.getMonth()+1 + "/" + date.getDate() + "/" + date.getFullYear() + "  " + strTime;
}
var d = new Date();
var e = formatDate(d);
    $(document).ready(function() {
        
       
        $("#date").html(e);
        $(".notificationicon").click(function () {
            $(this).toggleClass("open");
            $("#notificationMenu").toggleClass("open");
        });
        $(function () {
            $('[data-tooltip="tooltip"]').tooltip()
        });
    });
</script>

@yield('scripts')

</body>

</html>


