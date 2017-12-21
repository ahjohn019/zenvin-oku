<!doctype html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
            .prodheading{
                text-align:center;
            }

            .firstheading{
                text-align: left;
            }

            img.center {
                display: block;
                margin: 0 auto;
            }

            .carousel-inner img {
                width: 100%; /* Set width to 100% */
                margin: auto;
                min-height:200px;
            }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
            @media (max-width: 600px) {
            .carousel-caption {
                display: none;
                }
                }
            }

             #owl-demo .item{
                background: #42bdc2;
                padding: 30px 0px;
                margin: 10px;
                color: #FFF;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
                text-align: center;
            }


            #hotselling{
                background-color:#F08080;
            }

            .menuback{
                background-color:#ececec;
            }

            .container-content{
                background-color:white;
                margin: auto;
                border: 1px solid grey;
            }



            .flex-container {
                display: flex;
                flex-wrap: nowrap;
                background-color:  #f1f1f1;
                width: 1180px;
                height: 340px;
            }


            .flex-container>div:nth-of-type(1)  {
                background-color: #f1f1f1;
                margin: 5px;
                text-align: center;
                line-height: 75px;
                font-size: 30px;
                flex-grow: 2;
            }

            .flex-container>div{
                background-color: #f1f1f1;
                margin: 5px;
                text-align: center;
                line-height: 75px;
                font-size: 30px;
                flex-grow: 1;
            }

            div.ex2 {
                width:1000px;
                height:250px;
                margin: auto;
            }

        </style>
        <link rel="stylesheet" href="{{URL::to('css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/carousel.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/main.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/thumbnail.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/clearfix.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/imgmodal.css')}}">
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
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
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

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{url('/')}}">E-OKU</a>

        </div>



        <div id="navbar" class="navbar-collapse collapse">

 <ul class="nav navbar-nav">
        <!--<li class="active"><a href="#">Categories<span class="sr-only">(current)</span></a></li>-->
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{route('front.orgmarket')}}">Organization</a></li>
          <li><a href="{{route('product.index')}}">Product</a></li>
          <li><a href="{{route('services.index')}}">Service</a></li>
          <li><a href="{{route('events.index')}}">Event</a></li>
          <li><a href="{{route('front.artist')}}">Artist</a></li>
        </ul>
      </li>

        <li><a href="{{ url('/AboutUs') }}">About Us</a></li>
        <li><a href="{{ url('/ContactUs') }}"><i class="fa fa-commenting-o" aria-hidden="true"></i> Contact Us </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li>
        @if (Auth::check())
        @if (Auth::user()->user_type=='Customer')
          <a href="{{route('cartItem.show',Auth::user()->id)}}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                <span class="badge">{{Session::has('cart') ? Session::get('cart')->qty:''}}</span>
          </a>
          @endif
          @endif
      </li>
      <!--
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> User Account<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
         @if (Auth::guard('web')->check())
            <li><a href="{{route('user.profile')}}"><i class="fa fa-user" aria-hidden="true"></i> {{Auth::check() ? Auth::user()->name : 'Account'}}</a></li>
            <li class="divider"></li>
            <li><a href="{{route('user.ulogout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
            @else
            <li><a href="{{route('user.signup')}}"><i class="fa fa-user" aria-hidden="true"></i> SignUp</a></li>
            <li class="divider"></li>
            <li><a href="{{route('user.signin')}}"><i class="fa fa-user" aria-hidden="true"></i> SignIn</a></li>
          @endif
          </ul>
        </li>-->

<!-- Highlight admin on master navigation bar
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Admin <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          @if (Auth::guard('admin')->check())
            <li><a href="{{route('admin.login')}}"><i class="fa fa-user" aria-hidden="true"></i> {{Auth::check() ? Auth::user()->name : 'Account'}}</a></li>
            <li class="divider"></li>
            <li><a href="{{route('admin.alogout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
            @else
            <li><a href="{{route('admin.login')}}"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>
          @endif
          </ul>
        </li> -->

<!-- Authentication Links (membership)-->
@if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{Auth::user()->username}}<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">

                            @if (Auth::user()->user_type=='Customer')
                            <li>
                                <a href="/profiles/{{Auth::user()->username}}">
                                    View Profile
                                </a>
                            </li>
                            @elseif(Auth::user()->user_type=='PrivateSeller')
                            <li>
                                <a href="/private_profiles/{{Auth::user()->username}}">
                                    View Profile
                                </a>
                            </li>
                            @elseif(Auth::user()->user_type=='OrgSeller')
                            <li>
                                <a href="/org_profiles/{{Auth::user()->username}}">
                                    View Profile
                                </a>
                            </li>
                            @else
                            <li>
                                <a href="/admin">
                                    Admin Dashboard
                                </a>
                            </li>
                            @endif

                            <li>
                                <a href="/changepassword">
                                    Change Password
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="/admin"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i> Register As<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">

                            <li><a href="{{ route('register') }}">Customer</a></li>
                            <li><a href="{{ route('ShowPrivateRegister') }}">Private Seller</a></li>
                            <li><a href="{{ route('ShowOrgRegisterStep1') }}">Organisation Seller</a></li>
                        </ul>
                    </li>
                @endif

      </ul>


        </div><!--/.navbar-collapse -->
      </div>
    </nav>



      @yield('content')



    </div> <!-- /container -->
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
        $(document).ready(function(){
        $('input[id=disabled_no]').prop('checked',false);
        $('input[id=disabled_yes]').prop('checked',true);
        })
        $( document ).ready(function() {
        $('input[name=hasDisability]').click(function () {
            if (this.id == "disabled_yes") {
                document.getElementById('disability_block').style.display = 'block';
                document.getElementById('nOku_block').style.display = 'block';
                document.getElementById('doc_desc').innerHTML = "Please upload copy of your OKU card/certificate document";
            } else {
                document.getElementById('disability_block').style.display = 'none';
                document.getElementById('nOku_block').style.display = 'none';
                document.getElementById('doc_desc').innerHTML = "Please upload copy of your IC/driving license";
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
