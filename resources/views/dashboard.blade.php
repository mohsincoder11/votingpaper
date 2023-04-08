@extends('layout')
@section('content')
@php

@endphp

<div class="slim-mainpanel" style="margin-bottom: 24%;">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
      <h6 class="slim-pagetitle">Welcome back,<span id="user_name"></span> </h6>
    </div><!-- slim-pageheader -->

    <div class="row row-xs">


     <div class="col-sm-6 col-lg-3">
      <div class="card card-status">
        <a href="{{url('addedentity')}}"> 
          <div class="media">
            <i class="fas fa-cubes dashboard_icon" ></i>
            <div class="media-body">
              <h1 ><span class="number-count">{{$entity}}</span></h1>
              <p><b> Entity</b></p>
            </div><!-- media-body -->
          </div><!-- media -->
        </a>

      </div><!-- card -->
    </div><!-- col-3 -->
     <div class="col-sm-6 col-lg-3">
      <div class="card card-status">
        <a href="{{url('addedelection')}}"> 
          <div class="media">
            <i class="fas fa-person-booth dashboard_icon" ></i>
            <div class="media-body">
              <h1 ><span class="number-count">{{$election}}</span></h1>
              <p><b> ELECTION</b></p>
            </div><!-- media-body -->
          </div><!-- media -->
        </a>

      </div><!-- card -->
    </div><!-- col-3 -->

    <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
      <div class="card card-status">
        <a href="{{url('addedibc')}}"> 
          <div class="media">
            <i class="fas fa-vote-yea dashboard_icon" ></i>
            <div class="media-body">
              <h1><span  class="number-count">{{$ibc}}</span></h1>
              <p><b>IBC VOTING</b> </p>
            </div><!-- media-body -->
          </div><!-- media -->
        </a>
      </div><!-- card -->
    </div><!-- col-3 -->


    <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
      <div class="card card-status">
        <a href="{{url('added_survey')}}"> 
          <div class="media">
            <i class="fa fa-poll dashboard_icon" ></i>
            <div class="media-body">
              <h1><span class="number-count">{{$survey}}</span></h1>
              <div class="dash-content">
                <p><b>SURVEY</b> </p>
              </div><!-- dash-content -->
            </div><!-- media-body -->
          </div><!-- media -->
        </a>
      </div><!-- card -->
    </div><!-- col-3 -->


  </div><!-- row -->


</div><!-- container -->
</div><!-- slim-mainpanel -->
<div class="loaderpage" id="loaderpage">
  <div class="loadingspinner">
    <div id="square1"></div>
    <div id="square2"></div>
    <div id="square3"></div>
    <div id="square4"></div>
    <div id="square5"></div>
  </div>
  <p class="loaderp"> Loading . . . . .</p>
</div>
@stop

@section('js')
<script>
  $(document).ready(function() {
    $("#user_name").text(' ' + $("#user_nameinput").val());
    $("#loaderpage").hide();
         $('.number-count').each(function () {

    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 2000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
      });
    });
         
  });
</script>
@stop