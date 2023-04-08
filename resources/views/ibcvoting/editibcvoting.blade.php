@extends('layout')
@section('content')
<div id="snackbarsuccess">   
	<div class="row">
		
		<div class="col-md-12">
			<strong>Success!</strong> IBC Voting Updated Successfully.
		</div>  		


	</div>
</div>


<div class="slim-mainpanel">
	<div class="container">
		<div class="slim-pageheader">
			<ol class="breadcrumb slim-breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('addedibc')}}">IBC Voting</a></li>
				<li class="breadcrumb-item">Add IBC Voting</li>
			</ol>
			<h6 class="slim-pagetitle">Edit IBC Voting</h6>
		</div><!-- slim-pageheader -->
		<input type="hidden" id="createpollid" value="{{$singledata['id']}}"> 

		<div class="section-wrapper mg-t-5">
			
			<div id="wizard2">

				<h3>Create Poll</h3>
				<section>
					<div class="table-wrapper">
						<table id="entitytable" class="table display responsive nowrap">
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
							<tbody id="entitylabelrow" >
								<td class="text-danger"><span id="entityidlabel"> </span></td>
								<td class="text-danger"><span id="entitynamelabel"> </span></td>
								<td class="text-danger"><span id="regdatelabel"> </span></td>
								<td class="text-danger"><span id="mobilelabel"> </span></td>
								<td class="text-danger"><span id="emaillabel"> </span></td>
								<td class="text-danger"><span id="citylabel"> </span></td>
							</tbody>
						</table>
					</div>
					<h5 class="text-primary pt-2"><span id="ibcidlabel4"> </span></h5>
					<input type="hidden" id="entitytypeedit" value="{{$singledata['entity']}}">
					@php
					date("h:i:s");
					$date = Carbon::now(('Asia/Kolkata'));
					$current_time=$date->toTimeString();

					@endphp
					<input type="hidden" value="{{date('Y-m-d')}} {{$current_time}}" id="current_datettime">
					<input type="hidden" value="{{$current_time}}" id="currenttime">

					<div class="row pt-2">
						<div class="col-lg-4">
							<input type="hidden" value="0" id="createpollsubmit"> 
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Select Entity <span class="tx-danger">*</span></label>
								<select class="form-control select2-show-search" data-placeholder="Choose Entity" required="" name="entity" id="entity" >
									<option value="" >Select Entity</option>	
									<option selected="" value="{{$entitydata['id']}}">{{$entitydata['entityname']}}</option>

								</select>
							</div>
						</div><!-- col-4 -->
						<div class="col-lg-4">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Select Voting Type <span class="tx-danger">*</span></label>
								<select class="form-control selectpicker" data-placeholder="Choose country" required="" name="votingtype" id="votingtype">
									<option value="{{$singledata['votingtype']}}" selected="">{{$singledata['votingtype']}}</option>
									<option value="Private" selected="">Private</option>
									<option value="Public">Public</option>

								</select>
							</div>
						</div><!-- col-4 -->
						
					</div>          <div class="row">
						<div class="col-lg-4">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Voting Title <span class="tx-danger">*</span></label>
								<input class="form-control" placeholder="Enter Voting Title" name="votingtitle" id="votingtitle" value="{{$singledata['votingtitle']}}"  type="text" required="">

							</div>
						</div><!-- col-4 --> 
						<div class="col-lg-2">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Voting Start Date <span class="tx-danger">*</span></label>
								<input id="votestartdate" value="{{$singledata['votestartdate']}}"  class="form-control check_time_class" name="votestartdate"  type="date" required="">

							</div>
						</div><!-- col-4 -->
						<div class="col-lg-2">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Voting Start Time<span class="tx-danger">*</span></label>
								<input id="votestarttime" value="{{$singledata['votestarttime']}}" class="form-control check_time_class" name="votestarttime"  type="time"  required="">

							</div>
						</div><!-- col-4 -->          
						<div class="col-lg-2">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Voting End Date <span class="tx-danger">*</span></label>
								<input id="voteenddate" value="{{$singledata['voteenddate']}}" min="{{date('Y-m-d')}}" class="form-control check_time_class" name="voteenddate"  type="date" required="">

							</div>
						</div><!-- col-4 -->  
						<div class="col-lg-2">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Voting End Time <span class="tx-danger">*</span></label>
								<input id="voteendtime" value="{{$singledata['voteendtime']}}" class="form-control check_time_class" name="voteendtime"  type="time" required="">

							</div>
						</div><!-- col-4 -->  

					</div>


					<div class="row">
						
						<div class="col-lg-4">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Meeting Title <span class="tx-danger">*</span></label>
								<input id="meetingtitle" value="{{$singledata['meetingtitle']}}" class="form-control" name="meetingtitle"  type="text" required="" placeholder="Enter Meeting Title">

							</div>
						</div><!-- col-4 --><div class="col-lg-4">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Meeting Date <span class="tx-danger">*</span></label>
								<input id="meetingdate" value="{{$singledata['meetingdate']}}" class="form-control" name="meetingdate"  type="date" required="">

							</div>
						</div><!-- col-4 -->

					</div>       


				</section>
				<h3>Upload Voter Data </h3>
				<section>
					<input type="hidden" id="checkvoterlistadded" required="">
					<div class="table-wrapper">
						<table id="entitytable2" class="table display responsive nowrap">
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
							<tbody id="entitylabelrow" >
								<td class="text-danger"><span id="entityidlabel2"> </span></td>
								<td class="text-danger"><span id="entitynamelabel2"> </span></td>
								<td class="text-danger"><span id="regdatelabel2"> </span></td>
								<td class="text-danger"><span id="mobilelabel2"> </span></td>
								<td class="text-danger"><span id="emaillabel2"> </span></td>
								<td class="text-danger"><span id="citylabel2"> </span></td>
							</tbody>
						</table>
					</div>
					<h5 class="text-primary"><span id="ibcidlabel1"></span></h5>

					<div class="row pt-2">

						<div class="col-lg-4">
							
							<input type="hidden" id="entity_id" name="entity_id" value="{{$singledata['entity']}}">
							<input type="hidden" id="voterlist_length">

							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Upload Voter Data <span class="tx-danger">*</span></label>
								<div class="row">
									<div class="col-md-8">
										<div class="custom-file">

											<input type="hidden" id="resolutionidvoterlist" name="resolutionidvoterlist" value="{{$singledata['id']}}">
											<input type="file" class="custom-file-input" id="voterlist" name="voterlist" required="">

											<label class="custom-file-label custom-file-label-primary" for="customFile" id="voterlistfilelabel">Choose file</label>
											<p id="voterlist_length_error" class="text-danger tx-12"></p>

										</div><!-- custom-file -->
									</div>
									<div class="col-md-4">
										<div class="form-group mg-b-10-force ">
											<button type="submit" id="election_voterfile_upload" class="bt btn-primary" style="padding:10px 8px 7px 10px; "><i class="fas fa-upload"></i> &nbsp;&nbsp;Upload</button>
										</div>

									</div>
								</div>

								<b><label class="text-danger tx-12" id="selectxlsx"></label></b>
								<b><label class="text-danger tx-12" id="file_ampty"></label></b>
							</div>
							
						</div><!-- col-4 -->
						<div class="col-lg-2 ">
							<div class="form-group mg-b-10-force pt-4" style="margin-top: 3px;">
								<a href="{{asset('public/excel_file/ibc_voterlistdatafile.xlsx')}}" class="text-primary pt-4"  download=""><i class="fas fa-upload"></i> &nbsp;Voterlist Format</a>
							</div>
						</div><!-- col-4 -->
						<div class="col-lg-2">
							<div class="form-group mg-b-10-force pt-4" style="margin-top: 3px;margin-left: -50px;">
								<button class="btn btn-danger " id="removefile"><i class="fas fa-minus-circle"></i> &nbsp;&nbsp;Delete All Data</button>
							</div>
						</div><!-- col-4 -->
						<div class="col-lg-2">
							<div class="form-group mg-b-10-force pt-4" style="margin-top: 3px;margin-left: -50px;">
								<button class="btn btn-success " id="addsinglevoter"><i class="fas fa-plus-circle"></i> &nbsp;&nbsp;Add Voter User</button>
							</div>
						</div><!-- col-4 -->

					</div>
					<div class="progress" id="progressbar">
						<div class="progress-bar progress-bar-striped active" style="min-width: 20px;"></div>
					</div>

					<div class="row pt-2">

						<div class="col-lg-12 ">
							<div class="table-wrapper">
								<table id="voterlisttable" class="table display responsive nowrap">
									<thead>
										<tr>
											<th class="wd-10p">ORG Name</th>
											<th class="wd-15p">Member Name</th>
											<th class="wd-25p">Member Share(INR Amount)</th>
											<th class="wd-20p">Email</th>
											<th class="wd-10p">Mobile No</th>
											<th class="wd-10p">Ratio</th>
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
				<h3>Add List Of Resolution</h3>
				<section>
					<div class="table-wrapper">
						<table id="entitytable3" class="table display responsive nowrap">
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
							<tbody id="entitylabelrow" >
								<td class="text-danger"><span id="entityidlabel3"> </span></td>
								<td class="text-danger"><span id="entitynamelabel3"> </span></td>
								<td class="text-danger"><span id="regdatelabel3"> </span></td>
								<td class="text-danger"><span id="mobilelabel3"> </span></td>
								<td class="text-danger"><span id="emaillabel3"> </span></td>
								<td class="text-danger"><span id="citylabel3"> </span></td>
							</tbody>
						</table>
					</div>
					<h5 class="text-primary"><span id="ibcidlabel2"></span></h5>


					<form method="POST" enctype="multipart/form-data" id="resolutionform" action="javascript:void(0)">
						<input type="hidden" name="createpollid2" value="{{$singledata['id']}}" id="createpollid2"> 
						<input type="hidden" id="resorder" name="resorder" value="1">
						<input type="hidden" id="resorder1" name="resorder1">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group mg-b-10-force">
									<label class="form-control-label">Resolution Description <span class="tx-danger">*</span></label>
									<textarea class="form-control" placeholder="Enter Description" name="resdescription" id="resdescription" cols="15" rows="3"></textarea>

								</div>
							</div><!-- col-4 -->
							<div class="col-lg-4">
								<div class="form-group mg-b-10-force">
									<label class="form-control-label">Resolution Details</label>
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="resolutiondetail" id="resolutiondetail">
										<label class="custom-file-label custom-file-label-primary" for="customFile" id="resolutiondetaillabel">Choose file</label>
									</div><!-- custom-file -->

								</div>
							</div><!-- col-4 -->
							<div class="col-lg-2 ">
								<div class="form-group mg-b-10-force pt-4" style="margin-top: 3px;">
									<button type="submit" class="btn btn-primary " id="resolutionformbutton"><i class="fa fa-plus"></i> &nbsp;&nbsp;Add</button>
								</div>
							</div><!-- col-4 -->



						</div>
					</form>
					<div class="row pt-2">

						<div class="col-lg-12 ">
							<div class="table-wrapper">
								<table id="resolutiontable" class="table display responsive nowrap">
									<thead>
										<tr>
											<th></th>
											<th class="wd-10p">SN</th>
											<th class="wd-350p">Resolution Description</th>
											<th class="wd-25p">Resolution Details</th>

											<th class="wd-30p">Action</th>

										</tr>
									</thead>
									<tbody id="resolutiontablerow">



									</tbody>
								</table>
							</div>
						</div><!-- col-4 -->

					</div>
				</section>
				<h3>Billing</h3>
				<section>
					<div class="table-wrapper">
						<table id="entitytable4" class="table display responsive nowrap">
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
							<tbody id="entitylabelrow" >
								<td class="text-danger"><span id="entityidlabel4"> </span></td>
								<td class="text-danger"><span id="entitynamelabel4"> </span></td>
								<td class="text-danger"><span id="regdatelabel4"> </span></td>
								<td class="text-danger"><span id="mobilelabel4"> </span></td>
								<td class="text-danger"><span id="emaillabel4"> </span></td>
								<td class="text-danger"><span id="citylabel4"> </span></td>
							</tbody>
						</table>
					</div>
					<h5 class="text-primary"><span id="ibcidlabel3"></span></h5>
					<div class="row pt-2">
						<div class="col-lg-1">
							<label >
								<span> <strong>Result :</strong></span>
							</label>
						</div>
						<input type="hidden" id="resulttype" value="{{$singledata->resulttype}}">
						<div class="col-lg-3 ">
							<div class="row">
								<div class="col-lg-1 pt-1">
									<input name="resultype" class="rd" id="yn" type="radio" value="yn">
								</div>
								<div class="col-lg-8"><label for="yn">Yes / No /Abstained
								</label></div>
							</div>								

						</div><!-- col-3 -->
						<div class="col-lg-3 ">
							<div class="row">
								<div class="col-lg-1 pt-1">
									<input name="resultype" class="rd" id="ad" type="radio" value="ad">
								</div>
								<div class="col-lg-10"><label for="ad">Favour / Against / Abstained
								</label></div>
							</div>								

						</div><!-- col-3 -->
						<div class="col-lg-3 ">
							<div class="row">
								<div class="col-lg-1 pt-1">
									<input name="resultype" class="rd" id="ar" type="radio" value="ar" >
								</div>
								<div class="col-lg-8"><label for="ar" >Accept / Reject / Abstained
								</label></div>
							</div>								

						</div><!-- col-3 -->

					</div>
				</section>
				<h3>Success </h3>
				<section>
					<h3 class="text-center">Your Poll Has Been Updated Successfully!</h3>
				</section>

			</div>
		</div><!-- section-wrapper -->
	</div><!-- container -->
</div><!-- slim-mainpanel -->
<div id="editresolutionmodal" class="modal fade ">
	<input type="hidden" id="updateresolutionid">
	<div class="modal-dialog modal-dialog-vertical-center" role="document">
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
							<label class="form-control-label">Resolution Description<span class="tx-danger">*</span></label>
							<input class="form-control"  placeholder="Enter Resolution Description" name="resoutiondescriptionmodel" id="resoutiondescriptionmodel"  type="text" required="">

						</div>
					</div><!-- col-4 --> 
					<div class="col-lg-4">
						<div class="form-group mg-b-10-force">
							<label class="form-control-label">Resolution Detail <span class="tx-danger">*</span></label>
							<input class="form-control"  name="voterlistmemname"  type="text" required="">

						</div>
					</div><!-- col-4 --> 
					
				</div>			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger updatevoterlistrecord" data-dismiss="modal"><i class="fas fa-upload"></i>&nbsp;Update</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i>&nbsp;Cancel</button>
			</div>
		</div>
	</div><!-- modal-dialog -->
</div><!-- modal -->


<div id="editmodal" class="modal fade ">
	<input type="hidden" id="updatevoterlistid">
	<div class="modal-dialog modal-dialog-vertical-center" role="document">
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
							<label class="form-control-label">Org Name <span class="tx-danger">*</span></label>
							<input class="form-control"  placeholder="Enter Org Name" name="voterlistorgname" id="voterlistorgname"  type="text" required="">

						</div>
					</div><!-- col-4 --> 
					<div class="col-lg-4">
						<div class="form-group mg-b-10-force">
							<label class="form-control-label">Member Name <span class="tx-danger">*</span></label>
							<input class="form-control" placeholder="Enter Member Name" name="voterlistmemname" id="voterlistmemname"  type="text" required="">

						</div>
					</div><!-- col-4 --> 
					<div class="col-lg-4">
						<div class="form-group mg-b-10-force">
							<label class="form-control-label">Member Share <span class="tx-danger">*</span></label>
							<input class="form-control" placeholder="Enter Member Share" name="voterlistmembershare" id="voterlistmembershare"  type="number" required="">

						</div>
					</div><!-- col-4 --> 
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group mg-b-10-force">
							<label class="form-control-label">Email <span class="tx-danger">*</span></label>
							<input class="form-control" value="" placeholder="Enter Email" name="voterlistemail" id="voterlistemail"  type="email" required="">

						</div>
					</div><!-- col-4 --> 
					<div class="col-lg-4">
						<div class="form-group mg-b-10-force">
							<label class="form-control-label">MObile No<span class="tx-danger">*</span></label>
							<input class="form-control" placeholder="Enter Mobile No" name="voterlistmobno" id="voterlistmobno"  type="number" required="">

						</div>
					</div><!-- col-4 --> 
					<div class="col-lg-4">
						<div class="form-group mg-b-10-force">
							<label class="form-control-label">Ratio <span class="tx-danger">*</span></label>
							<input class="form-control" placeholder="Enter Ratio" name="voterlistratio" id="voterlistratio"  type="text" required="">

						</div>
					</div><!-- col-4 --> 
				</div>			
			</div>
			<div class="modal-footer">
				<button type="button"  id="updatevoter" class="btn btn-danger updatevoterlistrecord" data-dismiss="modal"><i class="fas fa-upload"></i>&nbsp;Update</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i>&nbsp;Cancel</button>
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
					<h5 class="lh-3 tx-inverse">You have selected PUBLIC POLL, This will make the poll open for all other than the voter list. Are you sure you want to continue with PUBLIC POLL.
					</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-check"></i>&nbsp;Continue</button>
					<button type="button" class="btn btn-secondary backbutton" data-dismiss="modal"><i class="fas fa-ban"></i>&nbsp;Back</button>
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
						<h5 class="lh-3 tx-inverse">Past Time Not Allowed.Please Choose Current Or Future Time.
						</h5>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary backbutton" data-dismiss="modal"><i class="fas fa-ban"></i>&nbsp;Back</button>
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
		<div class="loaderpage" id="voterlisteditloader">
			<div class="loadingspinner">
				<div id="square1"></div>
				<div id="square2"></div>
				<div id="square3"></div>
				<div id="square4"></div>
				<div id="square5"></div>
			</div>
			<p class="loaderp">
				Just sit back and relax. we are getting your data.
			</p>
		</div>


<div id="insertmodal" class="modal fade ">
	<div class="modal-dialog modal-dialog-vertical-center" role="document">
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
							<label class="form-control-label">Organization name <span class="tx-danger">*</span></label>
							<input class="form-control" placeholder="Org Name" name="orgname2" id="orgname2" type="text" required="">

						</div>
					</div><!-- col-4 -->
				
					<div class="col-lg-4">
						<div class="form-group mg-b-10-force">
							<label class="form-control-label">Member Name <span class="tx-danger">*</span></label>
							<input class="form-control" placeholder="Enter Member Name" name="voterlistmemname2" id="voterlistmemname2" type="text" required="">

						</div>
					</div><!-- col-4 -->
					<div class="col-lg-4">
						<div class="form-group mg-b-10-force">
							<label class="form-control-label">Member Share <span class="tx-danger">*</span></label>
							<input class="form-control" placeholder="Enter Member Share" name="membershare2" id="membershare2" type="text" required="">

						</div>
					</div><!-- col-4 -->


					<div class="col-lg-4">
						<div class="form-group mg-b-10-force">
							<label class="form-control-label">Email <span class="tx-danger">*</span></label>
							<input class="form-control" value="" placeholder="Enter Email" name="voterlistemail2" id="voterlistemail2" type="email" required="">

						</div>
					</div><!-- col-4 -->
					<div class="col-lg-4">
						<div class="form-group mg-b-10-force">
							<label class="form-control-label">Mobile No<span class="tx-danger">*</span></label>
							<input class="form-control" placeholder="Enter Mobile No" name="voterlistmobno2" id="voterlistmobno2" type="number" required="">

						</div>
					</div><!-- col-4 -->
						<div class="col-lg-4">
						<div class="form-group mg-b-10-force">
							<label class="form-control-label">Ratio<span class="tx-danger">*</span></label>
							<input class="form-control" placeholder="Enter ratio" name="ratio2" id="ratio2" type="number" required="">

						</div>
					</div><!-- col-4 -->
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="insertvoter" class="btn btn-success updatevoterlistrecord" data-dismiss="modal"><i class="fas fa-plus"></i>&nbsp;Add</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i>&nbsp;Cancel</button>
			</div>
		</div>
	</div><!-- modal-dialog -->
</div><!-- modal -->

		@stop
		@section('js')
		<script src="{{asset('public/js/simpleUpload.min.js')}}"></script>

		<script>
			$( document ).ready(function(e) {

				var checkresulttype=$('#resulttype').val();
				$('#'+checkresulttype).attr('checked', 'checked');

				$('#voterlistloader').hide();
				$('#voterlisteditloader').hide();


				$.ajax({
					type:"GET",
					dataType: "json",
					url: "{{Route('getentitylist')}}",
					success : function(data) {

						$.each(data, function (a, b) {   
							$("#entity").append(
								'<option value="'+b.id+'">'+b.entityname+'</option>'
								);

						});
						$('#loaderpage').hide();

						$("#entity").selectpicker("refresh");

					}
				});
				$('#ibcvotingtab').addClass('active');
				$('#loaderpage').hide();
				$('#progressbar').hide();

				$('#entitytable').hide();
				$('#entitytable2').hide();
				$('#entitytable3').hide();
				$('#entitytable4').hide();
				var currentime;
				var endtime;
				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
				

				$('#wizard2').steps({
					headerTag: 'h3',
					bodyTag: 'section',
					autoFocus: true,
					titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
					onStepChanging: function (event, currentIndex, newIndex) {
						if(currentIndex < newIndex) {
              // Step 1 form validation
              if(currentIndex === 0) {
              	var votingtype = $('#votingtype').parsley();
              	var entity = $('#entity').parsley();
              	var votingtitle = $('#votingtitle').parsley();
              	//alert(votingtitle);
              	var votestartdate = $('#votestartdate').parsley();
              	var voteenddate = $('#voteenddate').parsley();
              	var votestarttime = $('#votestarttime').parsley();
              	var voteendtime = $('#voteendtime').parsley();
              	var meetingdate = $('#meetingdate').parsley();
              	var meetingtitle = $('#meetingtitle').parsley();

              	if(votingtitle.isValid() && entity.isValid() && votestartdate.isValid() && voteenddate.isValid() && votestarttime.isValid() && voteendtime.isValid() && meetingdate.isValid() && votingtitle.isValid() &&  votingtype.isValid() &&  meetingtitle.isValid() 
              		)
              	{
              		
              		
              		$.ajax({
              			type: "get",
              			url: "{{Route('updatecreatepoll')}}",
              			data: {_token: CSRF_TOKEN,createpollid:$('#createpollid').val(),votingtype:$('#votingtype').val(),entity:$('#entity').val(),votingtitle:$('#votingtitle').val(),votestartdate:$('#votestartdate').val(),voteenddate:$('#voteenddate').val(),votestarttime:$('#votestarttime').val(),voteendtime:$('#voteendtime').val(),meetingdate:$('#meetingdate').val(),meetingtitle:$('#meetingtitle').val()}, 
              			dataType:'json',
              			success:function(data) {

              			}
              		});
              		


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
              if(currentIndex == 1) {
              var voterlist = $('#voterlist_length').val();
							if(voterlist>0)
							{
								return true;
							}
							else
							{
								$('#voterlist_length_error').text('Please upload voterdata');
							}
						} 
						
              

                            // Step 3 form validation

                            if(currentIndex == 2) {

                            	var resdescription = $('#resdescription').parsley();
                            	var resorder = $('#resorder').val();
                            	var resorder2;
                            	if(resorder<2)
                            	{
                            		resorder2 = $('#resorder').parsley();

                            		if( resorder2.isValid() )
                            		{
                            			return true;
                            		}
                            		else
                            		{ 
                            			resdescription.validate(); 
                            		}
                            	}
                            	else
                            	{
                            		return true;
                            	}
                            }
                            if(currentIndex == 3) {
                            	var payableamount = $('#payableamount').parsley();                    
                            	$.ajax({
                            		type: "get",
                            		url: "{{Route('insertbilling')}}",
                            		data: {_token: CSRF_TOKEN,createpollid:$('#createpollid').val(),resulttype:$('#resulttype').val()}, 
                            		dataType:'json',
                            		success:function(data) {
                            			var x = document.getElementById("snackbarsuccess");
                            			x.className = "show";
                            			setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

                            			setTimeout(function(){ 
                            				window.location.href = "{{Route('addedibc')}}";}, 
                            				2200);
                            		}
                            	});
                            	return true;
                            	
                            }


            // Always allow step back to the previous step even if the current step is not valid.
        } else { return true; }
    }
});
$(".rd").change(function()
{
	var resulttype=$(this).attr('id');
	$('#resulttype').val(resulttype);
	///alert(resulttype);
});


$("#voterlist").change(function() {
	
	var fullPath = $("#voterlist").val();
	var filename = fullPath.replace(/^.*[\\\/]/, '');
	var extention=filename.split('.').pop();

	$('#voterlistfilelabel').text(filename); 
	if(extention=='xlsx' || extention=='csv')
	{
		$('#selectxlsx').text('');

		
	}
	else
	{
		$('#selectxlsx').text('select excel or csv file');

	}

	
});

function make_table(data)
{
	if(data.length>0)
	{
		$('#voterlist_length_error').text('');
	}
	$('#voterlist_length').val(data.length);
	$('#voterlisttable').DataTable().clear().destroy();
			$.each(data, function (a, b) {   
				$("#votinguserrow").append(


					'<tr><td>'+b.orgname+'</td><td>'+b.memname+'</td><td>'+b.membershare+'</td><td>'+b.email+'</td><td>'+b.mobno+'</td><td>'+b.ratio+' %</td><td><button class="btn btn-primary btn-sm rounded-circle editrecord tooltip2" data-id="'+b.id+'" data-toggle="modal" data-target="#editmodal" ><span class="tooltiptext2">Edit Record</span> <i class="fas fa-edit"></i></button>&nbsp;<button class="modal-effect btn btn-danger btn-sm rounded-circle deleterecord tooltip2" data-toggle="modal" data-effect="effect-sign" id="'+b.id+'" data-toggle="tooltip-danger" ><span class="tooltiptext2">Delete Record</span> <i class="fas fa-trash"></i></button></td></tr>'
					);
                                  });
			createtable1();
				$('#loaderpage').hide();
}


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
                				var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                				
                				if (XL_row_object.length > 0) {
                					                					$("#file_ampty").text('');



                					var array_name=[];
var sum = 0;
                					$.each(XL_row_object, function(a, b) {
        sum=sum+b.membershare;
    });

                					$.each(XL_row_object, function(a, b) {
                                       // console.log(b);
                                       var ans = {           

                                       	entityid: $("#entity_id").val(),
                                       	parent_id: $("#createpollid").val(),                       	
                                       	type: 'ibcresolution',                       	
                                       	orgname:b.orgname,
                                       	memname:b.memname,
                                       	membershare:b.membershare,
                                       	email:b.email,
                                       	mobno:b.mobno,
                                       	ratio:(parseFloat(b.membershare*100)/sum).toFixed(3),

                                       }
                                       array_name.push(ans);

                                   }) 
                							$('#voterlistloader').hide();


                					$.ajax({
                						type: "POST",
                						url: "{{url('insertvoteruserlist')}}",
                						processData: true,
                						data: {
                							XL_row_object: JSON.stringify(array_name),
                							parent_id: $("#createpollid").val(),
                						},
                						dataType: 'json',
                						success: function(data) {

                							make_table(data);
                							$('#voterlistloader').hide();

                						}
                					});

                				}
                				else
                				{
                					$("#file_ampty").text('file is empty');
                					$("#loader").hide();
                					                	$('#voterlistloader').hide();

                					return;
                				}


                			})

                		};
                		reader.onerror = function(event) {
                			console.error("File could not be read! Code " + event.target.error.code);
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


var getvoterlisteditid=$("#createpollid").val();
$('#voterlisteditloader').show();
$.ajax({
	type: "get",
	url: "{{Route('getvoterlistedit')}}",
	data: {resolutionid:getvoterlisteditid}, 
	dataType:'json',
	success:function(data) {
			//console.log(data);
						make_table(data);
										$('#voterlisteditloader').hide();




		}
	});

var getresolutionid=$("#createpollid").val();

$.ajax({
	type:'get',
	url: "{{ Route('getsingleeditresolution')}}",
	data: {resolutionid:getresolutionid},
	dataType:'json',
	success: function(data) {
		var oldlength=parseInt(data.length)+parseInt(1);
		$('#resorder').val(oldlength);
		$('#resolutiontable').DataTable().clear().destroy();
		var firstrecord;
		var lastrecord=data.length;
		var upclass;
		var downclass;
		$.each(data, function (a, b) {  
			if(b.resorder==lastrecord)
			{
				upclass='d-none';
			}
			else
			{
				upclass='';
			}
			if(b.resorder==1)
			{
				downclass='d-none';
			}
			else
			{
				downclass='';
			}
			if(b.resdescription.length>100)
			{
				var resdescription=b.resdescription.substr(0,82)+'...';
			}
			else
			{
				var resdescription=b.resdescription;

			}
			$("#resolutiontablerow").append(
				'<tr><td>'+b.resorder+'</td><td width="10%">R'+b.resorder+'</td><td  width="50%">'+resdescription+'</td><td  width="30%">'+b.resolutiondetail+'</td><td  width="10%"><button class="btn btn-danger btn-sm rounded-circle deleteresolutionrow" data-toggle="modal" data-effect="effect-sign" id="'+b.id+'" data-toggle="tooltip-danger" title="Delete Record" data-placement="top"><i class="fas fa-trash"></i></button>  </td></tr>'
				);
		});
		createtable2();
		$('#loaderpage').hide();
		$("#resolutiondetaillabel").text('Choose File');
		$("#resolutiondetail").val('');

	}
});

$('#removefile').click(function(){
	$('#loaderpage').show();

	var resolutionid=$('#createpollid').val();
	$.ajax({
		type: "get",
		url: "{{Route('removevoterlistdata')}}",
		data: {resolutionid:resolutionid}, 
		dataType:'json',
		success:function(data) {
						//alert(data);
						$('#voterlisttable').DataTable().clear().destroy();
						$('#loaderpage').hide();
					}
				});
});
$("#resolutiondetail").change(function() {

	var fullPath = $("#resolutiondetail").val();
	var filename = fullPath.replace(/^.*[\\\/]/, '');	
	$("#resolutiondetaillabel").text(filename);

}); 


$("#votinguserrow").on('click','.deletemodal',function(){
	var id=$(this).attr('id');

	$("#deletevoterlistid").val(id);

});
$("#votinguserrow").on('click','.deleterecord',function(){
	$('#loaderpage').show();

	var id=$(this).attr('id');
	var resolutionid=$('#createpollid').val();
	$.ajax({
		type: "get",
		url: "{{Route('deletevoterlist')}}",
		data: {id:id,resolutionid:resolutionid}, 
		dataType:'json',
		success:function(data) {
			//console.log(data);
						make_table(data);

		}
	});
});
$("#votinguserrow").on('click','.editrecord',function(e){
	e.preventDefault();
	var id=$(this).attr('data-id');
	$.ajax({
		type: "get",
		url: "{{Route('getsinglevoterlist')}}",
		data: {id:id}, 
		dataType:'json',
		success:function(data) {
			//console.log(data);
			$("#updatevoterlistid").val(data.id);
			$("#voterlistorgname").val(data.orgname);
			$("#voterlistmemname").val(data.memname);
			$("#voterlistmembershare").val(data.membershare);
			$("#voterlistmobno").val(data.mobno);
			$("#voterlistemail").val(data.email);
			$("#voterlistratio").val(data.ratio);

		}
	});
});


$(".updatevoterlistrecord").click(function(e){
	e.preventDefault();
	var button_id=this.id;
	if(button_id=='insertvoter')
	{

			if($("#orgname2").val() && $("#voterlistmemname2").val() && $("#membershare2").val() && $("#voterlistmobno2").val() && $("#voterlistemail2").val() && $("#ratio2").val())
		{
			$("#singlevoter_allfield_error").text('');
			$.ajax({
				type: "get",
				url: "{{Route('updatesinglevoterlist')}}",
				data: {
					votermode: "insert",
					entityid:  $('#entity_id').val(),
					resolutionid: $('#createpollid').val(),
					orgname: $("#orgname2").val(),
					memname: $("#voterlistmemname2").val(),
					mobno: $("#voterlistmobno2").val(),
					email: $("#voterlistemail2").val(),
					membershare: $("#membershare2").val(),
					ratio: $("#ratio2").val(),
				},
				dataType: 'json',
				success: function(data) {
					//console.log(data);
					$("#membershare2").val('');
					$("#voterlistmemname2").val('');
					$("#orgname2").val('');
					$("#voterlistmobno2").val('');
					$("#voterlistemail2").val('');
					$("#membershare2").val('');

					make_table(data);

				}
			});
		}
		else
		{
			$("#singlevoter_allfield_error").text('Please fill all fields.');

		}

	}
	else
	{


	var id=$("#updatevoterlistid").val();	
	$.ajax({
		type: "get",
		url: "{{Route('updatesinglevoterlist')}}",
		data: {id:id,resolutionid:$('#createpollid').val(),orgname:$("#voterlistorgname").val(),memname:$("#voterlistmemname").val(),membershare:$("#voterlistmembershare").val(),mobno:$("#voterlistmobno").val(),email:$("#voterlistemail").val(),ratio:$("#voterlistratio").val()}, 
		dataType:'json',
		success:function(data) {
			make_table(data);
			

		}
	});
	}
});
$("#addsinglevoter").click(function() {
	$("#insertmodal").modal('show');
});

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
var resorder=$("#resorder").val();
$('#resolutionform').submit(function(e) {
	$('#loaderpage').show();
	var resorder1=resorder;
	$("#resorder1").val(resorder1);
	e.preventDefault();
	var formData = new FormData(this);
	$.ajax({
		type:'post',
		url: "{{ url('insertresolution')}}",
		data: formData,
		cache:false,
		contentType: false,
		processData: false,
		dataType:'json',

		success: function(data) {
			$('#resolutiontable').DataTable().clear().destroy();
			var firstrecord;
			var lastrecord=data.length;
			var upclass;
			var downclass;
			$.each(data, function (a, b) {  
				if(b.resorder==lastrecord)
				{
					upclass='d-none';
				}
				else
				{
					upclass='';
				}
				if(b.resorder==1)
				{
					downclass='d-none';
				}
				else
				{
					downclass='';
				}
				if(b.resdescription.length>100)
				{
					var resdescription=b.resdescription.substr(0,82)+'...';
				}
				else
				{
					var resdescription=b.resdescription;

				}
				$("#resolutiontablerow").append(
					'<tr><td>'+b.resorder+'</td><td width="10%">R'+b.resorder+'</td><td  width="50%">'+resdescription+'</td><td  width="30%">'+b.resolutiondetail+'</td><td  width="10%"><button class="btn btn-danger btn-sm rounded-circle deleteresolutionrow" data-toggle="modal" data-effect="effect-sign" id="'+b.id+'" data-toggle="tooltip-danger" title="Delete Record" data-placement="top"><i class="fas fa-trash"></i></button>  </td></tr>'
					);
			});
			createtable2();
			$('#loaderpage').hide();
			$("#resolutiondetaillabel").text('Choose File');
			$("#resolutiondetail").val('');

		}
	});
	
	
	$("#resdescription").val('');
	
	
	resorder=parseInt(resorder)+1;
//alert(resorder);
$("#resorder").val(resorder);
});



$("#resolutiontablerow").on('click','.deleteresolutionrow',function(){
	$('#loaderpage').show();
	var id=$(this).attr('id');
	var resolutionid=$('#createpollid').val();
	$.ajax({
		type: "get",
		url: "{{Route('deleteresolutionlist')}}",
		data: {id:id,resolutionid:resolutionid}, 
		dataType:'json',
		success:function(data) {
			//console.log(data);
			$('#loaderpage').hide();

			$('#resolutiontable').DataTable().clear().destroy();
			var lastrecord=data.length;
			var upclass;
			var downclass;
			$.each(data, function (a, b) {  
				if(b.resorder==lastrecord)
				{
					upclass='d-none';
				}
				else
				{
					upclass='';
				}
				if(b.resorder==1)
				{
					downclass='d-none';
				}
				else
				{
					downclass='';
				}
				$("#resolutiontablerow").append(
					'<tr><td>'+b.resorder+'</td><td>R'+b.resorder+'</td><td>'+b.resdescription+'</td><td>'+b.resolutiondetail+'</td><td><button class="btn btn-danger btn-sm rounded-circle deleteresolutionrow" data-toggle="modal" data-effect="effect-sign" id="'+b.id+'" data-toggle="tooltip-danger" title="Delete Record" data-placement="top"><i class="fas fa-trash"></i></button> <button class="btn btn-warning btn-sm rounded-circle editresolutionrow" data-toggle="modal" data-target="#editresolutionmodal"  data-effect="effect-sign" id="'+b.id+'" title="Edit Record" data-placement="top"><i class="fas fa-edit"></i></button> </td></tr>'
					);
			});
			createtable2();
			resorder=$("#resorder").val();

			resorder=parseInt(resorder)-1;
//alert(resorder);
$("#resorder").val(resorder);
}

});
});
$("#resolutiontablerow").on('click','.upresolution',function(){
	$('#loaderpage').show();

	var resorder=$(this).attr('id');
	var resolutionid=$('#createpollid').val();
	$.ajax({
		type: "get",
		url: "{{Route('upresolutionrow')}}",
		data: {resorder:resorder,resolutionid:resolutionid}, 
		dataType:'json',
		success:function(data) {
			//console.log(data);
			$('#resolutiontable').DataTable().clear().destroy();
			var firstrecord;
			var lastrecord=data.length;
			var upclass;
			var downclass;
			$.each(data, function (a, b) {  
				if(b.resorder==lastrecord)
				{
					upclass='d-none';
				}
				else
				{
					upclass='';
				}
				if(b.resorder==1)
				{
					downclass='d-none';
				}
				else
				{
					downclass='';
				}
				$("#resolutiontablerow").append(
					'<tr><td>'+b.resorder+'</td><td>R'+b.resorder+'</td><td>'+b.resdescription+'</td><td>'+b.resolutiondetail+'</td><td><button class="btn btn-danger btn-sm rounded-circle deleteresolutionrow" data-toggle="modal" data-effect="effect-sign" id="'+b.id+'" data-toggle="tooltip-danger" title="Delete Record" data-placement="top"><i class="fas fa-trash"></i></button> <button class="btn btn-warning btn-sm rounded-circle editresolutionrow" data-toggle="modal" data-target="#editresolutionmodal"  data-effect="effect-sign" id="'+b.id+'" title="Edit Record" data-placement="top"><i class="fas fa-edit"></i></button> </td></tr>'
					);
			});
			createtable2();
			$('#loaderpage').hide();
		}
	});
});


$("#resolutiontablerow").on('click','.downresolution',function(){
	$('#loaderpage').show();

	var id=$(this).attr('id');
	var resolutionid=$('#createpollid').val();
	$.ajax({
		type: "get",
		url: "{{Route('downresolutionrow')}}",
		data: {id:id,resolutionid:resolutionid}, 
		dataType:'json',
		success:function(data) {
			$('#resolutiontable').DataTable().clear().destroy();
			var firstrecord;
			var lastrecord=data.length;
			var upclass;
			var downclass;
			$.each(data, function (a, b) {  
				if(b.resorder==lastrecord)
				{
					upclass='d-none';
				}
				else
				{
					upclass='';
				}
				if(b.resorder==1)
				{
					downclass='d-none';
				}
				else
				{
					downclass='';
				}
				$("#resolutiontablerow").append(
					'<tr><td>'+b.resorder+'</td><td>R'+b.resorder+'</td><td>'+b.resdescription+'</td><td>'+b.resolutiondetail+'</td><td><button class="btn btn-danger btn-sm rounded-circle deleteresolutionrow" data-toggle="modal" data-effect="effect-sign" id="'+b.id+'" data-toggle="tooltip-danger" title="Delete Record" data-placement="top"><i class="fas fa-trash"></i></button> <button class="btn btn-warning btn-sm rounded-circle editresolutionrow" data-toggle="modal" data-target="#editresolutionmodal"  data-effect="effect-sign" id="'+b.id+'" title="Edit Record" data-placement="top"><i class="fas fa-edit"></i></button> <button class="btn btn-primary btn-sm rounded-circle upresolution '+downclass+'" data-effect="effect-sign" id="'+b.resorder2+'" title="Up" data-placement="top"><i class="fas fa-arrow-up"></i></button> <button class="btn btn-dark btn-sm rounded-circle downresolution '+upclass+'"  data-effect="effect-sign" id="'+b.resorder2+'"   title="Down" data-placement="top"><i class="fas fa-arrow-down"></i></button></td></tr>'
					);
			});
			createtable2();
			$('#loaderpage').hide();
		}
	});});

function createtable1()
{
	$("#voterlisttable").dataTable(
	{
		"info": true,
		responsive: true,
		"autoWidth": false,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_ items/page',
		}

	});
}
function createtable2()
{
	$("#resolutiontable").dataTable(
	{
		"info": true,
		"order": [[ 0, "asc" ]],
		"autoWidth": false,

		"columnDefs": [
		{
			"targets": [ 0],
			"visible": false,
		}],
		responsive: true,

		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_ items/page',
		}

	});
}
var entitytypeedit=$("#entitytypeedit").val();
$.ajax({
	type:"GET",
	dataType: "json",
	url:"{{Route('getsingleentity')}}",
	data: {id:entitytypeedit},
	success : function(data) {
		//console.log(data);
		$('#entitytable').show();
		$("#entityidlabel").text(data.entityid);
		$("#entitynamelabel").text(data.entityname);
		$("#regdatelabel").text(data.dateofreg);
		$("#mobilelabel").text(data.mobno);
		$("#emaillabel").text(data.email);
		$("#citylabel").text(data.city1);

		$('#entitytable2').show();
		$("#entityidlabel2").text(data.entityid);
		$("#entitynamelabel2").text(data.entityname);
		$("#regdatelabel2").text(data.dateofreg);
		$("#mobilelabel2").text(data.mobno);
		$("#emaillabel2").text(data.email);
		$("#citylabel2").text(data.city1);
		$('#entitytable3').show();

		$("#entityidlabel3").text(data.entityid);
		$("#entitynamelabel3").text(data.entityname);
		$("#regdatelabel3").text(data.dateofreg);
		$("#mobilelabel3").text(data.mobno);
		$("#emaillabel3").text(data.email);
		$("#citylabel3").text(data.city1);

		$('#entitytable4').show();
		$("#entityidlabel4").text(data.entityid);
		$("#entitynamelabel4").text(data.entityname);
		$("#regdatelabel4").text(data.dateofreg);
		$("#mobilelabel4").text(data.mobno);
		$("#emaillabel4").text(data.email);
		$("#citylabel4").text(data.city1);
	}

}); 

$('#entity').on('change', function() {
	var id = $("#entity").val();
	$('#loaderpage').show();

	$.ajax({
		type:"GET",
		dataType: "json",
		url:"{{Route('getsingleentity')}}",
		data: {id:id},
		success : function(data) {
			//console.log(data);
			$('#entitytable').show();
			$("#entityidlabel").text(data.entityid);
			$("#entitynamelabel").text(data.entityname);
			$("#regdatelabel").text(data.dateofreg);
			$("#mobilelabel").text(data.mobno);
			$("#emaillabel").text(data.email);
			$("#citylabel").text(data.city1);

			$('#entitytable2').show();
			$("#entityidlabel2").text(data.entityid);
			$("#entitynamelabel2").text(data.entityname);
			$("#regdatelabel2").text(data.dateofreg);
			$("#mobilelabel2").text(data.mobno);
			$("#emaillabel2").text(data.email);
			$("#citylabel2").text(data.city1);
			$('#entitytable3').show();

			$("#entityidlabel3").text(data.entityid);
			$("#entitynamelabel3").text(data.entityname);
			$("#regdatelabel3").text(data.dateofreg);
			$("#mobilelabel3").text(data.mobno);
			$("#emaillabel3").text(data.email);
			$("#citylabel3").text(data.city1);

			$('#entitytable4').show();
			$("#entityidlabel4").text(data.entityid);
			$("#entitynamelabel4").text(data.entityname);
			$("#regdatelabel4").text(data.dateofreg);
			$("#mobilelabel4").text(data.mobno);
			$("#emaillabel4").text(data.email);
			$("#citylabel4").text(data.city1);
		}

	}); 
	$('#loaderpage').hide();

});

$('.check_time_class').on('change', function() {
	check_time_diff();
});




function check_time_diff() {
	var start_time=$("#votestartdate").val()+' '+ $("#votestarttime").val();
	var end_time=$("#voteenddate").val()+' '+ $("#voteendtime").val();
	var start_time_sec = new Date(start_time).getTime();
	var end_time_sec = new Date(end_time).getTime();
	var current_time_sec = new Date($("#current_datettime").val()).getTime();
	if(start_time_sec>end_time_sec  ||current_time_sec>end_time_sec )
	{
		$("#voteenddate").val($("#votestartdate").val());
		$("#voteendtime").val($("#votestarttime").val());
	}
			// if(current_time_sec>start_time_sec)
			// {
			// 	$("#votestarttime").val($("#currenttime").val());
			// }


		}

		$('#votingtype').on('change', function() {
			var type = $("#votingtype").val();
			if(type=='Public')
			{
				$('#publictypemodal').modal('show');
			}
		});
		$('.backbutton').on('click', function() {
			$('#votingtype').val('Private');
			$("#votingtype").selectpicker('refresh');

		});
		$(".selectpicker").selectpicker();

		$('.select2-show-search').select2({
			minimumResultsForSearch: ''
		});



	});



</script>
@stop