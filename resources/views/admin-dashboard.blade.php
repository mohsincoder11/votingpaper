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

            <div class="row row-xs mt-4 mb-2">
                <div class="col-sm-6 col-lg-3">
                    <h6 class="slim-pagetitle">Entity</h6>
                </div>
            </div>
            <div class="row row-xs  mb-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-status">
                        <a href="{{ route('addedentity') }}">
                            <div class="media">
                                <i class="fas fa-cubes dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span class="number-count">{{ $entity }}</span></h1>
                                    <p><b> Entity</b></p>
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
                                    <h1><span class="number-count">{{ $entity }}</span></h1>
                                    <p><b> Add Entity</b></p>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->


            </div>

            <div class="row row-xs mb-2">
                <div class="col-sm-6 col-lg-3">
                    <h6 class="slim-pagetitle">Election</h6>
                </div>
            </div>
            <div class="row row-xs  mb-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-status">
                        <a href="{{ route('addedelection') }}">
                            <div class="media">
                                <i class="fas fa-person-booth dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span class="number-count">{{ $election }}</span></h1>
                                    <p><b> ELECTION</b></p>
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
                                    <h1><span >{{ $election }}</span></h1>
                                    <p><b> ADD ELECTION</b></p>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-status">
                        <a href="{{ route('live_election') }}">
                            <div class="media">
                                <i class="fas fa-chart-line dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span >{{ $election }}</span></h1>
                                    <p><b> ELECTION LIVE</b></p>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-status">
                        <a href="{{ route('election_result') }}">
                            <div class="media">
                                <i class="fas fa-file-alt dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span >{{ $election }}</span></h1>
                                    <p><b> ELECTION COMPLETED</b></p>
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
                    <div class="card card-status">
                        <a href="{{ route('addedibc') }}">
                            <div class="media">
                                <i class="fas fa-vote-yea dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span class="number-count">{{ $ibc }}</span></h1>
                                    <p><b>IBC VOTING</b> </p>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
                    <div class="card card-status">
                        <a href="{{ route('addibc') }}">
                            <div class="media">
                                <i class="fas fa-plus-circle dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span class="number-count">{{ $ibc }}</span></h1>
                                    <p><b>CREATE VOTING</b> </p>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
                    <div class="card card-status">
                        <a href="{{ route('live_ibc_voting') }}">
                            <div class="media">
                                <i class="fas fa-chart-line dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span class="number-count">{{ $ibc }}</span></h1>
                                    <p><b>LIVE IBC VOTING</b> </p>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
                    <div class="card card-status">
                        <a href="{{ route('ibc_result') }}">
                            <div class="media">
                                <i class="fas fa-file-alt dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span class="number-count">{{ $ibc }}</span></h1>
                                    <p><b>IBC VOTING COMPLETED</b> </p>
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
                    <div class="card card-status">
                        <a href="{{ route('added_survey') }}">
                            <div class="media">
                                <i class="fa fa-poll dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span class="number-count">{{ $survey }}</span></h1>
                                    <div class="dash-content">
                                        <p><b>SURVEY</b></p>
                                    </div><!-- dash-content -->
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
                                    <h1><span class="number-count">{{ $survey }}</span></h1>
                                    <div class="dash-content">
                                        <p><b>ADD SURVEY</b></p>
                                    </div><!-- dash-content -->
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
                    <div class="card card-status">
                        <a href="{{ route('live_survey') }}">
                            <div class="media">
                                <i class="fas fa-chart-line dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span class="number-count">{{ $survey }}</span></h1>
                                    <div class="dash-content">
                                        <p><b>LIVE SURVEY</b></p>
                                    </div><!-- dash-content -->
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    </div><!-- card -->
                </div><!-- col-3 -->
                <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
                    <div class="card card-status">
                        <a href="{{ route('survey_result') }}">
                            <div class="media">
                                <i class="fas fa-file-alt dashboard_icon"></i>
                                <div class="media-body">
                                    <h1><span class="number-count">{{ $survey }}</span></h1>
                                    <div class="dash-content">
                                        <p><b>SURVEY COMPLETED</b></p>
                                    </div><!-- dash-content -->
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
