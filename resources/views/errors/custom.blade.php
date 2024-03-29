<!DOCTYPE html>
<html lang="en">
<head>
    
  <title>Login|Voting Paper</title>

    <!-- Vendor css -->
    <link href="{{asset('public/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('public/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">

    <!-- Slim CSS -->
  <link rel="stylesheet" href="{{asset('public/css/slim.css')}}">

  <link rel="icon" href="{{asset('public/images/icons/vicon5.png')}}" type="image/x-icon" />


  </head>
  <body>

    <div class="page-error-wrapper">
      <div>
        <h1 class="error-title">Error</h1>
        <h5 class="tx-sm-24 tx-normal">Oopps. Something went wrong.</h5>
        <p class="mg-b-50">Please contact the developer.</p>
        <p class="mg-b-50"><a href="{{route('dashboard')}}" class="btn btn-error">Back to Home</a></p>
      </div>

    </div><!-- page-error-wrapper -->

    <script src="{{asset('public/lib/jquery/js/jquery.js')}}"></script>
    <script src="{{asset('public/lib/popper.js/js/popper.js')}}"></script>
    <script src="{{asset('public/lib/bootstrap/js/bootstrap.js')}}"></script>

    <script src="{{asset('public/js/slim.js')}}"></script>

  </body>
</html>
