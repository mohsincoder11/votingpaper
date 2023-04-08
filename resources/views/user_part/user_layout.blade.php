<!DOCTYPE html>
<html lang="en">
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>

    <title>Voting Paper</title>
        <link rel="icon" href="{{asset('public/images/icons/vicon5.png')}}" type="image/x-icon" />

    <!-- vendor css -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="{{asset('public/lib/rickshaw/css/rickshaw.min.css')}}" rel="stylesheet">
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

    <!-- Slim CSS -->
        <link href="{{asset('public/lib/datatables/css/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('public/lib/jquery.steps/css/jquery.steps.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('public/css/slim.css')}}">
  <link href="{{asset('public/css/snackalert.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
      <link href="{{asset('public/lib/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">
          <link href="{{asset('public/lib/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
              <link href="{{asset('public/lib/jquery-toggles/css/toggles-full.css')}}" rel="stylesheet">



<style type="text/css">
  .timer_position{
  position: absolute;
  top:  10%;
  right:   0.5%;
  text-align:center;
padding: 10px;
  z-index: 1;
color: #fff;
font-weight: bold;
width: 10%;
border-radius:5px;
 background-image: linear-gradient(135deg,#2430f7 0%,#d10a97 100%)!important;

  }
.viewinfoclass span{
  font-size: 16px;
  font-weight: normal;
  padding-right: 5px;
}
.head p
{
margin-bottom: 0px;
  

}
.election_candidate_images
{
  height: 40px;
  width: 50px;
}
 .card-profile img
    {
            border-radius: 2%;  
            margin-bottom:5px;  
    width: 60px;
   height: 60px;
    }
    .card-profile td
    {
      border-top:1px solid  #dee2e6;
    }
    .glassrotate
    {
        animation: mymove 3s infinite ;
color: #fff;
    }
    @keyframes mymove {
  100% {
    transform: rotate(360deg);
  
 }
   
}
.dashboard_icon
    {
color: #1b84e7;
font-size: 50px;
padding-right: 5px;

    }
    .dashboard_icon:hover
    {
color: #1563ad;

    }
    
    
 
 
   .switchss {
        position: relative;
        display: block;
        vertical-align: top;
        width: 80px;
        height: 30px;
        padding: 3px;
        margin: 0 10px 10px 0;
        background: linear-gradient(to bottom, #eeeeee, #FFFFFF 25px);
        background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF 25px);
        border-radius: 18px;
        box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
        cursor: pointer;
        box-sizing:content-box;
    }
    .switch-input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        box-sizing:content-box;
    }
    .switch-label {
        position: relative;
        display: block;
        height: inherit;
        font-size: 10px;
        text-transform: uppercase;
        background: #db4932;
        border-radius: inherit;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
        box-sizing:content-box;
    }
    .switch-label:before, .switch-label:after {
        position: absolute;
        top: 50%;
        margin-top: -.5em;
        line-height: 1;
        -webkit-transition: inherit;
        -moz-transition: inherit;
        -o-transition: inherit;
        transition: inherit;
        box-sizing:content-box;
    }
    .switch-label:before {
        content: attr(data-off);
        right: 11px;
        color: #fff;
        font-size: 12px;
        text-shadow: 0 1px rgba(255, 255, 255, 0.5);
    }
    .switch-label:after {
        content: attr(data-on);
        left: 11px;
        color: #FFFFFF;
        text-shadow: 0 1px rgba(0, 0, 0, 0.2);
        opacity: 0;
    }
    .switch-input:checked ~ .switch-label {
        background: #2db01c;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
    }
    .switch-input:checked ~ .switch-label:before {
        opacity: 0;
    }
    .switch-input:checked ~ .switch-label:after {
        opacity: 1;
    }
    .switch-handle {
        position: absolute;
        top: 4px;
        left: 4px;
        width: 28px;
        height: 28px;
        background: linear-gradient(to bottom, #FFFFFF 40%, #f0f0f0);
        background-image: -webkit-linear-gradient(top, #FFFFFF 40%, #f0f0f0);
        border-radius: 100%;
        box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
    }
    .switch-handle:before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -6px 0 0 -6px;
        width: 12px;
        height: 12px;
        background: linear-gradient(to bottom, #eeeeee, #FFFFFF);
        background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF);
        border-radius: 6px;
        box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
    }
    .switch-input:checked ~ .switch-handle {
        left: 54px;
        box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
    }

/* Transition
========================== */
.switch-label, .switch-handle {
    transition: All 0.6s ease;
    -webkit-transition: All 0.6s ease;
    -moz-transition: All 0.6s ease;
    -o-transition: All 0.6s ease;
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
  top: 100%; /* At the bottom of the tooltip */
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
<style>
  .loaderp
  {
    color: #585959;
    font-weight: bold;
    font-size: 14px;
    margin-top: 1%;
text-align: center;
    letter-spacing: 2px;
  }
.loaderpage
{
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    backdrop-filter:blur(5px);
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

    width: calc( 3 * var(--offset) + var(--square));
    height: calc( 2 * var(--offset) + var(--square));
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
    left: calc( 0 * var(--offset) );
    top:  calc( 0 * var(--offset) );
    animation: square1 var(--duration) var(--delay) var(--timing-function) infinite,
               squarefadein var(--in-duration) calc(1 * var(--in-delay)) var(--in-timing-function) both;
  }

  .loadingspinner #square2 {
    left: calc( 0 * var(--offset) );
    top:  calc( 1 * var(--offset) );
    animation: square2 var(--duration) var(--delay) var(--timing-function) infinite,
              squarefadein var(--in-duration) calc(1 * var(--in-delay)) var(--in-timing-function) both;
  }
  
  .loadingspinner #square3 {
    left: calc( 1 * var(--offset) );
    top:  calc( 1 * var(--offset) );
    animation: square3 var(--duration) var(--delay) var(--timing-function) infinite,
               squarefadein var(--in-duration) calc(2 * var(--in-delay)) var(--in-timing-function) both;
  }

  .loadingspinner #square4 {
    left: calc( 2 * var(--offset) );
    top:  calc( 1 * var(--offset) );
    animation: square4 var(--duration) var(--delay) var(--timing-function) infinite,
               squarefadein var(--in-duration) calc(3 * var(--in-delay)) var(--in-timing-function) both;
  }

  .loadingspinner #square5 {
    left: calc( 3 * var(--offset) );
    top:  calc( 1 * var(--offset) );
    animation: square5 var(--duration) var(--delay) var(--timing-function) infinite,
               squarefadein var(--in-duration) calc(4 * var(--in-delay)) var(--in-timing-function) both;
  }

  @keyframes square1 {
    0%      {left: calc( 0 * var(--offset) ); top: calc( 0 * var(--offset) ); }
    8.333%  {left: calc( 0 * var(--offset) ); top: calc( 1 * var(--offset) ); }
    100%    {left: calc( 0 * var(--offset) ); top: calc( 1 * var(--offset) ); }
  }

  @keyframes square2 {
    0%      {left: calc( 0 * var(--offset) ); top: calc( 1 * var(--offset) ); }
    8.333%  {left: calc( 0 * var(--offset) ); top: calc( 2 * var(--offset) ); }
    16.67%  {left: calc( 1 * var(--offset) ); top: calc( 2 * var(--offset) ); }
    25.00%  {left: calc( 1 * var(--offset) ); top: calc( 1 * var(--offset) ); }
    83.33%  {left: calc( 1 * var(--offset) ); top: calc( 1 * var(--offset) ); }
    91.67%  {left: calc( 1 * var(--offset) ); top: calc( 0 * var(--offset) ); }
    100%    {left: calc( 0 * var(--offset) ); top: calc( 0 * var(--offset) ); }
  }

  @keyframes square3 {
    0%,100% {left: calc( 1 * var(--offset) ); top: calc( 1 * var(--offset) ); }
    16.67%  {left: calc( 1 * var(--offset) ); top: calc( 1 * var(--offset) ); }
    25.00%  {left: calc( 1 * var(--offset) ); top: calc( 0 * var(--offset) ); }
    33.33%  {left: calc( 2 * var(--offset) ); top: calc( 0 * var(--offset) ); }
    41.67%  {left: calc( 2 * var(--offset) ); top: calc( 1 * var(--offset) ); }
    66.67%  {left: calc( 2 * var(--offset) ); top: calc( 1 * var(--offset) ); }
    75.00%  {left: calc( 2 * var(--offset) ); top: calc( 2 * var(--offset) ); }
    83.33%  {left: calc( 1 * var(--offset) ); top: calc( 2 * var(--offset) ); }
    91.67%  {left: calc( 1 * var(--offset) ); top: calc( 1 * var(--offset) ); }
  }

  @keyframes square4 {
    0%      {left: calc( 2 * var(--offset) ); top: calc( 1 * var(--offset) ); }
    33.33%  {left: calc( 2 * var(--offset) ); top: calc( 1 * var(--offset) ); }
    41.67%  {left: calc( 2 * var(--offset) ); top: calc( 2 * var(--offset) ); }
    50.00%  {left: calc( 3 * var(--offset) ); top: calc( 2 * var(--offset) ); }
    58.33%  {left: calc( 3 * var(--offset) ); top: calc( 1 * var(--offset) ); }
    100%    {left: calc( 3 * var(--offset) ); top: calc( 1 * var(--offset) ); }
  }

  @keyframes square5 {
    0%      {left: calc( 3 * var(--offset) ); top: calc( 1 * var(--offset) ); }
    50.00%  {left: calc( 3 * var(--offset) ); top: calc( 1 * var(--offset) ); }
    58.33%  {left: calc( 3 * var(--offset) ); top: calc( 0 * var(--offset) ); }
    66.67%  {left: calc( 2 * var(--offset) ); top: calc( 0 * var(--offset) ); }
    75.00%  {left: calc( 2 * var(--offset) ); top: calc( 1 * var(--offset) ); }
    100%    {left: calc( 2 * var(--offset) ); top: calc( 1 * var(--offset) ); }
  }

  @keyframes squarefadein {
    0%      {transform: scale(0.75); opacity: 0.0;}
    100%    {transform: scale(1.0); opacity: 1.0;}
  }
[type=radio]:checked + img {
  outline: 2px solid #f00;
}
</style>

  </head>
  <body>
  @php 
 $app_userdata=Session::get('app_userdata');
@endphp
<input type="hidden" value="{{$app_userdata->memname}}" id="user_nameinput">
<input type="hidden" value="{{$app_userdata->entityid}}" id="entityid">
<input type="hidden" value="{{$app_userdata->mobno}}" id="mobno">
<input type="hidden" value="{{$app_userdata->id}}" id="user_id">
  
    <div class="slim-header ">
      <div class="container">
        <div class="slim-header-left">
          <h2 class="slim-logo"><a href="{{url('dashboard')}}">VOTING PAPER<span>.</span></a></h2>

           </div><!-- slim-header-left -->
        <div class="slim-header-right">
        <div class="dropdown dropdown-b">
            <a href="#" class="header-notification" id="notification_bell" data-toggle="dropdown">
            <i class="fas fa-bell"></i>
              <span class="indicator"></span>
            </a>
            <div class="dropdown-menu">
              <div class="dropdown-menu-header">
                <h6 class="dropdown-menu-title">Notifications</h6>
                <div>
                <!--   <a href="#">Mark All as Read</a>
                  <a href="#">Settings</a> -->
                </div>
              </div><!-- dropdown-menu-header -->
              <div class="dropdown-list">
                <!-- loop starts here -->
                <div  id="notification_list">
                </div>
             
              
              
                <div class="dropdown-list-footer">
                  <a href="#" id="show_all_notification"><i class="fa fa-angle-down"></i> Show All Notifications</a>
                </div>
              </div><!-- dropdown-list -->
            </div><!-- dropdown-menu-right -->
          </div><!-- dropdown -->


          <div class="dropdown dropdown-c">
            <a href="#" class="logged-user" data-toggle="dropdown">
              <img src="{{asset('public/img/img0.jpg')}}" alt="">
              <span>{{strtoupper($app_userdata->memname)}}</span>
              <i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <nav class="nav">
                <a href="" class="nav-link"><i class="fas fa-user-circle"></i> &nbsp; View Profile</a>
                <a href="" class="nav-link"><i class="fas fa-user-edit"></i> &nbsp; Edit Profile</a>
                <a href="{{url('user_feedback')}}" class="nav-link"><i class="fas fa-comments"></i> &nbsp; User Feedback </a>
                <a href="" class="nav-link"><i class="fas fa-user-cog"></i> &nbsp; Account Settings</a>
                <a href="{{url('user_signout')}}" class="nav-link"><i class="fas fa-sign-out-alt"></i> &nbsp; Sign Out</a>
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
            <a class="nav-link" href="{{url('user_dashboard')}}">
              <i class="fas fa-home"></i> &nbsp;&nbsp;
              <span>Home</span>
            </a>
          
          </li>
         
          
          <li class="nav-item " id="electiontab">
            <a class="nav-link"  href="{{url('electiondetails')}}" >
<i class="fas fa-vote-yea"></i> &nbsp;&nbsp;
              <span>Election</span>
            </a>
          </li>
          <li class="nav-item " id="ibcvotingtab">
            <a class="nav-link" href="{{url('ibcdetails')}}" >
<i class="fas fa-poll"></i> &nbsp;&nbsp;
              <span>IBC Voting</span>
            </a>
          </li>
          <li class="nav-item " id="surveytab">
            <a class="nav-link" href="{{url('surveydetails')}}" >
<i class="fas fa-clipboard-list"></i> &nbsp;&nbsp;
              <span>Survey</span>
            </a>
          </li>
         <li class="nav-item" id="receipttab">
            <a class="nav-link" href="{{url('receipt')}}">
<i class="fas fa-list-alt"></i> &nbsp;&nbsp;
              <span>receipt</span>
            </a>
          </li>
        
         
           <li class="nav-item" id="usermanagetab" >
            <a class="nav-link" href=""> 
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
        <p>&copy; {{date('Y')}}  All Rights Reserved. </p>
        <p>Designed by: <a href="#">WebBooster Tech</a></p>
      </div><!-- container -->
    </div><!-- slim-footer -->

    <script src="{{asset('public/lib/jquery/js/jquery.js')}}"></script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('public/lib/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>



<script>
    $( document ).ready(function() {

  $('[data-toggle="tooltip-primary"]').tooltip({
          template: '<div class="tooltip tooltip-primary" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
        });
   $('[data-toggle="tooltip-success"]').tooltip({
          template: '<div class="tooltip tooltip-success" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
        });

        $('[data-toggle="tooltip-warning"]').tooltip({
          template: '<div class="tooltip tooltip-warning" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
        });

        $('[data-toggle="tooltip-danger"]').tooltip({
          template: '<div class="tooltip tooltip-danger" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
        });

        $('[data-toggle="tooltip-info"]').tooltip({
          template: '<div class="tooltip tooltip-info" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
        });
        
});
</script>
<script>
  $("document").ready(function() {
    var i=0;
        $("#notification_bell").on('click',function() {
 $("#notification_list").empty();
    $.ajax({
      type: "GET",
      url: '/votingpaper/api/get_alluser_notification',
      data: {
        entity_id: $("#entityid").val(),
        mobile_no: $("#mobno").val(),
        count:i,
      },
      dataType: "json",
      success: function(data) {
        i++;
       if(data.length>0)
        {
            $.each(data, function(a, b) {
              //console.log(b);

        $("#notification_list").append('<a href="#" class="dropdown-link"><div class="media"><img src="{{asset('public/images/icons/vicon5.png')}}" alt=""><div class="media-body"><p><strong>'+
        b.title+'</strong> : '+b.message+'</strong></p><span> '+b.created_date+'  '+b.created_time+'</span></div></div></a>');
        })
        }
        else
        {
           $("#notification_list").html("<p></p><h5 class='tx-center'>&nbsp;You don't have any notification.</h5>"); 
        }
     
     

      }
    })
    })

    $("#show_all_notification").on('click',function() {
        $("#notification_list").empty();
     setTimeout(function() {
       document.getElementById("notification_bell").click();
         return;
   }, 1000);
        
  })
  })
</script>

    @yield('js')
              
  </body>
</html>
  
