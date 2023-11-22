@extends('user_part.user_layout')
@section('content')
    <div id="snackbarsuccess">
        <strong>Success!</strong> Resolution Submitted Successfully.

    </div>
    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">IBC Voting

                        </a></li>
                </ol>
                <h6 class="slim-pagetitle">IBC Voting</h6>
            </div><!-- slim-pageheader -->









            <div class="section-wrapper mg-t-20">
                <!-- <label class="section-title">Card with Options &amp; Buttons</label>
          <p class="mg-b-20 mg-sm-b-40">Cards with some options in the right corner of header of card.</p> -->

                @php
                    $i = 1;
                @endphp
                <form id="ibcform"> <input type="hidden" id="ibc_id" value="{{ $ibc[0]->res_id }}">
                    <input type="hidden" value="{{ $user_id }}" id="user_id2">
                    <input type="hidden" value="{{ $ibc[0]->voteenddate }} {{ $ibc[0]->voteendtime }} " id="enddatetime">
                    <div class="timer_position"><i class="fas fa-hourglass-half glassrotate"> </i> &nbsp;<span
                            id="timer" class="timer"> </span></div>
                    @foreach ($ibc as $ibc)
                        <div class="row mg-t-30">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-center justify-content-between pd-y-5 bd-b">
                                        <h6 class="mg-b-0 tx-16 tx-inverse">R{{ $i }}. @if (strlen($ibc->resdescription) > 50)
                                                {{ substr($ibc->resdescription, 0, 50) }} . . .
                                            @else
                                                {{ $ibc->resdescription }}
                                            @endif
                                        </h6>
                                        <div class="card-option tx-24">
                                            <a href="{{ asset('public/resolution/' . $ibc->resolutiondetail) }}"
                                                class="tx-primary tooltip2" target="_blank" download><span
                                                    class="tooltiptext2">Download Description File</span><i
                                                    class="fas fa-download"></i></a>
                                        </div><!-- card-option -->
                                    </div><!-- card-header -->
                                    <div class="card-body">
                                        <p class="mg-b-0 tx-normal tx-16">{{ $ibc->resdescription }}</p>
                                    </div><!-- card-body -->
                                    <div class="card-footer bd-t ">
                                        @if ($ibc->resulttype == 'yn')
                                            <div class="row">
                                                <!-- <div class="col-sm-4 col-md-5"></div> -->
                                                <div class="col-sm-2 col-md-2">
                                                    <label class="rdiobox rdiobox-success mg-t-5">
                                                        <input type="radio" name="{{ $ibc->id }}"
                                                            value="yes"><span>Yes</span>
                                                    </label>
                                                </div><!-- btn-demo -->
                                                <div class="col-sm-2 col-md-2">

                                                    <label class="rdiobox rdiobox-danger mg-t-5">
                                                        <input type="radio" name="{{ $ibc->id }}"
                                                            value="no"><span>No</span>
                                                    </label>
                                                </div><!-- btn-demo -->
                                                <div class="col-sm-2 col-md-2">

                                                    <label class="rdiobox rdiobox-warning mg-t-5">
                                                        <input type="radio" name="{{ $ibc->id }}"
                                                            value="abstained"><span>Abstained</span>
                                                    </label>
                                                </div><!-- btn-demo -->

                                            </div><!-- row -->
                                        @endif
                                        @if ($ibc->resulttype == 'ad')
                                            <div class="row">
                                                <!-- <div class="col-sm-4 col-md-5"></div> -->
                                                <div class="col-sm-2 col-md-2">
                                                    <label class="rdiobox rdiobox-success mg-t-5">
                                                        <input type="radio" name="{{ $ibc->id }}"
                                                            value="favor"><span>Favor</span>
                                                    </label>
                                                </div><!-- btn-demo -->
                                                <div class="col-sm-2 col-md-2">

                                                    <label class="rdiobox rdiobox-danger mg-t-5">
                                                        <input type="radio" name="{{ $ibc->id }}"
                                                            value="against"><span>Against</span>
                                                    </label>
                                                </div><!-- btn-demo -->
                                                <div class="col-sm-2 col-md-2">

                                                    <label class="rdiobox rdiobox-warning mg-t-5">
                                                        <input type="radio" name="{{ $ibc->id }}"
                                                            value="abstained"><span>Abstained</span>
                                                    </label>
                                                </div><!-- btn-demo -->

                                            </div><!-- row -->
                                        @endif
                                        @if ($ibc->resulttype == 'ar')
                                            <div class="row">
                                                <!-- <div class="col-sm-4 col-md-5"></div> -->
                                                <div class="col-sm-2 col-md-2">
                                                    <label class="rdiobox rdiobox-success mg-t-5">
                                                        <input type="radio" name="{{ $ibc->id }}"
                                                            value="accept"><span>Accept</span>
                                                    </label>
                                                </div><!-- btn-demo -->
                                                <div class="col-sm-2 col-md-2">

                                                    <label class="rdiobox rdiobox-danger mg-t-5">
                                                        <input type="radio" name="{{ $ibc->id }}"
                                                            value="reject"><span>Reject</span>
                                                    </label>
                                                </div><!-- btn-demo -->
                                                <div class="col-sm-2 col-md-2">

                                                    <label class="rdiobox rdiobox-warning mg-t-5">
                                                        <input type="radio" name="{{ $ibc->id }}"
                                                            value="abstained"><span>Abstained</span>
                                                    </label>
                                                </div><!-- btn-demo -->

                                            </div><!-- row -->
                                        @endif
                                    </div>
                                </div><!-- card -->
                            </div><!-- col-6 -->

                        </div><!-- row -->


                        @php
                            $i++;
                        @endphp
                    @endforeach
                    <div class="col-sm-12 col-md-12">
                        <div class="btn-demotext-align-center">
                            <button type="button" class="btn btn-primary col-lg-3 mg-t-20" id="submit_btn">Submit</button>
                        </div><!-- btn-demo -->
                    </div><!-- card-footer -->
                </form>
            </div><!-- section-wrapper -->
        </div><!-- row -->
    </div><!-- container -->
    </div><!-- slim-mainpanel -->
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $("#ibcvotingtab").addClass('active');
            $('[data-toggle="tooltip"]').tooltip();

            var enddatetime = $("#enddatetime").val();
            var countdown = new Date(enddatetime).getTime();
            var distance;
            var x = setInterval(function() {
                var now = new Date().getTime();
                distance = countdown - now;

                if (distance < 1) {
                    window.location.href = "{{ Route('ibcdetails') }}";
                } else {
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
                    var minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
                    var seconds = Math.floor(distance % (1000 * 60) / 1000);

                    seconds = seconds < 10 ? ("0" + seconds) : seconds;
                    minutes = minutes < 10 ? ("0" + minutes) : minutes;
                    hours = hours < 10 ? ("0" + hours) : hours;
                    document.getElementById("timer").innerHTML = days + " d " + hours + " : " + minutes +
                        " : " + seconds;
                }


            }, 1000);



            $("#submit_btn").on('click', function() {
                $('#submit_btn').prop("disabled", true)
                var str = $('#ibcform').serializeArray();

                var ans_array = [];
                var i = 0;
                for (i = 0; i < str.length; i++) {
                    var ans = {
                        resolution_que_id: str[i]['name'],
                        ans: str[i]['value'],
                        ibcresolution_id: $("#ibc_id").val(),
                        user_id: $("#user_id2").val()

                    }
                    ans_array[i] = ans;
                }
                //console.log(ans_array);
                $.ajax({
                    type: "POST",
                    url: '{{ route('insert_resolution_ans') }}',

                    data: {
                        resolution_ans_data: ans_array
                    },
                    dataType: "json",
                    success: function(data) {


                        var x = document.getElementById("snackbarsuccess");
                        x.className = "show";
                        setTimeout(function() {
                            x.className = x.className.replace("show", "");
                            window.location.href = '{{ url('ibcdetails') }}';
                        }, 3000);
                    }
                })

            })

        })
    </script>
@stop
