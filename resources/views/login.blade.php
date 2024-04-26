<!DOCTYPE html>
<html lang="en">

<head>


    <title>Login|Voting Paper</title>

    <!-- Vendor css -->
    <link href="{{ asset('public/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/snackalert.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('public/images/icons/vicon5.png') }}" type="image/x-icon" />

    <!-- Slim CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/slim.css') }}">
</head>

<body>

    <div id="snackbardanger"> <strong>Error!</strong> Check Id or Password.
    </div>

    <div class="signin-wrapper" style="margin-top: -10px">

        <div class="signin-box">
            <h2 class="slim-logo"><a href="{{ url('dashboard') }}">Voting Paper<span>.</span></a></h2>
            <h3 class="signin-title-primary">Welcome back!</h3>
            <h2 class="signin-title-secondary">Sign in to continue.</h2>
            <form id="form">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter username" id="email"
                        autocomplete="off" required="">
                </div><!-- form-group -->
                <div class="form-group mg-b-20">
                    <input type="password" class="form-control" placeholder="Enter Password" id="password"
                        autocomplete="off" required="">
                </div><!-- form-group -->
                <button type="submit" class="btn btn-primary btn-block btn-signin">Sign In</button>
            </form>
            {{-- <p class="mg-b-0">Don't have an account? <a href="page-signup.html">Sign Up</a></p> --}}
        </div><!-- signin-box -->

    </div><!-- signin-wrapper -->

    <script src="{{ asset('public/lib/jquery/js/jquery.js') }}"></script>
    <script src="{{ asset('public/lib/popper.js/js/popper.js') }}"></script>
    <script src="{{ asset('public/lib/bootstrap/js/bootstrap.js') }}"></script>

    <script src="{{ asset('public/js/slim.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#loginmsg").hide();
            $(".btn-signin").click(function(e) {
                e.preventDefault();
                var email = $("#email").val();
                var password = $("#password").val();
                $.ajax({
                    type: "get",
                    url: "{{ Route('checklogin') }}",
                    data: {
                        email: email,
                        password: password
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data == 0) {
                            var x = document.getElementById("snackbardanger");
                            x.className = "show";
                            setTimeout(function() {
                                x.className = x.className.replace("show", "");
                            }, 3000);

                        } else {
                            window.location.href = "{{ Route('dashboard') }}";

                        }

                    }
                });
            });



        });
    </script>
</body>

</html>
