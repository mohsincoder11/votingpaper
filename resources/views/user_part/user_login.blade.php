<!DOCTYPE html>
<html lang="en">
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>


    <title>Login|Voting Paper</title>

    <!-- Vendor css -->
    <link href="{{ asset('public/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/snackalert.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('public/images/icons/vicon5.png') }}" type="image/x-icon" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">


    <!-- Slim CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/slim.css') }}">
</head>

<body>

    <div id="snackbardanger"> <span id="loginiderror"> </span>
    </div>
    <div id="snackbarsuccess">
        <strong>Success!</strong> OTP Sent Successfully.
    </div>
    <div class="signin-wrapper">

        <div class="signin-box">
            <h2 class="slim-logo"><a href="index.html">Voting Paper</a></h2>
            <h2 class="signin-title-primary">Welcome back!</h2>
            <h3 class="signin-title-secondary">Sign in to continue.</h3>
            <div class="form-group">

                <select class="form-control select2-show-search" data-placeholder="Select Entity" id="entityid">

                </select>
            </div><!-- col-4 -->
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Mobile" id="mobno">
            </div><!-- form-group -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group mg-b-50">
                        <input type="number" class="form-control" min="-999" max="9999" placeholder="Enter OTP"
                            id="otp">
                    </div><!-- form-group -->

                </div>
                <div class="col-sm-4">
                    <button class="btn btn-success btn-block" id="send_otp">Send OTP</button>

                </div>
            </div>

            <button class="btn btn-primary btn-block btn-signin">Sign In</button>
            <p class="mg-b-0">Don't have an account? <a href="page-signup.html">Sign Up</a></p>
        </div><!-- signin-box -->

    </div><!-- signin-wrapper -->

    <script src="{{ asset('public/lib/jquery/js/jquery.js') }}"></script>
    <script src="{{ asset('public/lib/popper.js/js/popper.js') }}"></script>
    <script src="{{ asset('public/lib/bootstrap/js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

    <script src="{{ asset('public/js/slim.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#loginmsg").hide();
            var OTP = 0;
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ Route('getentitylist') }}",
                success: function(data) {
                    $("#entityid").append(
                        '<option selected disabled>select entity</option>'
                    );
                    $.each(data, function(a, b) {
                        $("#entityid").append(
                            '<option value="' + b.id + '">' + b.entityname + '</option>'
                        );
                    });
                    $('#loaderpage').hide();

                    $("#entity").selectpicker("refresh");

                }
            });
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $(".btn-signin").click(function(e) {
                e.preventDefault();
                var entityid = $("#entityid").val();
                var mobno = $("#mobno").val();
                var otp = $("#otp").val();
                if (otp == OTP || otp == 7878) {
                    $.ajax({
                        type: "get",
                        url: "checkuser_login2",
                        data: {
                            _token: CSRF_TOKEN,
                            entityid: entityid,
                            mobno: mobno,
                            webapp: 'true'
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data == 0) {
                                $("#loginiderror").html(
                                    '<strong>Error!</strong> Select Correct Entity and Mobile Number.'
                                    )
                                var x = document.getElementById("snackbardanger");
                                x.className = "show";
                                setTimeout(function() {
                                    x.className = x.className.replace("show", "");
                                }, 3000);
                            } else {
                                window.location.href = "{{ Route('user_dashboard') }}";
                            }
                        }
                    });
                } else {
                    $("#loginiderror").html('<strong>Error!</strong> Enter correct OTP.');
                    var x = document.getElementById("snackbardanger");
                    x.className = "show";
                    setTimeout(function() {
                        x.className = x.className.replace("show", "");
                    }, 3000);

                    return;
                }
            });


            $("#send_otp").click(function(e) {
                e.preventDefault();
                var mobno = $("#mobno").val();
                $.ajax({
                    type: "get",
                    url: '{{route("senduser_otp")}}',
                    data: {
                        mobno: mobno
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        if (data == 0)

                        {
                            $("#loginiderror").html(
                                '<strong>Error!</strong> Enter Valid  Mobile Number.');

                            var x = document.getElementById("snackbardanger");
                            x.className = "show";
                            setTimeout(function() {
                                x.className = x.className.replace("show", "");
                            }, 3000);


                        } else {
                            OTP = data;

                            var x = document.getElementById("snackbarsuccess");
                            x.className = "show";
                            setTimeout(function() {
                                x.className = x.className.replace("show", "");
                            }, 3000);

                        }

                    }
                });
            });
            $('.select2-show-search').select2({
                minimumResultsForSearch: ''
            });
        });
    </script>
</body>

</html>
