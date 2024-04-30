@extends('layout')
@section('content')

    <div id="snackbarsuccess">
        <div class="row">

            <div class="col-md-10">
                <strong>Success!</strong> Notification Sent Successfully.
            </div>


        </div>
    </div>
    <div class="slim-mainpanel" id="mainview">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('addedelection') }}">Election</a></li>
                    <li class="breadcrumb-item">Live Election</li>
                </ol>
                <h6 class="slim-pagetitle">Live Election</h6>
            </div><!-- slim-pageheader -->




            <div class="section-wrapper mg-t-5">

                <div class="table-wrapper">
                    <table id="election_table" class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="wd-10p">Election Id</th>
                                <th class="wd-15p"> Type</th>
                                <th class="wd-15p"> Title</th>
                                <th class="wd-15p">Start Time</th>
                                <th class="wd-15p">End Time</th>
                                <th class="wd-10p">Total Voter</th>
                                <th class="wd-11p">Remaining Voter</th>
                                <th class="wd-8p">Action</th>

                            </tr>
                        </thead>
                        <tbody id="election_table_row">



                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- section-wrapper -->


        </div><!-- container -->
    </div><!-- slim-mainpanel -->
    <div id="deletemodalcall" class="modal fade ">
        <input type="hidden" id="deleteid">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Delete Record!</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <h5 class="lh-3 tx-inverse text-center"><img style="height: 120px;width: 170px;"
                            src="{{ asset('public/images/icons/delete3.gif') }}" alt=""></p>
                        <h5 class="lh-3 tx-inverse">Are You Sure You Want To Delete This Record ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger deleterecord" data-dismiss="modal"><i
                            class="fas fa-trash"></i>&nbsp;Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-ban"></i>&nbsp;Cancel</button>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->
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

            $('#electiontab').addClass('active');
            var successcode = $('#successcode').val();
            $('#loaderpage').hide();

            if (successcode == 2) {
                var x = document.getElementById("snackbarupdate");
                x.className = "show";
                setTimeout(function() {
                    x.className = x.className.replace("show", "");
                }, 3000);

            }

            show_product();

            function show_product() {
                $('#loaderpage').show();


                $.ajax({
                    type: "get",
                    url: "{{ Route('live_election') }}",
                    dataType: 'json',
                    success: function(data) {
                        //console.log(data);
                        //return;
                        //alert(data);
                        $('#election_table').DataTable().clear().destroy();
                        var array_name = [];

                        $.each(data, function(a, b) {
                            var end_time = b.voteenddate + ' ' + b.voteendtime;
                            var start_time = b.votestartdate + ' ' + b.votestarttime;

                            var end_time_sec = new Date(end_time).getTime();
                            var start_time_sec = new Date(start_time).getTime();
                            var current_time_sec = new Date().getTime();


                            if (current_time_sec > start_time_sec && current_time_sec <
                                end_time_sec) {
                                var ans = {

                                    id: b.id,
                                    electionid: b.electionid,
                                    ballottype: b.ballottype,
                                    votestartdate: b.votestartdate,
                                    votestarttime: b.voteenddate,
                                    voteenddate: b.voteenddate,
                                    voteendtime: b.voteendtime,
                                    votingtitle: b.votingtitle,
                                    total_voter: b.total_voter,
                                    voted: b.voted,
                                }
                                array_name.push(ans);
                            }



                        })
                        //console.log(array_name);

                        $.each(array_name, function(a, b) {
                            var ballottype;
                            var end_time = b.voteenddate + ' ' + b.voteendtime;
                            var start_time = b.votestartdate + ' ' + b.votestarttime;
                            var end_time_sec = new Date(end_time).getTime();
                            var start_time_sec = new Date(start_time).getTime();
                            var current_time_sec = new Date().getTime();

                            if (b.ballottype == 1) {
                                ballottype = 'Single Vote for Single Position ';
                            }
                            if (b.ballottype == 2) {
                                ballottype = 'Single Vote for Mutliple Position ';
                            }
                            if (b.ballottype == 3) {
                                ballottype = 'Ranking Vote for Single Position ';
                            }
                            if (b.ballottype == 4) {
                                ballottype = 'Ranking Vote for Multiple Position ';
                            }
                            if (b.ballottype == 5) {
                                ballottype = 'Hybrid Voting ';
                            }
                            if (b.ballottype == 0) {
                                ballottype = 'Ballot not generated';
                            }
                            var remaining_voter = b.total_voter - b.voted;
                            send_class = '';
                            if (remaining_voter < 1) {
                                send_class = 'disabled';
                            }
                            var votestartdate = b.votestartdate.split("-").reverse().join("-");
                            var voteenddate = b.voteenddate.split("-").reverse().join("-");
                            $("#election_table_row").append(
                                '<tr><td>' + b.id + '</td><td><b>' + b.electionid +
                                '</b></td><td><b>' + ballottype + '</b></td><td>' + b
                                .votingtitle + '</td><td>' +
                                votestartdate + ' ' + b.votestarttime + '</td><td>' +
                                voteenddate + ' ' + b.voteendtime + '</td><td><b>' + b
                                .total_voter + '</b></td><td><b>' + remaining_voter +
                                '</b></td><td><a href="#" class="btn btn-primary btn-sm rounded-circle sendnotification tooltip2 ' +
                                send_class + '" id=' +
                                b.id +
                                '  ><span class="tooltiptext2">Send Notification</span><i class="fas fa-paper-plane"></i></a> </td></tr>'
                            );

                            //alert(data[j].fullname);
                        });


                        createtable1();
                        $('#loaderpage').hide();


                    }
                });
            }

            function createtable1() {
                $('#election_table').DataTable({
                    "order": [
                        [0, "desc"]
                    ],
                    "bInfo": true,
                    "autoWidth": false,
                    //use to hide and show count 

                    "columnDefs": [{
                        "targets": [0],
                        "visible": false,
                    }],
                    Responsive: false,
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }
                });
            }

            // Select2




            $("#election_table_row").on('click', '.sendnotification', function() {
                var election_id = $(this).attr('id');
                $('#loaderpage').show();
                $.ajax({
                    type: "get",
                    url: "{{ Route('send_remaining_voter_notification') }}",
                    data: {
                        election_id: election_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        //console.log(data);
                        $('#loaderpage').hide();
                        var x = document.getElementById("snackbarsuccess");
                        x.className = "show";
                        setTimeout(function() {
                            x.className = x.className.replace("show", "");
                        }, 3000);

                    }
                });
            });


        });
    </script>
@stop
