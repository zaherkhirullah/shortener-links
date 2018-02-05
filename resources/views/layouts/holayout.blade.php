<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="keywords" content="Shortener links, short links, link shortener, paid url shortener, make money online, short link and earn money">
    <meta name="description" content="Earn money for each visitor to your shortened links with Shortener links! We pay for each visit to your short link.">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('styles/home/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/home/css/landing.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/home/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/home/css/font.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/home/css/flexslider.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/member/css/font-awesome.min.css') }}">

</head>
<body class="home-page" style="">

    <header id="header" class="header">
        <div class="container">
            <h1 class="logo">
                <a href="/">
                     <i class="ion ion-ios-rose-outline" ></i>
                       Shorter Links
                     <i class="ion ion-ios-rose-outline" ></i>
                </a>
            </h1>
            <nav class="main-nav navbar-right" role="navigation">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"> </span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar-collapse" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active nav-item">
                            <a href="/">  <i class="fa fa-home" aria-hidden="true"></i>  Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/rates">
                              <i class="ion ion-cash" aria-hidden="true"></i>  Payout Rates</a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown">  
                                <i class="fa fa-language" aria-hidden="true"></i> Languages
                                <span class="caret"></span>
                            </a> 

                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">العربية</a></li>
                            </ul>

                        </li>

                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item nav-item-cta last">
                            <a class="btn btn-cta btn-cta-secondary" href="{{ url('user/dashboard') }}"> My Account
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}"> 
                              <i class="ion ion-log-in" aria-hidden="true"></i> 
                          Login</a>
                        </li>
                        <li class="nav-item nav-item-cta last">
                            <a class="btn btn-cta btn-cta-secondary" href="{{ route('register') }}">
                               <i class="ion ion-person-add" aria-hidden="true"></i> 
                                 Sign Up Free
                            </a>
                        </li>
                        @endauth
                        @endif

                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div>
<!--Start Content-->
 @yield('homeContent')
</div>
    <footer class="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="footer-col connect col-md-12">
                        <div class="footer-col-inner press">
                            <ul class="press-list list-inline row">
                                <li class="col-md-3 hidden-sm hidden-xs">
                                </li>
                                <li class="col-md-2 col-sm-4 col-xs-4">
                                    <img alt="" src="{{asset('styles/home/images/tc.png')}}" class="img-responsive">
                                </li>
                                <li class="col-md-2 col-sm-4 col-xs-4">
                                    <img alt="" src="{{asset('styles/home/images/paypal.png')}}" class="img-responsive">
                                </li>
                                <li class="col-md-2 col-sm-4 col-xs-4">
                                    <img alt="" src="{{asset('styles/home/images/payza.png')}}" class="img-responsive">
                                </li>
                                <li class="col-md-3 hidden-sm hidden-xs">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-bar">
            <div class="container">
                <small class="copyright">Copyright @ 2015-2018 <a href="http://Shortenerlinks/">Shortener links</a>
                </small>
                <span class="pull-right">
                    <small class="links">
                        <a href="mailto:info@Shortener links">DMCA</a>
                    </small>
                    <small class="links">
                        <a href="http://Shortenerlinks/terms">Terms</a>
                    </small>
                </span>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    @include('_includes.home.scripts')
    <div id="topcontrol" title="Scroll Back to Top" style="position: fixed; bottom: 5px; right: 5px; opacity: 0; cursor: pointer;">
        <i class="ion ion-chevron-up">
        </i>
    </div>

</body>
</html>