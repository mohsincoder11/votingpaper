@extends('layout')
@section('content')
    @php

    @endphp

    <div class="slim-mainpanel" style="margin-bottom: 4%;">
        <div class="container">
            {{-- <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
                <h6 class="slim-pagetitle">Welcome back,{{ auth()->user()->name }} </h6>
            </div><!-- slim-pageheader --> --}}

            @if (auth()->user()->role == 1 || auth()->user()->role == 2)
            <div class="row row-xs mt-4 mb-2">
                <div class="col-sm-6 col-lg-3">
                    <h6 class="slim-pagetitle">Entity </h6>
                </div>
            </div>
            <div class="row row-xs  mb-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-status {{CheckCardDisabled('entity')}}">
                        <a href="{{ route('addedentity') }}">
                            <div class="media">
                                <i class="fas fa-cubes dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span>ENTITY </span></h1>
                                    <p><b>&nbsp; </b></p>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="card card-status">
                        <a href="{{ route('addentity') }}">
                            <div class="media">
                                <i class="fa fa-plus-circle dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span>ADD ENTITY</span></h1>
                                    <p><b>&nbsp; </b></p>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->


            </div>
            @else
            <div class="mb-2"></div>
            @endif

            <div class="row row-xs mb-2">
                <div class="col-sm-6 col-lg-3">
                    <h6 class="slim-pagetitle">Election</h6>
                </div>
            </div>
            <div class="row row-xs  mb-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-status {{CheckCardDisabled('election')}}">
                        <a href="{{ route('addedelection') }}">
                            <div class="media">
                                <i class="fas fa-person-booth dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span>ELECTION</span></h1>
                                    <p><b>&nbsp; </b></p>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-status">
                        <a href="{{ route('addelection') }}">
                            <div class="media">
                                <i class="fas fa-plus-circle dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span>Add ELECTION</span></h1>
                                    <p><b> &nbsp;</b></p>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-status {{CheckCardDisabled('election_live')}}">
                        <a href="{{ route('live_election')}}">
                            <div class="media">
                                <i class="fas fa-chart-line dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span >ELECTION LIVE</span></h1>
                                    <p><b>&nbsp; </b></p>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-status {{CheckCardDisabled('election_complete')}}">
                        <a href="{{ route('election_result') }}">
                            <div class="media">
                                <i class="fas fa-file-alt dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span >ELECTION COMPLETED</span></h1>
                                    <p><b> &nbsp;</b></p>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
            </div>

            <div class="row row-xs mb-2">
                <div class="col-sm-6 col-lg-3">
                    <h6 class="slim-pagetitle">IBC Voting</h6>
                </div>
            </div>
            <div class="row row-xs  mb-4">
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
                    <div class="card card-status {{CheckCardDisabled('ibc')}}">
                        <a href="{{ route('addedibc') }}">
                            <div class="media">
                                <i class="fas fa-vote-yea dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span>IBC VOTING</span></h1>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
                    <div class="card card-status ">
                        <a href="{{ route('addibc') }}">
                            <div class="media">
                                <i class="fas fa-plus-circle dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span>CREATE VOTING</span></h1>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
                    <div class="card card-status {{CheckCardDisabled('ibc_live')}}">
                        <a href="{{ route('live_ibc_voting') }}">
                            <div class="media">
                                <i class="fas fa-chart-line dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span>LIVE IBC VOTING</span></h1>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
                    <div class="card card-status {{CheckCardDisabled('ibc_complete')}}">
                        <a href="{{ route('ibc_result') }}">
                            <div class="media">
                                <i class="fas fa-file-alt dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span>IBC VOTING COMPLETED</span></h1>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
            </div>

            <div class="row row-xs mb-2">
                <div class="col-sm-6 col-lg-3">
                    <h6 class="slim-pagetitle">Survey</h6>
                </div>
            </div>
            <div class="row row-xs mb-4">
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
                    <div class="card card-status {{CheckCardDisabled('survey')}}">
                        <a href="{{ route('added_survey') }}">
                            <div class="media">
                                <i class="fa fa-poll dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span>SURVEY</span></h1>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
                    <div class="card card-status">
                        <a href="{{ route('add_survey') }}">
                            <div class="media">
                                <i class="fa fa-plus-circle dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span>ADD SURVEY</span></h1>
                                   
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
                    <div class="card card-status {{CheckCardDisabled('survey_live')}}">
                        <a href="{{ route('live_survey') }}">
                            <div class="media">
                                <i class="fas fa-chart-line dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span>LIVE SURVEY</span></h1>
                                  
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
                    <div class="card card-status {{CheckCardDisabled('survey_complete')}}">
                        <a href="{{ route('survey_result') }}">
                            <div class="media">
                                <i class="fas fa-file-alt dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span>SURVEY COMPLETED</span></h1>
                                   
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
            </div><!-- row -->
            


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
            $("#hometab").addClass("active");
            $("#loaderpage").hide();
            $('.number-count').each(function() {

                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });

        });
    </script>
@stop
