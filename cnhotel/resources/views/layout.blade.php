<!DOCTYPE html>
<head>
<title>CN HOTEL | Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('public/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('public/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('public/js/raphael-min.js')}}"></script>
<script src="{{asset('public/js/morris.js')}}"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{URL::to('/dashboard')}}" class="logo">
       CN HOTEL
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{asset('public/images/avatar.jpg')}}">
                <span class="username">
                    
                    <?php
                        $name = Session::get('admin_name');
                        if($name){
                            echo $name;
                        }
                    ?>
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>information</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> setting</a></li>
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> log out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Lobby</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-building-o"></i>
                        <span>Room</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/category-room')}}">room type</a></li>
                        <li><a href="{{URL::to('/all-room')}}">List of room</a></li>
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>Customer</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/all-customer')}}">List of customer</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-money"></i>
                        <span>to pay a bill</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/all-book-room')}}">List of room already booked</a></li>
                    </ul>
                </li>
                
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
       @yield('content')

    </section>
 <!-- footer -->
          <div class="footer">
            <div class="wthree-copyright">
              <p style="margin-left:-150px;">© 2021 Admin. All rights reserved | Design by <a target="_blank" href="">Nhựt Bằng</a></p>
            </div>
          </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>

<script src="{{asset('public/js/bootstrap.js')}}"></script>
<script src="{{asset('public/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/js/scripts.js')}}"></script>
<script src="{{asset('public/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/js/jquery.scrollTo.js')}}"></script>


</body>
</html>
