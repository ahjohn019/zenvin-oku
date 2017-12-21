<link rel="stylesheet" href="{{asset('css/navbar.css')}}">

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('img/logo.png')}}" alt="{{ config('app.name', 'Laravel') }}">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
        <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Events</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">E-Cart</a></li>
        
        </ul>
            <!-- Right Side Of Navbar -->
          
            
            
            
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
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
                                    Admin Dashborad
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
                    <li><a href="/admin">Login</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                           Register As<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">

                            <li><a href="{{ route('register') }}">Customer</a></li>
                            <li><a href="{{ route('ShowPrivateRegister') }}">Private Seller</a></li>
                            <li><a href="{{ route('ShowOrgRegisterStep1') }}">Organisation Seller</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>