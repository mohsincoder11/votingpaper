@extends('layout')
@section('content')
    <div id="snackbarsuccess">
        <div class="row">

            <div class="col-md-10">
                <strong>Success!</strong> Election Added Successfully.
            </div>


        </div>
    </div>
    <div id="snackbarentityid"> <strong>Success!</strong> Election Created Successfully.

    </div>
    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('addedelection') }}">Election</a></li>
                    <li class="breadcrumb-item">Add Election</li>
                </ol>
                <h6 class="slim-pagetitle">Add Election</h6>
            </div><!-- slim-pageheader -->
            <input type="hidden" id="createpollid">

            <div class="section-wrapper mg-t-5">

                <div id="wizard2">

                    <h3>Create Poll</h3>
                    <section>
                        <div class="table-wrapper">
                            <table id="entitytable" class="table display entitytable_class responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-10p">Entity ID</th>
                                        <th class="wd-15p">Entity Name</th>
                                        <th class="wd-20p">Entity Registration Date</th>
                                        <th class="wd-10p">Mobile</th>
                                        <th class="wd-10p">Email</th>
                                        <th class="wd-10p">City</th>
                                    </tr>
                                </thead>
                                <tbody id="entitylabelrow">
                                    <td class="text-danger"><span class="entityidlabel_class"> </span></td>
                                    <td class="text-danger"><span class="entitynamelabel_class"> </span></td>
                                    <td class="text-danger"><span class="regdatelabel_class"> </span></td>
                                    <td class="text-danger"><span class="mobilelabel_class"> </span></td>
                                    <td class="text-danger"><span class="emaillabel_class"> </span></td>
                                    <td class="text-danger"><span class="citylabel_class"> </span></td>
                                </tbody>
                            </table>
                        </div>
                        <h5 class="text-primary pt-2"><span id="ibcidlabel4"> </span></h5>
                        @php
                            date('h:i:s');
                            $date = Carbon::now('Asia/Kolkata');
                            $current_time = $date->toTimeString();

                        @endphp
                        <input type="hidden" value="{{ date('Y-m-d') }} {{ $current_time }}" id="current_datettime">
                        <input type="hidden" value="{{ $current_time }}" id="currenttime">
                        <div class="row pt-2">
                            <input type="hidden" value="0" id="createpollsubmit">

                            @if (auth()->user()->role == 1 || auth()->user()->role == 2)
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Select Entity <span
                                                class="tx-danger">*</span></label>
                                        <select class="form-control select2-show-search" data-placeholder="Choose Entity"
                                            name="entity" id="entity" required="">

                                            <option value="" selected="">Select Entity</option>
                                        </select>
                                        <span id="entity_required_label" class="text-danger tx-12"></span>
                                    </div>
                                </div><!-- col-4 -->
                            @else
                                <input type="hidden" name="entity" id="entity" value="{{ Auth::id() }}">
                            @endif
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Select Voting Type <span
                                            class="tx-danger">*</span></label>
                                    <select class="form-control selectpicker" data-placeholder="Choose country"
                                        required="" name="votingtype" id="votingtype">
                                        <option value="Private" selected="">Private</option>
                                        <option value="Public">Public</option>

                                    </select>
                                </div>
                            </div><!-- col-4 -->

                        </div>
                        <div class="row ">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Voting Title <span class="tx-danger">*</span></label>
                                    <input class="form-control" placeholder="Enter Voting Title" name="votingtitle"
                                        id="votingtitle" type="text" required="">

                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-2">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Voting Start Date <span
                                            class="tx-danger">*</span></label>
                                    <input id="votestartdate" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}"
                                        class="form-control check_time_class" name="votestartdate" type="date"
                                        required="">

                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-2">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Voting Start Time<span
                                            class="tx-danger">*</span></label>
                                    <input id="votestarttime" value="{{ $current_time }}"
                                        class="form-control check_time_class" name="votestarttime" type="time"
                                        required="">

                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-2">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Voting End Date <span
                                            class="tx-danger">*</span></label>
                                    <input id="voteenddate" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}"
                                        class="form-control check_time_class" name="voteenddate" type="date"
                                        required="">

                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-2">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Voting End Time <span
                                            class="tx-danger">*</span></label>
                                    <input id="voteendtime" value="{{ $current_time }}"
                                        class="form-control check_time_class" name="voteendtime" type="time"
                                        required="">

                                </div>
                            </div><!-- col-4 -->

                        </div>


                        <div class="row">

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Meeting Title </label>
                                    <input id="meetingtitle" class="form-control" name="meetingtitle" type="text"
                                        placeholder="Enter Meeting Title">

                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Meeting Date </label>
                                    <input id="meetingdate" value="{{ date('Y-m-d') }}" class="form-control"
                                        name="meetingdate" type="date">

                                </div>
                            </div><!-- col-4 -->

                        </div>


                    </section>
                    <h3>Upload Voter Data </h3>
                    <section>
                        <div class="table-wrapper">
                            <table id="entitytable2" class="table display entitytable_class responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-10p">Entity ID</th>
                                        <th class="wd-15p">Entity Name</th>
                                        <th class="wd-20p">Entity Registration Date</th>
                                        <th class="wd-10p">Mobile</th>
                                        <th class="wd-10p">Email</th>
                                        <th class="wd-10p">City</th>
                                    </tr>
                                </thead>
                                <tbody id="entitylabelrow">
                                    <td class="text-danger"><span class="entityidlabel_class"> </span></td>
                                    <td class="text-danger"><span class="entitynamelabel_class"> </span></td>
                                    <td class="text-danger"><span class="regdatelabel_class"> </span></td>
                                    <td class="text-danger"><span class="mobilelabel_class"> </span></td>
                                    <td class="text-danger"><span class="emaillabel_class"> </span></td>
                                    <td class="text-danger"><span class="citylabel_class"> </span></td>
                                </tbody>
                            </table>
                        </div>
                        <h5 class="text-primary"><span id="ibcidlabel1"></span></h5>

                        <div class="row pt-2">

                            <div class="col-lg-4">

                                <input type="hidden" id="entity_id" name="entity_id">
                                <input type="hidden" id="voterlist_length">

                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Upload Voter Data <span
                                            class="tx-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="custom-file">

                                                <input type="file" class="custom-file-input" id="voterlist"
                                                    name="voterlist" required="">
                                                <label class="custom-file-label custom-file-label-primary"
                                                    for="customFile" id="voterlistfilelabel">Choose file</label>
                                                <p id="voterlist_length_error" class="text-danger tx-12"></p>

                                            </div><!-- custom-file -->
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mg-b-10-force ">
                                                <button type="button" id="election_voterfile_upload"
                                                    class="bt btn-primary" style="padding:10px 8px 7px 10px; "><i
                                                        class="fas fa-upload"></i> &nbsp;&nbsp;Upload</button>
                                            </div>

                                        </div>
                                    </div>

                                    <b><label class="text-danger tx-12" id="selectxlsx"></label></b>
                                    <b><label class="text-danger tx-12" id="file_ampty"></label></b>
                                </div>
                                <input type="hidden" id="electionidvoterlist" name="electionidvoterlist">

                            </div><!-- col-4 -->
                            <div class="col-lg-2 ">
                                <div class="form-group mg-b-10-force pt-4" style="margin-top: 3px;">
                                    <a href="{{ asset('public/excel_file/election_voterlistdatafile.xlsx') }}"
                                        class="text-primary pt-4" download=""><i class="fas fa-download"></i>
                                        &nbsp;Voterlist Format</a>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-2 ">
                                <div class="form-group mg-b-10-force pt-4" style="margin-top: 3px;margin-left: -50px;">
                                    <button class="btn btn-danger " id="removefile"><i class="fas fa-minus-circle"></i>
                                        &nbsp;&nbsp;Delete All Data</button>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-2">
                                <div class="form-group mg-b-10-force pt-4" style="margin-top: 3px;margin-left: -50px;">
                                    <button class="btn btn-success " id="addsinglevoter"><i
                                            class="fas fa-plus-circle"></i> &nbsp;&nbsp;Add Voter User</button>
                                </div>
                            </div><!-- col-4 -->

                        </div>


                        <div class="row pt-2">

                            <div class="col-lg-12 ">
                                <div class="table-wrapper">
                                    <table id="voterlisttable" class="table display responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p">Serial No</th>
                                                <th class="wd-15p">Member Id No</th>
                                                <th class="wd-15p">Member Name</th>
                                                <th class="wd-20p">Email</th>
                                                <th class="wd-10p">Mobile No</th>
                                                <th class="wd-10p">Additional Info</th>
                                                <th class="wd-10p">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody id="votinguserrow">
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- col-4 -->

                        </div>
                    </section>
                    <h3>Add Ballet</h3>
                    <section>
                        <div class="table-wrapper">
                            <table id="entitytable3" class="table display entitytable_class responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-10p">Entity ID</th>
                                        <th class="wd-15p">Entity Name</th>
                                        <th class="wd-20p">Entity Registration Date</th>
                                        <th class="wd-10p">Mobile</th>
                                        <th class="wd-10p">Email</th>
                                        <th class="wd-10p">City</th>
                                    </tr>
                                </thead>
                                <tbody id="entitylabelrow">
                                    <td class="text-danger"><span id="entityidlabel_class"> </span></td>
                                    <td class="text-danger"><span id="entitynamelabel_class"> </span></td>
                                    <td class="text-danger"><span id="regdatelabel_class"> </span></td>
                                    <td class="text-danger"><span id="mobilelabel_class"> </span></td>
                                    <td class="text-danger"><span id="emaillabel_class"> </span></td>
                                    <td class="text-danger"><span id="citylabel_class"> </span></td>
                                </tbody>
                            </table>
                        </div>
                        <h5 class="text-primary"><span id="ibcidlabel2"></span></h5>

                        <input type="hidden" id="svsp_candidate_length">


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Ballet Paper <span
                                            class="tx-danger">*</span></label>
                                    <select class="form-control selectpicker" data-placeholder="Choose country"
                                        required="" name="ballottype" id="ballottype">
                                        <option value="1" selected>Individual Majority Voting – Single Vote for Single
                                            Position (First-past-the-post)</option>
                                        <option value="2">Individual Majority Voting – Single Vote for Multiple
                                            Position (First-past-the-post)</option>
                                        <option value="3">Preferential Voting – Ranking Vote for Single Position
                                        </option>
                                        <option value="4">Preferential Voting – Ranking Vote for Multiple Positions in
                                            a Group Panel.</option>
                                        <option value="5">Hybrid Voting – Combination of Single Individual vote and
                                            Ranking Vote</option>

                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-2">
                                <div class="form-group mg-b-10-force">

                                    <label class="form-control-label">&nbsp;</label>

                                    <button class="btn btn-success " id="open_master_model">Open Position Name
                                        Master</button>

                                </div>
                            </div>
                            &nbsp;&nbsp;
                            <div class="col-lg-2">
                                <div class="form-group mg-b-10-force">

                                    <label class="form-control-label">&nbsp;</label>

                                    <button class="btn btn-success " id="open_groupname_model">Open Group Name
                                        Master</button>

                                </div>
                            </div>



                        </div>
                        <div class="row pt-2">

                            <div class="col-lg-12 ">
                                <div id="firstballetform">
                                    <form method="POST" enctype="multipart/form-data" id="add_svsp_election_form"
                                        action="javascript:void(0)">
                                        <input type="hidden" name="add_svsp_election_id" id="add_svsp_election_id">
                                        <input type="hidden" id="ballot_type" name="ballot_type" value="1">

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group mg-b-10-force">
                                                    <label class="form-control-label">Candidate ID No <span
                                                            class="tx-danger">*</span></label>
                                                    <input id="cand_id_no1" value=""
                                                        class="form-control cand_idclass" name="cand_id_no1"
                                                        type="text" required=""
                                                        placeholder="Enter Candidate ID No ">
                                                    <p id="candidate_mainlabel" class="text-danger tx-12"></p>

                                                </div>
                                            </div><!-- col-4 -->
                                            <div class="col-lg-4">
                                                <div class="form-group mg-b-10-force">
                                                    <label class="form-control-label">Candidate Name <span
                                                            class="tx-danger">*</span></label>
                                                    <input id="cand_id_name1" value="" class="form-control"
                                                        name="cand_id_name1" type="text" required=""
                                                        placeholder="Enter Candidate Name  ">

                                                </div>
                                            </div><!-- col-4 -->
                                            <div class="col-lg-4">
                                                <div class="form-group mg-b-10-force">
                                                    <label class="form-control-label">Candidate Information </label>
                                                    <input id="cand_info1" value="" class="form-control"
                                                        name="cand_info1" type="text"
                                                        placeholder="Enter Candidate Information">

                                                </div>
                                            </div><!-- col-4 -->
                                        </div>
                                        <div class="row pt-2">
                                            <div class="col-lg-4" id="canddiv1">
                                                <div class="form-group mg-b-10-force">
                                                    <label class="form-control-label">Candidate Position <span
                                                            class="tx-danger">*</span></label>
                                                    <select class="form-control selectpicker "
                                                        data-placeholder="Choose country" required="" name="cand_pos1"
                                                        id="cand_pos1">

                                                    </select>

                                                </div>
                                            </div><!-- col-4 -->

                                            <div class="col-lg-4" id="canddiv2">
                                                <div class="form-group mg-b-10-force">
                                                    <label class="form-control-label">Candidate Position <span
                                                            class="tx-danger">*</span></label>
                                                    <select multiple="" class="form-control selectpicker "
                                                        data-placeholder="Choose country" name="cand_pos2[]"
                                                        id="cand_pos2">

                                                    </select>

                                                </div>
                                            </div><!-- col-4 -->


                                            <div class="col-lg-4">
                                                <div class="form-group mg-b-10-force">
                                                    <label class="form-control-label">Candidate Photo </label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="cand_photo1"
                                                            name="cand_photo1">
                                                        <label class="custom-file-label custom-file-label-primary"
                                                            for="customFile" id="candidate_photo_label">Choose
                                                            file</label>
                                                    </div><!-- custom-file -->
                                                </div>
                                            </div><!-- col-4 -->
                                            <div class="col-lg-4">
                                                <div class="form-group mg-b-10-force">
                                                    <label class="form-control-label">Candidate Election Symbol </label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                            id="cand_electsym1" name="cand_electsym1">
                                                        <label class="custom-file-label custom-file-label-primary"
                                                            for="customFile" id="candidate_election_symbol_label">Choose
                                                            file</label>
                                                    </div><!-- custom-file -->
                                                </div>
                                            </div><!-- col-4 -->
                                        </div>
                                        <div class="row pt-2">
                                            <div class="col-lg-4">
                                                <div class="form-group mg-b-10-force">
                                                    <label class="form-control-label">Candidate Group Name</label>
                                                    <select class="form-control selectpicker "
                                                        data-placeholder="Choose country" name="cand_group_name1"
                                                        id="cand_group_name1">

                                                    </select>

                                                </div>
                                            </div><!-- col-4 -->
                                            <div class="col-lg-4">
                                                <div class="form-group mg-b-10-force">
                                                    <label class="form-control-label">Upload Bio Data File </label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                            id="cand_biodata1" name="cand_biodata1">
                                                        <label class="custom-file-label custom-file-label-primary"
                                                            for="customFile" id="candidate_biodata_label">Choose
                                                            file</label>
                                                    </div><!-- custom-file -->
                                                </div>
                                            </div><!-- col-4 -->
                                            <div class="col-lg-2">
                                                <div class="form-group mg-b-10-force">

                                                    <label class="form-control-label">&nbsp;</label>

                                                    <button type="submit" class="btn btn-primary "
                                                        id="add_election_candidate"><i class="fas fa-plus-square"></i>
                                                        &nbsp;&nbsp;Add Election Candidate</button>

                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <p id="svsp_candidate_length_error" class="text-danger tx-12"></p>

                                    <div class="row pt-2">

                                        <div class="col-lg-12 ">
                                            <div class="table-wrapper">
                                                <table id="svsp_election_candidate_table"
                                                    class="table display responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-15p">Id/No</th>
                                                            <th class="wd-15p">Name</th>
                                                            <th class="wd-20p">Info</th>
                                                            <th class="wd-10p">Position</th>
                                                            <th class="wd-10p">Photo</th>
                                                            <th class="wd-10p">Symbol</th>
                                                            <th class="wd-10p">Group Name</th>
                                                            <th class="wd-15p">Action</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody id="svsp_election_candidate_row">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- col-4 -->

                                    </div>
                                </div><!-- col-4 -->

                            </div>
                        </div>
                    </section>
                    <h3>Preview</h3>
                    <section>

                        <h5 class="text-primary"><span id="ibcidlabel3"></span> </h5>


                        <div class="section-wrapper" id="print_area">

                            <h2><label class="section-title tx-center">
                                    <h2 class="tx-center">E-Ballot for <span id="preview_entityname"></span></h2>
                                </label></h2>



                            <h4><label class="section-title tx-center">
                                    <h4 class="tx-center"><span id="voting_title_preview"></span></h4>
                                </label></h4>

                            <div class="row">
                                <div class="col-lg-10">
                                    <p class="mg-b-20 mg-sm-b-40">Date: <span id="start_date_preview"></span> to <span
                                            id="end_date_preview"></span></p>
                                </div>
                                <div class="col-lg-1">
                                    <button class="btn btn-warning " id="print_button"><i class="fas fa-print"></i> Print
                                        Ballot Preview</button>
                                </div>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-bordered mg-b-0 card-profile">
                                    <tbody id="election_candidate_preview">
                                    </tbody>
                                    <tbody>
                                        <thead>
                                            <tr>
                                                <th class="wd-10p">ID</th>
                                                <th class="wd-25p">Name</th>
                                                <th class="wd-13p">Position</th>
                                                <th class="wd-12p"> Photo</th>
                                                <th class="wd-15p">Group Name</th>
                                                <th class="wd-15p">Election Symbol</th>
                                                <th class="wd-10p">Biodata</th>
                                            </tr>
                                        </thead>




                                    </tbody>
                                </table>
                            </div><!-- table-responsive -->
                        </div><!-- section-wrapper -->

                    </section>
                    <h3>Success </h3>
                    <section>
                        <h3 class="text-center">Your Poll Has Been Created Successfully!</h3>
                    </section>

                </div>
            </div><!-- section-wrapper -->
        </div><!-- container -->
    </div><!-- slim-mainpanel -->

    <div id="editmodal" class="modal fade ">
        <input type="hidden" id="updatevoterlistid">
        <div class="modal-dialog modal-dialog-vertical-center modal-lg" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Record!</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Member Id No <span class="tx-danger">*</span></label>
                                <input class="form-control" placeholder="Member Id No" name="voterlistmemberid_no"
                                    id="voterlistmemberid_no" type="text" required="">

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Member Name <span class="tx-danger">*</span></label>
                                <input class="form-control" placeholder="Enter Member Name" name="voterlistmemname"
                                    id="voterlistmemname" type="text" required="">

                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Email <span class="tx-danger">*</span></label>
                                <input class="form-control" value="" placeholder="Enter Email"
                                    name="voterlistemail" id="voterlistemail" type="email" required="">

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Mobile No<span class="tx-danger">*</span></label>
                                <input class="form-control" placeholder="Enter Mobile No" name="voterlistmobno"
                                    id="voterlistmobno" type="number" required="">

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Additional Info <span class="tx-danger">*</span></label>
                                <input class="form-control" placeholder="Additional Info" name="voterlistadditional_info"
                                    id="voterlistadditional_info" type="text" required="">

                            </div>
                        </div><!-- col-4 -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="updatevoter" class="btn btn-danger updatevoterlistrecord"
                        data-dismiss="modal"><i class="fas fa-upload"></i>&nbsp;Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-ban"></i>&nbsp;Cancel</button>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->


    <div id="insertmodal" class="modal fade ">
        <div class="modal-dialog modal-dialog-vertical-center modal-lg" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Record!</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <div class="row">
                        <input type="hidden" id="votermode" value="insert">

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Member Id No <span class="tx-danger">*</span></label>
                                <input class="form-control" placeholder="Member Id No" name="voterlistmemberid_no2"
                                    id="voterlistmemberid_no2" type="text" required="">

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Member Name <span class="tx-danger">*</span></label>
                                <input class="form-control" placeholder="Enter Member Name" name="voterlistmemname2"
                                    id="voterlistmemname2" type="text" required="">

                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Email <span class="tx-danger">*</span></label>
                                <input class="form-control" value="" placeholder="Enter Email"
                                    name="voterlistemail2" id="voterlistemail2" type="email" required="">

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Mobile No<span class="tx-danger">*</span></label>
                                <input class="form-control" placeholder="Enter Mobile No" name="voterlistmobno2"
                                    id="voterlistmobno2" type="number" required="">

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Additional Info <span class="tx-danger">*</span></label>
                                <input class="form-control" placeholder="Additional Info"
                                    name="voterlistadditional_info2" id="voterlistadditional_info2" type="text"
                                    required="">

                            </div>
                        </div><!-- col-4 -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="insertvoter" class="btn btn-success updatevoterlistrecord"
                        data-dismiss="modal"><i class="fas fa-plus"></i>&nbsp;Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-ban"></i>&nbsp;Cancel</button>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->


    <div id="publictypemodal" class="modal fade ">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Confirm!</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <h5 class="lh-3 tx-inverse text-center">
                        <h5 class="lh-3 tx-inverse">You have selected PUBLIC POLL, This will make the poll open for all
                            other than the voter list. Are you sure you want to continue with PUBLIC POLL.
                        </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal"><i
                            class="fas fa-check"></i>&nbsp;Continue</button>
                    <button type="button" class="btn btn-secondary backbutton" data-dismiss="modal"><i
                            class="fas fa-ban"></i>&nbsp;Back</button>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->



    <div id="timemodal" class="modal fade ">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Alert !</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <h5 class="lh-3 tx-inverse text-center">
                        <h5 class="lh-3 tx-inverse">Past Time Not Allowed.Please Choose Current or Future Time.
                        </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary backbutton" data-dismiss="modal"><i
                            class="fas fa-ban"></i>&nbsp;Back</button>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->


    <div id="position_master_model" class="modal fade ">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Position</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <div class="col-lg-12">
                        <input type="hidden" id="election_id">

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Enter Position <span
                                            class="tx-danger">*</span></label>
                                    <input id="position_name" class="form-control" name="position_name" required=""
                                        placeholder="Enter Position">
                                    <p id="position_name_mainlabel"><label class="form-control-label"> <span
                                                class="tx-danger" id="position_name_label"></span></label></p>

                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-3">
                                <label class="form-control-label"> &nbsp;</label>

                                <button class="btn btn-success " id="add_position"><i class="fas fa-plus-square"></i>
                                    &nbsp;Add </button>
                            </div>
                        </div>
                    </div>
                    <div class="table-wrapper">
                        <table id="position_table" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-100p">Position</th>
                                    <th class="wd-100p">Action</th>

                                </tr>
                            </thead>
                            <tbody id="positiontablerow">

                            </tbody>
                        </table>
                    </div>
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->


    <div id="deletemodalcall" class="modal fade ">
        <input type="hidden" id="deleteid">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Delete Voter!</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <h5 class="lh-3 tx-inverse text-center"><img style="height: 120px;width: 170px;"
                            src="{{ asset('public/images/icons/delete3.gif') }}" alt=""></p>
                        <h5 class="lh-3 tx-inverse">Are You Sure You Want To Delete All Voterlist Data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger deleteallvoterlist" data-dismiss="modal"><i
                            class="fas fa-trash"></i>&nbsp;Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-ban"></i>&nbsp;Cancel</button>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->



    <div id="open_groupname_master_model" class="modal fade ">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Group Name</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <div class="col-lg-12">
                        <input type="hidden" id="election_id">

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Enter Group Name <span
                                            class="tx-danger">*</span></label>
                                    <input id="group_name" class="form-control" name="group_name" required=""
                                        placeholder=" Group Name">

                                    <p id="group_name_mainlabel"><label class="form-control-label"> <span
                                                class="tx-danger" id="group_name_label"></span></label></p>


                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-3">
                                <label class="form-control-label"> &nbsp;</label>

                                <button class="btn btn-success " id="add_groupname"><i class="fas fa-plus-square"></i>
                                    &nbsp;Add </button>
                            </div>
                        </div>
                    </div>
                    <div class="table-wrapper">
                        <table id="groupnametable" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-100p">Group Name</th>
                                    <th class="wd-100p">Action</th>

                                </tr>
                            </thead>
                            <tbody id="groupnametablerow">

                            </tbody>
                        </table>
                    </div>
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->


    <div class="loaderpage" id="voterlistloader">
        <div class="loadingspinner">
            <div id="square1"></div>
            <div id="square2"></div>
            <div id="square3"></div>
            <div id="square4"></div>
            <div id="square5"></div>
        </div>

        <p class="loaderp">
            Just sit back and relax. we are uploading your files.
        </p>
    </div>
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

    <div id="editsvsp_model" class="modal fade ">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Election Candidate!</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <form method="POST" enctype="multipart/form-data" id="svsp_editform">
                        @csrf
                        <input type="hidden" name="svspmode" value="update">
                        <input type="hidden" name="svsp_editid" id="svsp_editid">
                        <input type="hidden" name="ballot_type2" id="ballot_type2">
                        <input type="hidden" name="edit_election_id" id="edit_election_id">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Candidate ID No <span
                                            class="tx-danger">*</span></label>
                                    <input id="cand_id_no12" value="" class="form-control cand_idclass"
                                        name="cand_id_no12" type="text" required=""
                                        placeholder="Enter Candidate ID No ">
                                    <p id="candidate_mainlabel2" class="text-danger tx-12"></p>

                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Candidate Name <span
                                            class="tx-danger">*</span></label>
                                    <input id="cand_id_name12" value="" class="form-control" name="cand_id_name12"
                                        type="text" required="" placeholder="Enter Candidate Name  ">

                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Candidate Information </label>
                                    <input id="cand_info12" value="" class="form-control" name="cand_info12"
                                        type="text" placeholder="Enter Candidate Information">

                                </div>
                            </div><!-- col-4 -->
                        </div>
                        <div class="row">
                            <div class="col-lg-4" id="canddiv12">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Candidate Position <span
                                            class="tx-danger">*</span></label>
                                    <select class="form-control selectpicker " data-placeholder="Choose country"
                                        required="" name="cand_pos12" id="cand_pos12">

                                    </select>

                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4" id="canddiv22">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Candidate Position <span
                                            class="tx-danger">*</span></label>
                                    <select multiple="" class="form-control selectpicker "
                                        data-placeholder="Choose country" name="cand_pos22[]" id="cand_pos22">

                                    </select>

                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Candidate Photo</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="cand_photo12"
                                            name="cand_photo12">
                                        <label class="custom-file-label custom-file-label-primary" for="customFile"
                                            id="candidate_photo_label"><span id="editcandidatephoto_label">Choose
                                                file</span></label>
                                    </div><!-- custom-file -->
                                </div>
                            </div><!-- col-4 -->
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Candidate Election Symbol</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="cand_electsym12"
                                            name="cand_electsym12">
                                        <label class="custom-file-label custom-file-label-primary" for="customFile"
                                            id="candidate_election_symbol_label"><span
                                                id="editelectionsymbol_label">Choose file</span></label>
                                    </div><!-- custom-file -->
                                </div>
                            </div><!-- col-4 -->
                            <input type="hidden" id="cand_photo12_name" name="cand_photo12_name">
                            <input type="hidden" id="cand_electsym12_name" name="cand_electsym12_name">
                            <input type="hidden" id="cand_biodata12_name" name="cand_biodata12_name">

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Candidate Group Name </label>
                                    <select class="form-control selectpicker " data-placeholder="Choose Group Name"
                                        name="cand_group_name12" id="cand_group_name12">

                                    </select>

                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Upload Bio Data File </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="cand_biodata12"
                                            name="cand_biodata12">
                                        <label class="custom-file-label custom-file-label-primary" for="customFile"
                                            id="candidate_biodata_label"><span id="editbiodata_label">Choose
                                                File</span></label>
                                    </div><!-- custom-file -->
                                </div>
                            </div><!-- col-4 -->
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group mg-b-10-force">

                                    <label class="form-control-label">&nbsp;</label>

                                    <button type="submit" class="btn btn-primary add_election_candidate"
                                        id="add_election_candidate_insert"><i class="fas fa-plus-square"></i>
                                        &nbsp;&nbsp;Update </button>

                                </div>
                            </div>
                        </div>
                    </form>

                    <p id="singlevoter_allfield_error" class="text-danger tx-12"></p>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fas fa-ban"></i>&nbsp;Cancel</button>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->


@stop
@section('js')
    <script src="{{ asset('public/js/simpleUpload.min.js') }}"></script>
    <script>
        $(document).ready(function(e) {

            // Wait for sometime before running this script again

            $('#electiontab').addClass('active');
            $('#loaderpage').hide();
            $('#voterlistloader').hide();
            $("#position_name_mainlabel").hide();
            $('#entitytable').hide();
            $('#entitytable2').hide();
            $('#entitytable3').hide();
            $('#entitytable4').hide();

            $('#firstballetform').show();
            $('#canddiv2').hide();



            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


            $('#wizard2').steps({
                headerTag: 'h3',
                bodyTag: 'section',
                autoFocus: true,
                titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
                onStepChanging: function(event, currentIndex, newIndex) {
                    if (currentIndex < newIndex) {
                        // Step 1 form validation
                        if (currentIndex === 0) {
                            var entity = $('#entity').parsley();

                            if ($('#entity').val()) {
                                $('#entity_required_label').text('');
                            } else {
                                $('#entity_required_label').text('This value is required.');
                            }

                            var votingtype = $('#votingtype').parsley();
                            var votingtitle = $('#votingtitle').parsley();
                            //alert(votingtitle);
                            var votestartdate = $('#votestartdate').parsley();
                            var voteenddate = $('#voteenddate').parsley();
                            var votestarttime = $('#votestarttime').parsley();
                            var voteendtime = $('#voteendtime').parsley();
                            var meetingdate = $('#meetingdate').parsley();
                            var meetingtitle = $('#meetingtitle').parsley();

                            if (votingtitle.isValid() && entity.isValid() && votestartdate.isValid() &&
                                voteenddate.isValid() && votestarttime.isValid() && voteendtime
                                .isValid() && meetingdate.isValid() && votingtitle.isValid() &&
                                votingtype.isValid() && meetingtitle.isValid()) {


                                //return true;
                                var createpollsubmit = $('#createpollsubmit').val();
                                if (createpollsubmit == 0)

                                {
                                    $("#voting_title_preview").text($('#votingtitle').val());
                                    $("#start_date_preview").text($('#votestartdate').val());
                                    $("#end_date_preview").text($('#voteenddate').val());

                                    $.ajax({
                                        type: "get",
                                        url: "{{ Route('insertelection') }}",
                                        data: {
                                            _token: CSRF_TOKEN,
                                            votingtype: $('#votingtype').val(),
                                            entity: $('#entity').val(),
                                            votingtitle: $('#votingtitle').val(),
                                            votestartdate: $('#votestartdate').val(),
                                            voteenddate: $('#voteenddate').val(),
                                            votestarttime: $('#votestarttime').val(),
                                            voteendtime: $('#voteendtime').val(),
                                            meetingdate: $('#meetingdate').val(),
                                            meetingtitle: $('#meetingtitle').val()
                                        },
                                        dataType: 'json',
                                        success: function(data) {
                                            //console.log(data);
                                            $('#election_id').val(data.id);
                                            $('#add_svsp_election_id').val(data.id);
                                            $('#createpollid').val(data.id);
                                            $('#electionidvoterlist').val(data.id);
                                            $('#createpollsubmit').val(1);
                                            $('#ibcidlabel1').text('Election Voting Id : ' +
                                                data.electionid);
                                            $('#ibcidlabel2').text('Election Voting Id : ' +
                                                data.electionid);
                                            $('#ibcidlabel3').text('Election Voting Id : ' +
                                                data.electionid);
                                            $('#ibcidlabel4').text('Election Voting Id : ' +
                                                data.electionid);
                                            var x = document.getElementById(
                                                "snackbarentityid");
                                            x.className = "show";
                                            setTimeout(function() {
                                                x.className = x.className.replace(
                                                    "show", "");
                                            }, 3000);


                                        }
                                    });
                                }
                                if (createpollsubmit == 1)

                                {
                                    $.ajax({
                                        type: "get",
                                        url: "{{ Route('updateelection') }}",
                                        data: {
                                            _token: CSRF_TOKEN,
                                            createpollid: $('#createpollid').val(),
                                            votingtype: $('#votingtype').val(),
                                            entity: $('#entity').val(),
                                            votingtitle: $('#votingtitle').val(),
                                            votestartdate: $('#votestartdate').val(),
                                            voteenddate: $('#voteenddate').val(),
                                            votestarttime: $('#votestarttime').val(),
                                            voteendtime: $('#voteendtime').val(),
                                            meetingdate: $('#meetingdate').val(),
                                            meetingtitle: $('#meetingtitle').val()
                                        },
                                        dataType: 'json',
                                        success: function(data) {

                                            $('#createpollsubmit').val(1);

                                        }
                                    });
                                }


                                return true;
                            } else {
                                votingtitle.validate();
                                entity.validate();
                                votestartdate.validate();
                                voteendtime.validate();
                                voteenddate.validate();
                                votestarttime.validate();
                                meetingdate.validate();
                                meetingtitle.validate();
                                votingtype.validate();
                            }
                        }

                        // Step 2 address validation
                        if (currentIndex == 1) {
                            var voterlist = $('#voterlist_length').val();
                            var voterlist2 = $('#voterlist').parsley();
                            if (voterlist2.isValid()) {
                                if (voterlist > 0) {
                                    return true;
                                } else {
                                    $('#voterlist_length_error').text('Please upload voterdata');
                                }
                            } else {
                                voterlist2.validate();
                            }
                        }

                        // Step 3 form validation

                        if (currentIndex == 2) {

                            var svsp_length = $("#svsp_candidate_length").val();
                            var ballottype = $('#ballottype').parsley();
                            if (svsp_length > 0) {
                                if (ballottype.isValid()) {
                                    return true;
                                } else {
                                    ballottype.validate();
                                }
                            } else {
                                $("#svsp_candidate_length_error").text('Please add Candidate')
                            }

                        }
                        if (currentIndex == 3) {
                            var x = document.getElementById("snackbarsuccess");
                            x.className = "show";
                            setTimeout(function() {
                                x.className = x.className.replace("show", "");
                            }, 3000);

                            setTimeout(function() {
                                    window.location.href = "{{ Route('addedelection') }}";
                                },
                                2200);
                            return true;

                        }


                        // Always allow step back to the previous step even if the current step is not valid.
                    } else {
                        return true;
                    }
                }
            });
            $(".rd").change(function() {
                var resulttype = $(this).attr('id');
                $('#resulttype').val(resulttype);
                ///alert(resulttype);
            });





            $("#voterlist").change(function() {

                var fullPath = $("#voterlist").val();
                var filename = fullPath.replace(/^.*[\\\/]/, '');
                var extention = filename.split('.').pop();

                $('#voterlistfilelabel').text(filename);
                if (extention == 'xlsx' || extention == 'csv') {
                    $('#selectxlsx').text('');


                } else {
                    $('#selectxlsx').text('select excel or csv file');

                }


            });
            $('#removefile').click(function() {
                $('#deletemodalcall').modal('show');
            });

            $(".deleteallvoterlist").click(function() {
                $('#loaderpage').show();

                var electionid = $('#election_id').val();
                $.ajax({
                    type: "get",
                    url: "{{ Route('removeelectionvoterlistdata') }}",
                    data: {
                        electionid: electionid
                    },
                    dataType: 'json',
                    success: function(data) {
                        //alert(data);
                        $('#voterlisttable').DataTable().clear().destroy();
                        $('#loaderpage').hide();

                    }
                });
            })


            $("#votinguserrow").on('click', '.deletemodal', function() {
                var id = $(this).attr('id');

                $("#deletevoterlistid").val(id);

            });
            $("#votinguserrow").on('click', '.deleterecord', function() {
                $('#loaderpage').show();

                var id = $(this).attr('id');

                var electionid = $('#createpollid').val();
                $(this).parent().parent().remove();
                $.ajax({
                    type: "get",
                    url: "{{ Route('deleteelectionvoterlist') }}",
                    data: {
                        id: id,
                        electionid: electionid
                    },
                    dataType: 'json',
                    success: function(data) {
                        //console.log(data);
                        make_table(data);

                        $('#loaderpage').hide();


                    }
                });
            });

            $("#votinguserrow").on('click', '.editrecord', function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                $.ajax({
                    type: "get",
                    url: "{{ Route('getelectionsinglevoterlist') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {

                        $("#updatevoterlistid").val(data.id);
                        $("#voterlistmemname").val(data.memname);
                        $("#voterlistmemberid_no").val(data.member_id_no);
                        $("#voterlistmobno").val(data.mobno);
                        $("#voterlistemail").val(data.email);
                        $("#voterlistadditional_info").val(data.additional_info);
                    }
                });
            });

            $("#addsinglevoter").click(function() {
                $("#insertmodal").modal('show');
            });
            $(".updatevoterlistrecord").click(function(e) {
                e.preventDefault();
                var button_id = this.id;
                if (button_id == 'insertvoter') {

                    if ($("#voterlistmemname2").val() && $("#voterlistmemberid_no2").val() && $(
                            "#voterlistmobno2").val() && $("#voterlistemail2").val() && $(
                            "#voterlistadditional_info2").val()) {
                        $("#singlevoter_allfield_error").text('');
                        $.ajax({
                            type: "get",
                            url: "{{ Route('updateelectionsinglevoterlist') }}",
                            data: {
                                votermode: "insert",
                                entityid: $('#entitytypeedit').val(),

                                electionid: $('#createpollid').val(),
                                memname: $("#voterlistmemname2").val(),
                                member_id_no: $("#voterlistmemberid_no2").val(),
                                mobno: $("#voterlistmobno2").val(),
                                email: $("#voterlistemail2").val(),
                                additional_info: $("#voterlistadditional_info2").val()
                            },
                            dataType: 'json',
                            success: function(data) {
                                //console.log(data);
                                $("#voterlistmemname2").val('');
                                $("#voterlistmemberid_no2").val('');
                                $("#voterlistmobno2").val('');
                                $("#voterlistemail2").val('');
                                $("#voterlistadditional_info2").val('');

                                make_table(data);

                            }
                        });
                    } else {
                        $("#singlevoter_allfield_error").text('Please fill all fields.');

                    }

                } else {
                    var id = $("#updatevoterlistid").val();
                    $.ajax({
                        type: "get",
                        url: "{{ Route('updateelectionsinglevoterlist') }}",
                        data: {
                            id: id,
                            electionid: $('#createpollid').val(),
                            memname: $("#voterlistmemname").val(),
                            member_id_no: $("#voterlistmemberid_no").val(),
                            mobno: $("#voterlistmobno").val(),
                            email: $("#voterlistemail").val(),
                            additional_info: $("#voterlistadditional_info").val()
                        },
                        dataType: 'json',
                        success: function(data) {
                            make_table(data);

                        }
                    });
                }

            });

            function make_table(data) {
                if (data.length > 0) {
                    $('#voterlist_length_error').text('');
                }
                $('#voterlist_length').val(data.length);

                $('#voterlisttable').DataTable().clear().destroy();
                var serial_no = 1;
                $.each(data, function(a, b) {
                    $("#votinguserrow").append(
                        '<tr><td>' + serial_no + '</td><td>' + b.member_id_no + '</td><td>' + b
                        .memname + '</td><td>' + b.email + '</td><td>' + b.mobno + '</td><td>' + b
                        .additional_info +
                        ' </td><td><button class="btn btn-primary btn-sm rounded-circle editrecord tooltip2" id="' +
                        b.id +
                        '" data-toggle="modal" data-target="#editmodal" data-placement="top"  title="Edit Record" ><span class="tooltiptext2">Edit Record</span> <i class="fas fa-edit"></i></button>&nbsp;<button class="modal-effect btn btn-danger btn-sm rounded-circle deleterecord tooltip2" data-toggle="modal" data-effect="effect-sign" id="' +
                        b.id +
                        '" ><span class="tooltiptext2">Delete Record</span> <i class="fas fa-trash"></i></button></td></tr>'
                    );
                    serial_no = serial_no + 1;

                    //alert(data[j].fullname);
                });
                createtable1();

            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });







            function createtable1() {
                $("#voterlisttable").dataTable({
                    "info": true,
                    responsive: true,

                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: '',
                        lengthMenu: '_MENU_ items/page',
                    }

                });
            }

            $('#loaderpage').show();

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ Route('getentitylist') }}",
                success: function(data) {

                    $.each(data, function(a, b) {
                        $("#entity").append(
                            '<option value="' + b.id + '">' + b.entityname + '</option>'
                        );

                    });
                    $('#loaderpage').hide();

                    $("#entity").selectpicker("refresh");

                }
            });
            $('#ballottype').on('change', function() {
                var ballottype = $("#ballottype").val();
                $("#ballot_type").val(ballottype);


                if (ballottype == 1) {
                    $('#canddiv1').show();
                    $('#canddiv2').hide();


                }
                if (ballottype == 2) {
                    $('#canddiv2').show();
                    $('#canddiv1').hide();
                }
                if (ballottype == 3) {
                    $('#canddiv1').show();
                    $('#canddiv2').hide();

                }
                if (ballottype == 4) {
                    $('#canddiv2').show();
                    $('#canddiv1').hide();

                }
                if (ballottype == 5) {

                }



            });
            $('#entity').on('change', function() {
                var id = $("#entity").val();
                $('#loaderpage').show();

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ Route('getsingleentity') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        //console.log(data);

                        $("#entity_id").val(data.id);

                        draw_entity_table(data);

                    }

                });
                $('#loaderpage').hide();

            });

            function draw_entity_table(data) {
                $('.entitytable_class').show();
                $(".entityidlabel_class").text(data.entityid);
                $(".entitynamelabel_class").text(data.entityname);
                $(".regdatelabel_class").text(data.dateofreg);
                $(".mobilelabel_class").text(data.mobno);
                $(".emaillabel_class").text(data.email);
                $(".citylabel_class").text(data.city1);
                $("#preview_entityname").text(data.entityname);
            }

            $('.check_time_class').on('change', function() {
                check_time_diff();
            });

            function check_time_diff() {

                var start_time = $("#votestartdate").val() + ' ' + $("#votestarttime").val();
                var end_time = $("#voteenddate").val() + ' ' + $("#voteendtime").val();
                var start_time_sec = new Date(start_time).getTime();
                var end_time_sec = new Date(end_time).getTime();
                var current_time_sec = new Date($("#current_datettime").val()).getTime();


                if (start_time_sec > end_time_sec || current_time_sec > end_time_sec) {
                    $("#voteenddate").val($("#votestartdate").val());
                    $("#voteendtime").val($("#votestarttime").val());

                }
                if (current_time_sec > start_time_sec) {
                    $("#votestarttime").val($("#currenttime").val());
                }


            }

            $('#votingtype').on('change', function() {
                var type = $("#votingtype").val();
                if (type == 'Public') {
                    $('#publictypemodal').modal('show');
                }
            });
            $('.backbutton').on('click', function() {
                $('#votingtype').val('Private');
                $("#votingtype").selectpicker('refresh');

            });
            $(".selectpicker").selectpicker();

            $('#open_master_model').on('click', function() {
                $("#position_name").val('');
                $('#position_master_model').modal('show');
                get_election_position();

            });

            $('#add_position').on('click', function() {
                if ($("#position_name").val()) {
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: "{{ Route('add_position_election') }}",
                        data: {
                            election_id: $("#election_id").val(),
                            position: $("#position_name").val()
                        },
                        success: function(data) {
                            if (data == 0) {
                                $("#position_name_mainlabel").show();

                                $("#position_name_label").text(
                                "This position is already exist");
                                return;
                            }
                            $("#position_name").val('');
                            $("#position_name_mainlabel").hide();
                            get_election_position();





                        }
                    })
                } else {
                    $("#position_name_mainlabel").show();

                    $("#position_name_label").text("This field is required");

                }


            });



            function get_election_position() {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ Route('get_position_election') }}",
                    data: {
                        election_id: $("#election_id").val(),
                        position: $("#position_name").val()
                    },
                    success: function(data) {
                        $("#positiontablerow").empty();
                        $("#cand_pos1").empty();
                        $("#cand_pos2").empty();
                        $("#cand_pos12").empty();
                        $("#cand_pos22").empty();

                        $.each(data, function(a, b) {
                            $("#positiontablerow").append(
                                '<tr><td>' + b.position +
                                '</td><td><button class="modal-effect btn btn-danger btn-sm rounded-circle deleteposition"  id="' +
                                b.id +
                                '" data-toggle="tooltip-danger" title="Delete Record" data-placement="top"><i class="fas fa-trash"></i></button></td></tr>'
                            );
                            $("#cand_pos1").append(
                                '<option value="' + b.id + '">' + b.position + '</option>'
                            );
                            $("#cand_pos2").append(
                                '<option value="' + b.id + '">' + b.position + '</option>'
                            );
                            $("#cand_pos12").append(
                                '<option value="' + b.id + '">' + b.position + '</option>'
                            );
                            $("#cand_pos22").append(
                                '<option value="' + b.id + '">' + b.position + '</option>'
                            );
                        });


                        $("#cand_pos1").selectpicker('refresh');
                        $("#cand_pos2").selectpicker('refresh');
                        $("#cand_pos12").selectpicker('refresh');
                        $("#cand_pos22").selectpicker('refresh');
                    }
                })
            }


            $('#position_table').on('click', '.deleteposition', function() {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ Route('delete_position_election') }}",
                    data: {
                        election_id: $("#election_id").val(),
                        id: $(this).attr('id')
                    },
                    success: function(data) {
                        get_election_position();

                    }
                })

            });

            $('#open_groupname_model').on('click', function() {
                $('#open_groupname_master_model').modal('show');
                get_groupname_election();


            });

            function get_groupname_election() {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ Route('get_groupname_election') }}",
                    data: {
                        election_id: $("#election_id").val()
                    },
                    success: function(data) {
                        $("#group_name").val('');

                        $("#cand_group_name1").empty();
                        $("#cand_group_name12").empty();
                        $("#groupnametablerow").empty();
                        $.each(data, function(a, b) {
                            $("#groupnametablerow").append(
                                '<tr><td>' + b.group_name +
                                '</td><td><button class="modal-effect btn btn-danger btn-sm rounded-circle deletegroupname"  id="' +
                                b.id +
                                '" data-toggle="tooltip-danger" title="Delete Record" data-placement="top"><i class="fas fa-trash"></i></button></td></tr>'
                            );
                            $("#cand_group_name1").append(
                                '<option value="' + b.id + '">' + b.group_name + '</option>'
                            );
                            $("#cand_group_name12").append(
                                '<option value="' + b.id + '">' + b.group_name + '</option>'
                            );
                        });

                        $("#cand_group_name1").selectpicker('refresh');
                        $("#cand_group_name12").selectpicker('refresh');

                    }
                })
            }

            $("#group_name_mainlabel").hide();


            $('#add_groupname').on('click', function() {
                if ($("#group_name").val()) {


                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: "{{ Route('add_groupname_election') }}",
                        data: {
                            election_id: $("#election_id").val(),
                            group_name: $("#group_name").val()
                        },
                        success: function(data) {
                            $("#group_name_mainlabel").hide();

                            get_groupname_election();

                        }
                    })
                } else {
                    $("#group_name_mainlabel").show();

                    $("#group_name_label").text("This field is required");
                }

            });

            $('#groupnametable').on('click', '.deletegroupname', function() {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ Route('delete_groupname_election') }}",
                    data: {
                        election_id: $("#election_id").val(),
                        id: $(this).attr('id')
                    },
                    success: function(data) {

                        get_groupname_election();
                    }
                })

            });

            $('#svsp_election_candidate_table').on('click', '.deletesvsp_candidate', function() {
                $('#loaderpage').show();

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ Route('deletesvsp_candidate') }}",
                    data: {
                        id: $(this).attr('id'),
                        election_id: $("#add_svsp_election_id").val()
                    },
                    success: function(data) {
                        //console.table(data);

                        ballot_preview(data);
                        $('#loaderpage').hide();
                    }
                });
            })

            $('#svsp_election_candidate_table').on('click', '.editsvsp_candidate', function() {
                $('#loaderpage').show();
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ Route('editsvsp_candidate') }}",
                    data: {
                        id: $(this).attr('id'),
                        election_id: $("#add_svsp_election_id").val()
                    },
                    success: function(data) {
                        $("#editsvsp_model").modal('show');
                        //	console.log(data);
                        $('#svsp_editid').val(data.c.id);
                        $('#edit_election_id').val(data.c.election_id);

                        $("#cand_id_no12").val(data.c.candidate_id_no);
                        $("#cand_id_name12").val(data.c.candidate_name);
                        $("#cand_info12").val(data.c.candidate_info);
                        $("#cand_group_name12").val(data.c.group_name);
                        $("#editcandidatephoto_label").text(data.c.candidate_photo);
                        $("#editelectionsymbol_label").text(data.c.candidate_election_symbol);
                        $("#editbiodata_label").text(data.c.candidate_biodata);
                        $("#cand_photo12_name").val(data.c.candidate_photo);
                        $("#cand_electsym12_name").val(data.c.candidate_election_symbol);
                        $("#cand_biodata12_name").val(data.c.candidate_biodata);
                        $("#ballot_type2").val(data.c.ballottype);

                        if (data.c.ballottype == 1 || data.c.ballottype == 3) {
                            console.log('ballot 1 and 3');
                            $("#canddiv12").show();
                            $("#canddiv22").hide();
                            $("#cand_pos12").val(data.position.position_name);

                        }
                        if (data.c.ballottype == 2 || data.c.ballottype == 4) {
                            $("#canddiv12").hide();
                            $("#canddiv22").show();

                        }

                        $('#loaderpage').hide();

                    }
                });
            })


            function ballot_preview(data) {
                $("#ballottype").removeClass('disabled');

                if (data.length > 0) {
                    $("#ballottype").addClass('disabled');
                    $("#svsp_candidate_length_error").text('');
                }
                $("#svsp_candidate_length").val(data.length);
                $("#svsp_election_candidate_row").empty();
                $("#election_candidate_preview").empty();
                $.each(data, function(a, b) {
                    $("#svsp_election_candidate_row").append(
                        '<tr><td>' + b.candidate_id_no + '</td><td>' + b.candidate_name + '</td><td>' +
                        b.candidate_info + '</td><td>' + b.position +
                        '</td><td><img class="election_candidate_images" src="{{ asset('public/election/svsp_election') }}/' +
                        b.candidate_photo +
                        '"></td><td><img class="election_candidate_images" src="{{ asset('public/election/svsp_election') }}/' +
                        b.candidate_election_symbol + '"></td><td>' + b.group_name +
                        '</td><td><button class="btn btn-primary btn-sm rounded-circle editsvsp_candidate tooltip2" data-toggle="modal" data-effect="effect-sign" id="' +
                        b.id +
                        '" ><span class="tooltiptext2">Edit Record</span> <i class="fas fa-edit"></i></button> <button class="btn btn-danger btn-sm rounded-circle deletesvsp_candidate tooltip2"  id="' +
                        b.id +
                        '"><span class="tooltiptext2">Delete Record</span> <i class="fas fa-trash"></i></button> </td></tr>'
                    );

                    $("#election_candidate_preview").append(
                        '<tr class="pd-t-4">                  <td style=" border-top:1px solid  #dee2e6;" >' +
                        b.candidate_id_no +
                        '</td>                  <td  style=" border-top:1px solid  #dee2e6;"> <b>' + b
                        .candidate_name + '</b><p>' + b.candidate_info +
                        '</p></td>                  <td style=" border-top:1px solid  #dee2e6;" ">' + b
                        .position +
                        '</td>                  <td style=" border-top:1px solid  #dee2e6;" ><img src="{{ asset('public/election/svsp_election') }}/' +
                        b.candidate_photo +
                        '"  alt=""></td>                  <td style=" border-top:1px solid  #dee2e6;" >' +
                        b.group_name +
                        '</td>                  <td style=" border-top:1px solid  #dee2e6;" ><img src="{{ asset('public/election/svsp_election') }}/' +
                        b.candidate_election_symbol +
                        '"  alt=""></td> <td style=" padding-left:25px;padding-top:25px;"><a href="{{ asset('public/election/svsp_election') }}/' +
                        b.candidate_biodata +
                        '" class="tx-primary tooltip2" target="_blank" download><span class="tooltiptext2">Download Biodata</span><i class="fas fa-download"></i></a></td>               </tr> '
                        );
                });
            }

            $('#svsp_editform').submit(function(e) {
                $('#loaderpage').show();
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'post',
                    url: "{{ url('insert_election_candidate') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(data) {

                        if (data == 0) {
                            $("#candidate_mainlabel2").text("This candidate id already exist");
                            $('#loaderpage').hide();
                            return;
                        }
                        $("#svsp_editform")[0].reset();
                        $('#editcandidatephoto_label').text("Choose File");
                        $('#editelectionsymbol_label').text("Choose File");
                        $('#editbiodata_label').text("Choose File");
                        $("#cand_pos2").selectpicker('refresh');

                        $('#editsvsp_model').modal('hide');


                        ballot_preview(data);
                        $('#loaderpage').hide();
                    }
                });
            });

            $('#add_svsp_election_form').submit(function(e) {
                $('#loaderpage').show();
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'post',
                    url: "{{ url('insert_election_candidate') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(data) {
                        //console.table(data);
                        if (data == 0) {
                            $("#candidate_mainlabel").text("This candidate id already exist");
                            $('#loaderpage').hide();
                            return;
                        }
                        $("#add_svsp_election_form")[0].reset();
                        $('#candidate_photo_label').text("Choose File");
                        $('#candidate_election_symbol_label').text("Choose File");
                        $('#candidate_biodata_label').text("Choose File");
                        $("#candidate_mainlabel").text('');
                        $("#cand_pos2").selectpicker('refresh');


                        ballot_preview(data);
                        $('#loaderpage').hide();
                    }
                });
            });

            $("#cand_photo1").change(function() {
                var fullPath = $("#cand_photo1").val();
                var filename = fullPath.replace(/^.*[\\\/]/, '');
                var extention = filename.split('.').pop();
                $('#candidate_photo_label').text(filename);
            });
            $("#cand_electsym1").change(function() {
                var fullPath = $("#cand_electsym1").val();
                var filename = fullPath.replace(/^.*[\\\/]/, '');
                var extention = filename.split('.').pop();

                $('#candidate_election_symbol_label').text(filename);
            });
            $("#cand_biodata1").change(function() {
                var fullPath = $("#cand_biodata1").val();
                var filename = fullPath.replace(/^.*[\\\/]/, '');
                var extention = filename.split('.').pop();

                $('#candidate_biodata_label').text(filename);
            });


            $("#cand_photo12").change(function() {
                var fullPath = $("#cand_photo12").val();
                var filename = fullPath.replace(/^.*[\\\/]/, '');
                var extention = filename.split('.').pop();
                $('#editcandidatephoto_label').text(filename);
            });
            $("#cand_electsym12").change(function() {
                var fullPath = $("#cand_electsym12").val();
                var filename = fullPath.replace(/^.*[\\\/]/, '');
                var extention = filename.split('.').pop();

                $('#editelectionsymbol_label').text(filename);
            });
            $("#cand_biodata12").change(function() {
                var fullPath = $("#cand_biodata12").val();
                var filename = fullPath.replace(/^.*[\\\/]/, '');
                var extention = filename.split('.').pop();

                $('#editbiodata_label').text(filename);
            });



            $('.select2-show-search').select2({
                minimumResultsForSearch: ''
            });


            $("#voterlist").change(function(evt) {

                var selectedFile = evt.target.files[0];
                var extension = selectedFile.name.replace(/^.*\./, '');
                if (extension == 'xlsx' || extension == 'csv') {

                    // $('#upload_file').removeClass('disabled');
                    $("#fileextension_error").hide();
                    $('#election_voterfile_upload').click(function() {
                        $('#voterlistloader').show();
                        if (this.id == 'election_voterfile_upload') {
                            var reader = new FileReader();
                            reader.onload = function(event) {
                                var data = event.target.result;

                                var workbook = XLSX.read(data, {
                                    type: 'binary'
                                });
                                workbook.SheetNames.forEach(function(sheetName) {
                                    var XL_row_object = XLSX.utils
                                        .sheet_to_row_object_array(workbook.Sheets[
                                            sheetName]);

                                    if (XL_row_object.length > 0) {
                                        $("#file_ampty").text('');

                                        var array_name = [];

                                        $.each(XL_row_object, function(a, b) {
                                            // console.log(b);
                                            var ans = {

                                                entityid: $("#entity_id")
                                                    .val(),
                                                parent_id: $(
                                                    "#electionidvoterlist"
                                                    ).val(),
                                                type: 'election',
                                                memname: b.membername,
                                                member_id_no: b
                                                    .member_id_no,
                                                email: b.email,
                                                mobno: b.mobno,
                                                additional_info: b
                                                    .additional_info,
                                            }
                                            array_name.push(ans);

                                        })

                                        $.ajax({
                                            type: "POST",
                                            url: "{{ url('insertelectionvoteruserlist') }}",
                                            processData: true,
                                            data: {
                                                XL_row_object: JSON.stringify(
                                                    array_name),
                                                parent_id: $(
                                                        "#electionidvoterlist")
                                                    .val(),
                                            },
                                            dataType: 'json',
                                            success: function(data) {

                                                make_table(data);
                                                $('#voterlistloader')
                                            .hide();

                                            }
                                        });

                                    } else {
                                        $("#file_ampty").text('file is empty');
                                        $("#loader").hide();
                                        $('#voterlistloader').hide();

                                        return;
                                    }


                                })

                            };
                            reader.onerror = function(event) {
                                console.error("File could not be read! Code " + event.target
                                    .error.code);
                            };

                            reader.readAsBinaryString(selectedFile);
                        } else {
                            console.log('wait');
                        }
                    });


                } else {
                    $("#fileextension_error").show();
                    $("#fileextension_error").text("Please choose XLSX or CSV file to upload");
                }
            });

            $('body').on('click', '#print_button', function() {
                $("#print_button").css("display", "none");

                var printContents = document.getElementById('print_area').innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
                $("#print_button").css("display", "");

            })
        });
    </script>
@stop
