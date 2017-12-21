<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.5.1, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.5.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta name="description" content="">
  <title>E-OKU</title>

  <link rel="stylesheet" href="{{URL::to('assets/web/assets/mobirise-icons/mobirise-icons.css')}}">
  <link rel="stylesheet" href="{{URL::to('assets/tether/tether.min.css')}}">
  <link rel="stylesheet" href="{{URL::to('assets/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{URL::to('assets/bootstrap/css/bootstrap-grid.min.css')}}">
  <link rel="stylesheet" href="{{URL::to('assets/bootstrap/css/bootstrap-reboot.min.css')}}">
  <link rel="stylesheet" href="{{URL::to('assets/socicon/css/styles.css')}}">
  <link rel="stylesheet" href="{{URL::to('assets/dropdown/css/style.css')}}">
  <link rel="stylesheet" href="{{URL::to('assets/theme/css/style.css')}}">
  <link rel="stylesheet" href="{{URL::to('assets/mobirise/css/mbr-additional.css')}}" type="text/css">
  <link rel="apple-touch-icon" href="{{URL::to('apple-touch-icon.png')}}">

        <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}">
        <style>

            body {
                padding-top: 50px;
                padding-bottom: 20px;

            }

            footer{
              position: fixed;
              left: 0;
              bottom: 0;
              width: 100%;
              background-color: grey;
              color: white;
              text-align: left;
              padding:2px;
            }

            h1{
              font-family: 'Times New Roman', Times, serif;

            }
            h2{
              font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
              text-align: left;
            }
            h3{
              text-align: center;
            }


        </style>
        <link rel="stylesheet" href="{{URL::to('css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/carousel.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/responsive.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/main.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/thumbnail.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/clearfix.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/sidemenu.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/select2.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/carouselheadline.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/select2.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href={{ asset('css/font-awesome.css') }}>
        <script src="{{URL::to('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>



</head>
<body>

@if(session('register-success'))
    <div class="alert alert-success">
        <strong>{{ Session::get('register-success') }}</strong>
    </div>
    @endif
    @if(session('payment-success'))
    <div class="alert alert-success">
        <strong>{{ Session::get('payment-success') }}</strong>
    </div>
    @endif
    @if(session('package-success'))
     <div class="alert alert-success">
        <strong>{{ Session::get('package-success') }}</strong>
    </div>
    @endif


    <section class="menu cid-qCyO1prm6N" once="menu" id="menu1-5" data-rv-view="64">

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="{{url('/')}}">
                         <img src="{{URL::to('assets/images/2-972x1023.jpg')}}" alt="{{url('/')}}" title="E-OKU" media-simple="true" style="height: 3.8rem;" image="opacity: 0.5, filter: alpha(opacity=50);">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-5" href="{{url('/')}}">E-OKU</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
            <li class="nav-item">
                    <a class="nav-link link text-white display-5" href="{{url('/')}}">
                    <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        Home</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link link text-white dropdown-toggle display-5" data-toggle="dropdown-submenu" aria-expanded="false"><span class="mbri-features mbr-iconfont mbr-iconfont-btn"></span>
                        Categories</a>
                        <div class="dropdown-menu">
                        <a class="text-white dropdown-item display-5" href="{{route('front.orgmarket')}}" aria-expanded="true">Organizations</a>
                        <a class="text-white dropdown-item display-5" href="{{route('product.index')}}" aria-expanded="true">Products</a>
                        <a class="text-white dropdown-item display-5" href="{{route('services.index')}}" aria-expanded="true">Service</a>
                          <a class="text-white dropdown-item display-5" href="{{route('events.index')}}" aria-expanded="true">Event</a>
                        </div>
            </li>
            <li class="nav-item">
                        <a class="nav-link link text-white display-5" href="{{url('/ContactUs')}}"><span class="mbri-contact-form mbr-iconfont mbr-iconfont-btn"></span>
                        Contact Us</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link link text-white display-5" href="{{url('/AboutUs')}}">
                    <span class="mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                    About Us</a>
            </li>
            <li class="nav-item dropdown">
                    @if (Auth::check())
                    <a class="nav-link link text-white dropdown-toggle display-4" data-toggle="dropdown-submenu" href="{{url('/admin')}}" aria-expanded="false"><span class="mbri-login mbr-iconfont mbr-iconfont-btn"></span>
                    {{Auth::user()->username}}</a>
                    <div class="dropdown-menu">
                    @if(Auth::user()->user_type=='Customer')
                    <a class="text-white dropdown-item display-4" href="/profiles/{{Auth::user()->username}}" aria-expanded="false">View Profile</a>
                    @elseif(Auth::user()->user_type=='PrivateSeller')
                    <a class="text-white dropdown-item display-4" href="/private_profiles/{{Auth::user()->username}}" aria-expanded="false">View Profile</a>
                    @elseif(Auth::user()->user_type=='OrgSeller')
                    <a class="text-white dropdown-item display-4" href="/org_profiles/{{Auth::user()->username}}" aria-expanded="false">View Profile</a>
                    @else
                    <a class="text-white dropdown-item display-4" href="/admin" aria-expanded="false">Admin Dashboard</a>
                    @endif

                    <a class="text-white dropdown-item display-4" href="/changepassword" aria-expanded="false">Change Password</a>
                    <a class="text-white dropdown-item display-4" href="{{route('logout')}}" aria-expanded="false">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                    </form>
                    </div>
             </li>
                    @else
                    <li class="nav-item">
                    <a class="nav-link link text-white display-5" href="{{url('/admin')}}"><span class="mbri-login mbr-iconfont mbr-iconfont-btn"></span>
                    Login</a>
                    </li>
            <li class="nav-item dropdown">
                    <a class="nav-link link text-white dropdown-toggle display-5" href="admin/login" data-toggle="dropdown-submenu" aria-expanded="true"><span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>
                        Register As</a>
                <div class="dropdown-menu">
                        <a class="text-white dropdown-item display-5" aria-expanded="true"></a>
                        <a class="text-white dropdown-item display-5" href="{{ route('register') }}" aria-expanded="false">Customer</a>
                        <a class="text-white dropdown-item display-5" href="{{ route('ShowPrivateRegister') }}" aria-expanded="false">Private Seller</a>
                        <a class="text-white dropdown-item display-5" href="{{ route('ShowOrgRegisterStep1') }}" aria-expanded="false">Organization Seller</a>
                </div>
                </li>
                @endif
            </ul>

        </div>
    </nav>
</section>

@yield('content')

<!--custom footer-->
<section class="cid-qCxVawdYFO" id="footer1-1" data-rv-view="61">
    <div class="container" >
        <div class="media-container-row content text-white">
            <div class="col-12 col-md-2">
                <div class="media-wrap">
                    <a href="{{url('/')}}">
                        <img src="{{URL::to('assets/images/e-oku-500x500.png')}}" alt="{{url('/')}}" title="E-OKU" media-simple="true">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-2 mbr-fonts-style display-6">
                <h5 class="pb-3">TARUC Address</h5>
                <p class="mbr-text">TARUC Kuala Lumpur<br>(Main Campus) &nbsp;<br>Jalan Genting Kelang, Setapak,
<br>53300 Kuala Lumpur,
<br>P.O. Box 10979, 50932 Kuala Lumpur, Malaysia.</p>
            </div>
            <div class="col-12 col-md-2 mbr-fonts-style display-6">
                <h5 class="pb-3">Contacts</h5>
                <p class="mbr-text">Email: eoku123@gmail.com.my<br>General Line: +(6)03-12345678<br>Direct Line: +(6)03-87654321<br>Fax: +(6)03-45678910</p>
            </div>
            <div class="col-12 col-md-2 mbr-fonts-style display-6">
                <h5 class="pb-3">Links</h5>
                <p class="mbr-text">
                    <a class="text-primary" href="https://twitter.com/">Twitter</a>
                    <br><a class="text-primary" href="https://facebook.com">Facebook</a>
                    <br><a class="text-primary" href="https://www.google.com">Google</a>
                    <br><a class="text-primary" href="https://www.youtube.com">YouTube</a>
                </p>


            </div>
            <div class="col-12 col-md-5 mbr-fonts-style display-6">
                <h5 class="pb-3">Payment Method</h5>
                <p class="mbr-text">
                <img src="/image/ipay88payment-icon.jpg" class="img-responsive">
                <p class="mbr-text">We accepted hand-in cash also</p>
                </p>


            </div>

        </div>


        <div class="footer-lower">
            <div class="media-container-row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>

            <div class="media-container-row mbr-white">
                <div class="col-sm-6 copyright">
                    <p class="mbr-text mbr-fonts-style display-6">© Copyright 2017 E-OKU(TARC College) - All Rights Reserved</p>
                </div>

                <div class="col-md-6">
                    <div class="social-list align-right">
                        <div class="soc-item">
                            <a href="https://twitter.com" target="_blank">
                                <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.facebook.com" target="_blank">
                                <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.google.com" target="_blank">
                                <span class="mbr-iconfont mbr-iconfont-social socicon-googleplus socicon" media-simple="true"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.youtube.com" target="_blank">
                                <span class="mbr-iconfont mbr-iconfont-social socicon-youtube socicon" media-simple="true"></span>
                            </a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        <script src="{{URL::to('assets/web/assets/jquery/jquery.min.js')}}"></script>
        <script src="{{URL::to('assets/popper/popper.min.js')}}"></script>
        <script src="{{URL::to('assets/tether/tether.min.js')}}"></script>
        <script src="{{URL::to('assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::to('assets/smoothscroll/smooth-scroll.js')}}"></script>
        <script src="{{URL::to('assets/parallax/jarallax.min.js')}}"></script>
        <script src="{{URL::to('assets/mbr-testimonials-slider/mbr-testimonials-slider.js')}}"></script>
        <script src="{{URL::to('assets/mbr-clients-slider/mbr-clients-slider.js')}}"></script>
        <script src="{{URL::to('assets/dropdown/js/script.min.js')}}"></script>
        <script src="{{URL::to('assets/touchswipe/jquery.touch-swipe.min.js')}}"></script>
        <script src="{{URL::to('assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js')}}"></script>
        <script src="{{URL::to('assets/theme/js/script.js')}}"></script>
        <script type ="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="https://use.fontawesome.com/0379815565.js"></script>
        <script src="{{URL::to('js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{URL::to('js/socialshare.js')}}"></script>
        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
        <script src="{{URL::to('js/owl.carousel.js')}}"></script>
        <script src="{{URL::to('js/owl.carousel.min.js')}}"></script>
        <script src="{{URL::to('js/owlslide.js')}}"></script>
        <!-- Private seller register form script -->
        <script>
        $( document ).ready(function() {
        $('input[name=hasDisability]').click(function () {
            if (this.id == "disabled_yes") {
                document.getElementById('disability_block').style.display = 'block';
                document.getElementById('nOku_block').style.display = 'block';
            } else {
                document.getElementById('disability_block').style.display = 'none';
                document.getElementById('nOku_block').style.display = 'none';
            }
        });
        });
        </script>

        <!--date script-->
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script>
         $(function() {
            $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#datepicker3" ).datepicker({ dateFormat: 'yy-mm-dd' });
         });
        </script>


        <script src="{{URL::to('js/main.js')}}"></script>
        <script src="{{URL::to('js/modal.js')}}"></script>
        <script src="{{URL::to('js/select2.js')}}"></script>
        <script src="{{URL::to('js/select2.min.js')}}"></script>
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>


</body>
</html>
