<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('public/website/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/website/assets/css/icofont.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/website/assets/css/meanmenu.css') }}">

    <link rel="stylesheet" href="{{ asset('public/website/assets/css/animate.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/website/assets/css/odometer.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/website/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/website/assets/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/website/assets/css/modal-video.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/website/assets/css/nice-select.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/website/assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('public/website/assets/css/responsive.css') }}">

    <link rel="stylesheet" href="{{ asset('public/website/assets/css/theme-dark.css') }}">
    <title>Voting Paper</title>
    <link rel="icon" type="image/png" href="{{ asset('public/website/assets/images/favicon.pn') }}">
</head>
<style>
    .flex-1 {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<style>
    @media only screen and (max-width: 600px) {
        .slider-11 {
            display: none !important;
        }
    }

    @media only screen and (min-width: 600px) {
        .slider-12 {
            display: none !important;
        }
    }
    body.swal2-toast-shown .swal2-container{
        width:35vw !important;
        z-index: 9999 !important;
    }
</style>
<style>
    .font-color-1 {
        color: white;
        text-align: center;
    }
    /* Dropdown Button */
    .dropdown{
    display: inline;

    }
.dropbtn_btn {
    background-color: #fff;
    color: #333;
    padding: 10px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #ddd;}

</style>
@yield('css')
<body>

    <div class="loader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="sub-loader"></div>
            </div>
        </div>
    </div>


    <div class="header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="left">
                        <span> <i class="icofont-ui-call"></i><a
                                href="tel:{{ env('MOBILE') }}">{{ env('MOBILE') }}</a></span>
                        <span> <img src="{{ asset('public/website/assets/images/inbox.png') }}" alt=""
                                style="height:18px;">
                            <a href="mailto:{{ env('EMAIL') }}"> {{ env('EMAIL') }}</a></span>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="right">
                        <ul class="social-icon">
                            <li>
                                <a target="_blank" href="{{ env('FACEBOOK') }}">
                                    <!-- <i class="icofont-facebook"></i> -->
                                    <img src="{{ asset('public/website/assets/images/7.png') }}" alt=""
                                        style="height:20px;">
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="{{ env('INSTAGRAM') }}">
                                    <!-- <i class="icofont-twitter"></i> -->
                                    <img src="{{ asset('public/website/assets/images/4.png') }}" alt=""
                                        style="height:20px;">
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="{{ env('LINKEDIN') }}">
                                    <!-- <i class="icofont-google-plus"></i> -->
                                    <img src="{{ asset('public/website/assets/images/6.png') }}" alt=""
                                        style="height:20px;">
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="navbar-area sticky-top">

        <div class="mobile-nav">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('public/website/assets/images/logo-1.png') }}" alt="Logo">
            </a>
        </div>

        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('public/website/assets/images/logo-111.png') }}" alt="Logo"
                            style="height:80px;">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        @php
                            $redirect_route=null;
                        @endphp
                        @if(\Request::route()->getName()!='home')
                        @php
                            $redirect_route= route('home') ;
                        @endphp
                        @endif
                            <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link dropdown-toggle active">Home</a>

                            </li>
                            <li class="nav-item">
                                <a href="{{$redirect_route}}#about" class="nav-link dropdown-toggle">About us</a>

                            </li>

                            <li class="nav-item">
                                <a href="{{$redirect_route}}#client" class="nav-link" id="#client">Our Clients</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="{{$redirect_route}}#demo">Demo </a>

                            </li> -->
                            <li class="nav-item">
                                <a href="{{$redirect_route}}#work" class="nav-link">How It Work</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{$redirect_route}}#price" class="nav-link dropdown-toggle">Price</a>

                            </li>
                            <li class="nav-item">
                                <a href="{{$redirect_route}}#contact" class="nav-link">Contact</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="" class="nav-link">Help</a>
                            </li> -->
                        </ul>
                        <div class="side-nav">
                            <!-- <a class="left" href="#">Join Us</a> -->
                            @if(Auth::user())
                            <div class="dropdown">
                                <button class="common-btn">
                                    {{Auth::user()->user_name}}
                                    <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="dropdown-content">
                                    <a href="{{ route('log-out') }}">Log Out</a>
                                </div>
                            </div>
                            {{-- <a class="right common-btn" href="javascript:void(none)">
                                {{Auth::user()->user_name}}
                            </a> --}}
                            @else
                            <a class="right common-btn" href="{{ route('sign-in') }}">Sign In</a>
                            @endif
                            <a class="right common-btn" href="{{ route('sign-up') }}">Sign Up</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    @yield('content')



    <div class="go-top">
        <i class="icofont-polygonal"></i>
        <i class="icofont-polygonal"></i>
    </div>



    <script src="{{ asset('public/website/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/website/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('public/website/assets/js/form-validator.min.js') }}"></script>

    <script src="{{ asset('public/website/assets/js/contact-form-script.js') }}"></script>

    <script src="{{ asset('public/website/assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <script src="{{ asset('public/website/assets/js/jquery.meanmenu.js') }}"></script>

    <script src="{{ asset('public/website/assets/js/wow.min.js') }}"></script>

    <script src="{{ asset('public/website/assets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('public/website/assets/js/jquery.appear.min.js') }}"></script>

    <script src="{{ asset('public/website/assets/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('public/website/assets/js/jquery-modal-video.min.js') }}"></script>

    <script src="{{ asset('public/website/assets/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('public/website/assets/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top",
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
       
    </script>
@include('website.alerts')
</body>

</html>
