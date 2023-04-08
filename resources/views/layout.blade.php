<!DOCTYPE html>
<html lang="en">
<meta name="csrf-token" content="{{ csrf_token() }}">


<head>

  <title>Voting Paper</title>
  <link rel="icon" href="{{asset('public/images/icons/vicon5.png')}}" type="image/x-icon" />

  <!-- vendor css -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link href="{{asset('public/lib/rickshaw/css/rickshaw.min.css')}}" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

  <!-- Slim CSS -->
  <link href="{{asset('public/lib/datatables/css/jquery.dataTables.css')}}" rel="stylesheet">
  <link href="{{asset('public/lib/jquery.steps/css/jquery.steps.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('public/css/slim.css')}}">
  <link href="{{asset('public/css/snackalert.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">

  <style type="text/css">
    .custom_survey_class {
      float: left;
      width: 80px;
      height: 70px;
      background-size: cover;
      border-radius: 5%;
      overflow: hidden;

    }

    .last_field {
      font-size: 14px;
    }

    .ibutton {
      height: 20px;
      width: 20px;
      border-radius: 50%;
      font-size: 9px;
      padding-left: 8px;
      padding-top: 3px;
      color: #fff;
      background-color: #1b84e7;
      align-items: center;
      display: inline-block;


    }

    .viewinfoclass span {
      font-size: 16px;
      font-weight: normal;
      padding-right: 5px;
    }

    .head p {
      margin-bottom: 0px;


    }

    .election_candidate_images {
      height: 40px;
      width: 50px;
    }

    .card-profile img {
      border-radius: 2%;
      margin-bottom: 5px;
      width: 60px;
      height: 60px;
    }

    .card-profile td {
      border-top: 1px solid #dee2e6;
    }

    .dashboard_icon {
      color: #1b84e7;
      font-size: 50px;
      padding-right: 5px;

    }

    .dashboard_icon:hover {
      color: #1563ad;

    }
  
    .loaderp {
      color: #585959;
      font-weight: bold;
      font-size: 14px;
      margin-top: 1%;
      text-align: center;
      letter-spacing: 2px;
    }

    .loaderpage {
      position: fixed;
      width: 100%;
      height: 100%;
      left: 0;
      top: 0;
      backdrop-filter: blur(5px);
      z-index: 1;
    }

    .loadingspinner {
      --square: 26px;
      --offset: 30px;

      --duration: 2.4s;
      --delay: 0.2s;
      --timing-function: ease-in-out;

      --in-duration: 0.4s;
      --in-delay: 0.1s;
      --in-timing-function: ease-out;

      width: calc(3 * var(--offset) + var(--square));
      height: calc(2 * var(--offset) + var(--square));
      padding: 0px;
      margin-left: auto;
      margin-right: auto;
      margin-top: 20%;
      position: relative;
    }

    .loadingspinner div {
      display: inline-block;
      background-color: #1b84e7;
      background-image: linear-gradient(to right, #1b84e7 0%, #1515af 100%);
      /*background: var(--text-color);*/
      /*box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.4);*/
      border: none;
      border-radius: 2px;
      width: var(--square);
      height: var(--square);
      position: absolute;
      padding: 0px;
      margin: 0px;
      font-size: 6pt;
      color: black;
    }


    .loadingspinner #square1 {
      left: calc(0 * var(--offset));
      top: calc(0 * var(--offset));
      animation: square1 var(--duration) var(--delay) var(--timing-function) infinite,
        squarefadein var(--in-duration) calc(1 * var(--in-delay)) var(--in-timing-function) both;
    }

    .loadingspinner #square2 {
      left: calc(0 * var(--offset));
      top: calc(1 * var(--offset));
      animation: square2 var(--duration) var(--delay) var(--timing-function) infinite,
        squarefadein var(--in-duration) calc(1 * var(--in-delay)) var(--in-timing-function) both;
    }

    .loadingspinner #square3 {
      left: calc(1 * var(--offset));
      top: calc(1 * var(--offset));
      animation: square3 var(--duration) var(--delay) var(--timing-function) infinite,
        squarefadein var(--in-duration) calc(2 * var(--in-delay)) var(--in-timing-function) both;
    }

    .loadingspinner #square4 {
      left: calc(2 * var(--offset));
      top: calc(1 * var(--offset));
      animation: square4 var(--duration) var(--delay) var(--timing-function) infinite,
        squarefadein var(--in-duration) calc(3 * var(--in-delay)) var(--in-timing-function) both;
    }

    .loadingspinner #square5 {
      left: calc(3 * var(--offset));
      top: calc(1 * var(--offset));
      animation: square5 var(--duration) var(--delay) var(--timing-function) infinite,
        squarefadein var(--in-duration) calc(4 * var(--in-delay)) var(--in-timing-function) both;
    }

    @keyframes square1 {
      0% {
        left: calc(0 * var(--offset));
        top: calc(0 * var(--offset));
      }

      8.333% {
        left: calc(0 * var(--offset));
        top: calc(1 * var(--offset));
      }

      100% {
        left: calc(0 * var(--offset));
        top: calc(1 * var(--offset));
      }
    }

    @keyframes square2 {
      0% {
        left: calc(0 * var(--offset));
        top: calc(1 * var(--offset));
      }

      8.333% {
        left: calc(0 * var(--offset));
        top: calc(2 * var(--offset));
      }

      16.67% {
        left: calc(1 * var(--offset));
        top: calc(2 * var(--offset));
      }

      25.00% {
        left: calc(1 * var(--offset));
        top: calc(1 * var(--offset));
      }

      83.33% {
        left: calc(1 * var(--offset));
        top: calc(1 * var(--offset));
      }

      91.67% {
        left: calc(1 * var(--offset));
        top: calc(0 * var(--offset));
      }

      100% {
        left: calc(0 * var(--offset));
        top: calc(0 * var(--offset));
      }
    }

    @keyframes square3 {

      0%,
      100% {
        left: calc(1 * var(--offset));
        top: calc(1 * var(--offset));
      }

      16.67% {
        left: calc(1 * var(--offset));
        top: calc(1 * var(--offset));
      }

      25.00% {
        left: calc(1 * var(--offset));
        top: calc(0 * var(--offset));
      }

      33.33% {
        left: calc(2 * var(--offset));
        top: calc(0 * var(--offset));
      }

      41.67% {
        left: calc(2 * var(--offset));
        top: calc(1 * var(--offset));
      }

      66.67% {
        left: calc(2 * var(--offset));
        top: calc(1 * var(--offset));
      }

      75.00% {
        left: calc(2 * var(--offset));
        top: calc(2 * var(--offset));
      }

      83.33% {
        left: calc(1 * var(--offset));
        top: calc(2 * var(--offset));
      }

      91.67% {
        left: calc(1 * var(--offset));
        top: calc(1 * var(--offset));
      }
    }

    @keyframes square4 {
      0% {
        left: calc(2 * var(--offset));
        top: calc(1 * var(--offset));
      }

      33.33% {
        left: calc(2 * var(--offset));
        top: calc(1 * var(--offset));
      }

      41.67% {
        left: calc(2 * var(--offset));
        top: calc(2 * var(--offset));
      }

      50.00% {
        left: calc(3 * var(--offset));
        top: calc(2 * var(--offset));
      }

      58.33% {
        left: calc(3 * var(--offset));
        top: calc(1 * var(--offset));
      }

      100% {
        left: calc(3 * var(--offset));
        top: calc(1 * var(--offset));
      }
    }

    @keyframes square5 {
      0% {
        left: calc(3 * var(--offset));
        top: calc(1 * var(--offset));
      }

      50.00% {
        left: calc(3 * var(--offset));
        top: calc(1 * var(--offset));
      }

      58.33% {
        left: calc(3 * var(--offset));
        top: calc(0 * var(--offset));
      }

      66.67% {
        left: calc(2 * var(--offset));
        top: calc(0 * var(--offset));
      }

      75.00% {
        left: calc(2 * var(--offset));
        top: calc(1 * var(--offset));
      }

      100% {
        left: calc(2 * var(--offset));
        top: calc(1 * var(--offset));
      }
    }

    @keyframes squarefadein {
      0% {
        transform: scale(0.75);
        opacity: 0.0;
      }

      100% {
        transform: scale(1.0);
        opacity: 1.0;
      }
    }

    .tooltip2 {
      position: relative;
      display: inline-block;
    }

    .tooltip2 .tooltiptext2 {
      visibility: hidden;
      background-color: #0f0f0f;
      color: #fff;
      text-align: center;
      border-radius: 5px;
      padding: 6px 15px;

      /* Position the tooltip */
      position: absolute;
      z-index: 1;
      bottom: 125%;
      left: 60%;
      margin-left: -50px;
    }

    .tooltip2 .tooltiptext2::after {
      content: " ";
      position: absolute;
      top: 100%;
      /* At the bottom of the tooltip */
      left: 50%;
      margin-left: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: black transparent transparent transparent;
    }

    .tooltip2:hover .tooltiptext2 {
      visibility: visible;
    }
  </style>
  <script src="{{asset('public/lib/jquery/js/jquery.js')}}"></script>

  <script src="{{asset('public/lib/morris.js/js/morris.js')}}"></script>

  <script src="{{asset('public/lib/raphael/js/raphael.min.js')}}"></script>

</head>

<body>
  <div class="slim-header ">
    <div class="container">
      <div class="slim-header-left">
        <h2 class="slim-logo"><a href="{{url('dashboard')}}">VOTING PAPER<span>.</span></a></h2>

      </div><!-- slim-header-left -->
      <div class="slim-header-right">
        <?php $userdata = Session::get('userdata'); ?>
        <input type="hidden" value="{{$userdata['username']}}" id="user_nameinput">
        <input type="hidden" value="{{$userdata['id']}}" id="sender_id">
        <div class="dropdown dropdown-c">
          <a href="#" class="logged-user" data-toggle="dropdown">
            <img src="{{asset('public/img/img0.jpg')}}" alt="">
            <span>{{$userdata['username']}}</span>
            <i class="fa fa-angle-down"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <nav class="nav">
              <a href="" class="nav-link"><i class="fas fa-user-circle"></i> &nbsp; View Profile</a>
              <a href="" class="nav-link"><i class="fas fa-user-edit"></i> &nbsp; Edit Profile</a>
              <a href="{{url('notification')}}" class="nav-link"><i class="fas fa-paper-plane"></i> &nbsp; Send Notification</a>
              <a href="" class="nav-link"><i class="fas fa-user-cog"></i> &nbsp; Account Settings</a>
              <a href="{{url('signout')}}" class="nav-link"><i class="fas fa-sign-out-alt"></i> &nbsp; Sign Out</a>
            </nav>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </div><!-- header-right -->
    </div><!-- container -->
  </div><!-- slim-header -->

  <div class="slim-navbar">
    <div class="container">
      <ul class="nav">
        <li class="nav-item" id="hometab">
          <a class="nav-link" href="{{url('dashboard')}}">
            <i class="fas fa-home"></i> &nbsp;&nbsp;
            <span>Home</span>
          </a>

        </li>

        <li class="nav-item with-sub" id="entitytab">
          <a class="nav-link" href="#">
            <i class="fas fa-archway"></i> &nbsp;&nbsp;
            <span>Entity</span>
          </a>
          <div class="sub-item">
            <ul>
              <li><a href="{{url('addentity')}}"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;&nbsp;&nbsp;Add Entity</a></li>
              <li><a href="{{url('addedentity')}}"><i class="fas fa-eye"></i>&nbsp;&nbsp;&nbsp;Registered Entity</a></li>


            </ul>
          </div><!-- dropdown-menu -->
        </li>
        <li class="nav-item with-sub" id="electiontab">
          <a class="nav-link" href="#">
            <i class="fas fa-vote-yea"></i> &nbsp;&nbsp;
            <span>Election</span>
          </a>
          <div class="sub-item">
            <ul>
              <li><a href="{{url('addelection')}}"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;&nbsp;&nbsp;Create Poll</a></li>
              <li><a href="{{url('addedelection')}}"><i class="fas fa-eye"></i>&nbsp;&nbsp;&nbsp;&nbsp;Registered Poll</a></li>
              <!--                 <li><a href=""><i class="fas fa-file-medical"></i>&nbsp;&nbsp;&nbsp;&nbsp;Voting Status</a></li>
 -->
              <li><a href="{{url('live_election')}}"><i class="fas fa-chart-line"></i>&nbsp;&nbsp;&nbsp;&nbsp;Live Election</a></li>
              <li><a href="{{url('election_result')}}"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Result</a></li>
            </ul>
          </div><!-- dropdown-menu -->
        </li>
        <li class="nav-item with-sub" id="ibcvotingtab">
          <a class="nav-link" href="#">
            <i class="fas fa-poll"></i> &nbsp;&nbsp;
            <span>IBC Voting</span>
          </a>
          <div class="sub-item">
            <ul>
              <li><a href="{{url('addibc')}}"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;&nbsp;&nbsp;Create Poll</a></li>
              <li><a href="{{url('addedibc')}}"><i class="fas fa-eye"></i>&nbsp;&nbsp;&nbsp;&nbsp;Registered Poll</a></li>
              <li><a href="{{url('live_ibc_voting')}}"><i class="fas fa-chart-line"></i>&nbsp;&nbsp;&nbsp;&nbsp;Live Voting </a></li>
              <li><a href="{{url('ibc_result')}}"><i class="fas fa-list-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Results</a></li>

            </ul>
          </div><!-- dropdown-menu -->
        </li>
        <li class="nav-item with-sub" id="surveytab">
          <a class="nav-link" href="#">
            <i class="fas fa-clipboard-list"></i> &nbsp;&nbsp;
            <span>Survey</span>
          </a>
          <div class="sub-item">
            <ul>
              <li><a href="{{url('add_survey')}}"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;&nbsp;&nbsp;Add Survey</a></li>
              <li><a href="{{url('added_survey')}}"><i class="fas fa-eye"></i>&nbsp;&nbsp;&nbsp;Added Survey</a></li>
              <li><a href="{{url('live_survey')}}"><i class="fas fa-chart-line"></i>&nbsp;&nbsp;&nbsp;Live Survey</a></li>
              <li><a href="{{url('survey_result')}}"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Result</a></li>


            </ul>
          </div><!-- dropdown-menu -->
        </li>
        <li class="nav-item" id="resulttab">
          <a class="nav-link" href="#">
            <i class="fas fa-list-alt"></i> &nbsp;&nbsp;
            <span>Report</span>
          </a>
        </li>


        <li class="nav-item" id="usermanagetab">
          <a class="nav-link" href="{{url('usermanage')}}">
            <i class="fas fa-user-circle"></i> &nbsp;&nbsp;
            <span>User Management</span>
          </a>
        </li>
      </ul>
    </div><!-- container -->
  </div><!-- slim-navbar -->

  @yield('content')

  <div class="slim-footer">
    <div class="container">
      <p>&copy; {{date('Y')}} All Rights Reserved. </p>
      <p>Designed by: <a href="#">WebBooster Tech</a></p>
    </div><!-- container -->
  </div><!-- slim-footer -->

  <script src="{{asset('public/lib/popper.js/js/popper.js')}}"></script>
  <script src="{{asset('public/lib/bootstrap/js/bootstrap.js')}}"></script>
  <script src="{{asset('public/lib/jquery.cookie/js/jquery.cookie.js')}}"></script>
  <script src="{{asset('public/lib/d3/js/d3.js')}}"></script>


  <script src="{{asset('public/lib/Flot/js/jquery.flot.js')}}"></script>
  <script src="{{asset('public/lib/Flot/js/jquery.flot.resize.js')}}"></script>
  <script src="{{asset('public/lib/peity/js/jquery.peity.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script src="{{asset('public/js/slim.js')}}"></script>
  <script src="{{asset('public/js/ResizeSensor.js')}}"></script>
  <script src="{{asset('public/lib/datatables/js/jquery.dataTables.js')}}"></script>
  <script src="{{asset('public/lib/datatables-responsive/js/dataTables.responsive.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
  <script src="{{asset('public/lib/jquery.steps/js/jquery.steps.js')}}"></script>
  <script src="{{asset('public/lib/parsleyjs/js/parsley.js')}}"></script>
  <script src="{{asset('public/js/jquery.validate.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js
"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>



  @yield('js')

</body>

</html>