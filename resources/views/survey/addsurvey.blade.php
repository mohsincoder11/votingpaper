@extends('layout')
@section('content')

<head>
	<style type="text/css">
		
		.radio-toolbar input[type="radio"] {
			opacity: 0;
			position: fixed;
			width: 0;
		}
		.radio-toolbar label {
			display: inline-block;
			background-color: #fff;
			padding: 5px 10px;
			font-family: Times New Roman;
			font-size: 16px;
			border: 2px solid #444;
			border-radius: 20px;
			min-width: 100px;
			text-align: center;
		}
		.radio-toolbar input[type="radio"]:checked + label {
			color: white;
			background-color:#1b84e7;
			border-color: #4c4;
		}
		.radio-toolbar input[type="radio"]:focus + label {
			border: 2px dashed #0e0f0f;
		}
	</style>
</head>
<div id="snackbarsuccess">   
	<div class="row">
		<div class="col-md-2">
			<svg viewBox="0 0 32 32" class="checkmark">
				<path fill="white" class="check" stroke="black" stroke-width="1.5" d="M7.1,17.5l4.9,4.9L26.5,7.8c0,0,8.1,9.9-1,19c-7.3,7.3-16.3,4.3-20.9-0.3C1.1,23-1.8,13.4,5,6.6
				c6.3-6.3,16-4.5,20.1-0.2"/>
			</svg>
		</div>
		<div class="col-md-10">
			<strong>Success!</strong> Survey Added Successfully.
		</div>  		


	</div>
</div>
<div id="snackbarentityid">          <strong>Success!</strong> Survey Created Successfully.
</div>

<div class="slim-mainpanel">
	<div class="container">
		<div class="slim-pageheader">
			<ol class="breadcrumb slim-breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('added_survey')}}">Survey</a></li>
				<li class="breadcrumb-item">Add Survey</li>
			</ol>
			<h6 class="slim-pagetitle">Add Survey</h6>
		</div><!-- slim-pageheader -->
		<input type="hidden" id="createsurveyid"> 

		<div class="section-wrapper mg-t-5">
			
			<div id="wizard2">

				<h3>Create Survey</h3>
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
					<div class="row pt-2">
@php
					date("h:i:s");
					$date = Carbon::now(('Asia/Kolkata'));
					$current_time=$date->toTimeString();

					@endphp
					<input type="hidden" value="{{date('Y-m-d')}} {{$current_time}}" id="current_datettime">
					<input type="hidden" value="{{$current_time}}" id="currenttime">
				
						<div class="col-lg-4">
							<input type="hidden" value="0" id="createsurveysubmit"> 
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Select Entity <span class="tx-danger">*</span></label>
								<select class="form-control select2-show-search" data-placeholder="Choose Entity" required="" name="entity" id="entity" >
									<option value="" selected="">Select Entity</option>					
								</select>
							</div>
						</div><!-- col-4 -->
						<div class="col-lg-4">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Select Survey Type <span class="tx-danger">*</span></label>
								<select class="form-control selectpicker" data-placeholder="Choose country" required="" name="surveytype" id="surveytype">
									<option value="Private" selected="">Private</option>
									<option value="Public">Public</option>

								</select>
							</div>
						</div><!-- col-4 -->
						
					</div>          <div class="row">
						<div class="col-lg-4">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Survey Title <span class="tx-danger">*</span></label>
								<input class="form-control" placeholder="Enter Survey Title" name="surveytitle" id="surveytitle"  type="text" required="">

							</div>
						</div><!-- col-4 --> 
						<div class="col-lg-2">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Survey Start Date <span class="tx-danger">*</span></label>
								<input id="startdate" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" class="form-control check_time_class" name="startdate"  type="date" required="">

							</div>
						</div><!-- col-4 -->
						<div class="col-lg-2">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Survey Start Time<span class="tx-danger">*</span></label>
								<input id="starttime" class="form-control check_time_class" name="starttime"  type="time"  required="">

							</div>
						</div><!-- col-4 -->          
						<div class="col-lg-2">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Survey End Date <span class="tx-danger">*</span></label>
								<input id="enddate" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" class="form-control check_time_class"  name="enddate"  type="date" required="">

							</div>
						</div><!-- col-4 -->  
						<div class="col-lg-2">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Survey End Time <span class="tx-danger">*</span></label>
								<input id="endtime" class="form-control check_time_class" name="endtime"  type="time" required="">

							</div>
						</div><!-- col-4 -->  

					</div>


					<div class="row">
						
						<div class="col-lg-4">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Meeting Title <span class="tx-danger">*</span></label>
								<input id="meetingtitle" value="" class="form-control" name="meetingtitle"  type="text" required="" placeholder="Enter Meeting Title">

							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Meeting Date <span class="tx-danger">*</span></label>
								<input id="meetingdate"  value="{{date('Y-m-d')}}" class="form-control" name="meetingdate"  type="date" required="">

							</div>
						</div>

					</div>       


				</section>
				<h3>Upload Voter Data </h3>
				<section>
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
							<form method="POST" enctype="multipart/form-data" id="voterlistform">
								@csrf
								<input type="hidden" id="entity_id" name="entity_id">

								<div class="form-group mg-b-10-force">
									<label class="form-control-label">Upload Voter Data <span class="tx-danger">*</span></label>
									<div class="row">
										<div class="col-md-8">
											<div class="custom-file">

												<input type="file" class="custom-file-input" id="voterlist" name="voterlist">

												<label class="custom-file-label custom-file-label-primary" for="customFile" id="voterlistfilelabel">Choose file</label>
											</div><!-- custom-file -->
										</div>
										<div class="col-md-4">
											<div class="form-group mg-b-10-force ">
												<button type="submit" class="bt btn-primary" style="padding:10px 8px 7px 10px; "><i class="fas fa-upload"></i> &nbsp;&nbsp;Upload</button>
											</div>

										</div>
									</div>

									<b><label for="" style="color: red" id="selectxlsx"></label></b>
								</div>
								<input type="hidden" id="surveyidvoterlist" name="surveyidvoterlist" >

							</form>
						</div><!-- col-4 -->
						<div class="col-lg-2 ">
							<div class="form-group mg-b-10-force pt-4" style="margin-top: 3px;">
								<a href="{{asset('public/resolution/voterlistdatafile.xlsx')}}" class="text-primary pt-4"  download=""><i class="fas fa-upload"></i> &nbsp;Voterlist Format</a>
							</div>
						</div><!-- col-4 -->
						<!-- <div class="col-lg-4 ">
							<div class="form-group mg-b-10-force pt-4" style="margin-top: 3px;margin-left: -50px;">
								<button class="btn btn-danger " id="removefile"><i class="fas fa-minus-circle"></i> &nbsp;&nbsp;Remove File</button>
							</div>
						</div> --><!-- col-4 -->

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
				<h3>Add Questionier</h3>
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


					<form method="POST" enctype="multipart/form-data" id="survey_questioner_form">
						@csrf
						<input type="hidden" name="surveyidquesionier" id="surveyidquesionier" value="109">
						<div class="row">
							<div class="col-lg-2">
								<div class="form-group mg-b-10-force">
									<label class="form-control-label">Select Question Type <span class="tx-danger">*</span></label>
									<select class="form-control select2" data-placeholder="Choose Entity" required="" name="question_type" id="question_type" data-live-search="true">	
										<option value="" selected="" disabled="">Select</option>					
										<option value="Yes/No/Not Interested">Yes/No/Not Interested</option>					
										<option value="Agree/Disagree/Neutral">Agree/Disagree/Neutral</option>				
										<option value="True/False">True/False</option>	
										<option value="Rank/Scaling">Rank/Scaling</option>					
										<option value="Describe">Describe</option>					
										<option value="Single Choice">Single Choice</option>				
										<!-- <option value="Multiple Choice">Multiple Choice</option>			 -->
										<option value="Image">Image</option>							
									</select>
								</div>
							</div>

							<div class="col-lg-10">
								<div class="form-group mg-b-10-force">
									<label class="form-control-label">Question Text <span class="tx-danger">*</span></label>
									<input class="form-control" name="question" id="question"  type="text" required="">

								</div>
							</div>

							<div class="col-md-4 images" style="padding-top: 28px;display: none;">
								<div class="custom-file">

									<input type="file" class="custom-file-input" id="question_image" name="question_image">

									<label class="custom-file-label custom-file-label-primary" for="customFile">Question Image</label>
								</div>
							</div><div class="col-md-2 images" style="padding-top: 28px;display: none;">
								<div class="custom-file">

									<input type="file" class="custom-file-input" id="image_1" name="image_1">

									<label class="custom-file-label custom-file-label-primary" for="customFile" id="image_1label">Option 1</label>
								</div><!-- custom-file -->
							</div>

							<div class="col-md-2 images" style="padding-top: 28px;display: none;">
								<div class="custom-file">

									<input type="file" class="custom-file-input" id="image_2" name="image_2">

									<label class="custom-file-label custom-file-label-primary" for="customFile" id="image_2label">Option 2</label>
								</div><!-- custom-file -->
							</div>

							<div class="col-md-2 images" style="padding-top: 28px;display: none;">
								<div class="custom-file">

									<input type="file" class="custom-file-input" id="image_3" name="image_3">

									<label class="custom-file-label custom-file-label-primary" for="customFile" id="image_3label">Option 3</label>
								</div><!-- custom-file -->
							</div>

							<div class="col-md-2 images" style="padding-top: 28px;display: none;">
								<div class="custom-file">

									<input type="file" class="custom-file-input" id="image_4" name="image_4">

									<label class="custom-file-label custom-file-label-primary" for="customFile" id="image_4label">Option 4</label>
								</div><!-- custom-file -->
							</div>

							<!-- <div id="options" style="display: none; margin-left: 3px;" class="row"> -->
								<div class="col-lg-2 options" style="display: none;">
									<div class="form-group mg-b-10-force">
										<label class="form-control-label">Option 1<span class="tx-danger">*</span></label>
										<input class="form-control" name="option_1" id="option_1"  type="text">

									</div>
								</div>
								<div class="col-lg-2 options" style="display: none;">
									<div class="form-group mg-b-10-force">
										<label class="form-control-label">Option 2 <span class="tx-danger">*</span></label>
										<input class="form-control" name="option_2" id="option_2"  type="text">

									</div>
								</div>
								<div class="col-lg-2 options" style="display: none;">
									<div class="form-group mg-b-10-force">
										<label class="form-control-label">Option 3 <span class="tx-danger">*</span></label>
										<input class="form-control" name="option_3" id="option_3"  type="text">

									</div>
								</div>
								<div class="col-lg-2 options" style="display: none;">
									<div class="form-group mg-b-10-force">
										<label class="form-control-label">Option 4 <span class="tx-danger">*</span></label>
										<input class="form-control" name="option_4" id="option_4"  type="text">

									</div>
								</div>
								<div class="col-md-2 options" style="display: none;">
									<div class="form-group mg-b-10-force">
										<label class="form-control-label">Correct Option <span class="tx-danger">*</span></label>
										<select class="form-control" name="answer" id="answer">	
											<option value="" selected="" disabled="">Select</option>					
											<option value="option_1">Option 1</option>					
											<option value="option_2">Option 2</option>					
											<option value="option_3">Option 3</option>					
											<option value="option_4">Option 4</option>					
										</select>
									</div>
								</div>
								<!-- </div> -->
								<div class="col-md-2" id="correct_option">
									<div class="form-group mg-b-10-force">
										<label class="form-control-label">Correct Option <span class="tx-danger">*</span></label>
										<select class="form-control select2" data-placeholder="Choose Entity" name="correct_option" data-live-search="true" id="correct_option1">	
											<option value="" selected="">Select</option>			
										</select>
									</div>
								</div>
								<div class="col-md-2" style="margin-top: 28px;">
									<div class="form-group mg-b-10-force">
										<button type="submit" class="btn btn-primary">ADD</button>
									</div>
								</div>
							</div>
						</form>
						<div class="row pt-2">

							<div class="col-lg-12 ">
								<div class="table-wrapper">
									<table id="survey_questioner_table" class="table display responsive nowrap">
										<thead>
											<tr>
												<th class="wd-10p">Type</th>
												<th class="wd-15p">Question</th>
												<th class="wd-15p">Question Image</th>
												<th class="wd-25p">Option 1</th>
												<th class="wd-20p">Option 2</th>
												<th class="wd-10p">Option 3</th>
												<th class="wd-10p">Option 4</th>
												<th class="wd-10p">Answer</th>
												<th class="wd-10p">Action</th>

											</tr>
										</thead>
										<tbody id="survey_questioner_row">
										</tbody>
									</table>
								</div>
							</div><!-- col-4 -->

						</div>

					</section>
					<h3>Preview </h3>
					<section>
						<div class="table-wrapper">
							<table id="previewtbl" class="table display responsive nowrap" >
								<thead>
									<tr>
										<!-- <td class="text-danger wd-10p"> Entity Name :<span id="preview_entity_name"> Mphsin Kahn</span></td> -->
										<!-- <td class="text-danger wd-10p"> Survey Type :<span id="preview_survey_type">  Private</span></td> -->
										<td class="text-danger wd-10p"> Survey Title :<span id="preview_survey_title">  sdvsdvs</span></td>
										<td class="text-danger wd-10p"> Survey End Date :<span id="preview_survey_enddate">  sdvsdvs</span></td>
										<td class="text-danger wd-10p"> Survey End Time :<span id="preview_survey_endtime"> 14:00</span><br><br></td>
									</tr>
								</thead>

								<tbody id="previewtblrow" style="background-color: #fff">		
								</tbody>
							</table>
						</div>
					</section>

				</div>
			</div><!-- section-wrapper -->
		</div><!-- container -->
	</div><!-- slim-mainpanel -->
	<div id="editresolutionmodal" class="modal fade ">
		<input type="hidden" id="updateresolutionid">
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
								<label class="form-control-label">Resolution Description<span class="tx-danger">*</span></label>
								<input class="form-control"  placeholder="Enter Resolution Description" name="resoutiondescriptionmodel" id="resoutiondescriptionmodel"  type="text" required="">

							</div>
						</div><!-- col-4 --> 
						<div class="col-lg-4">
							<div class="form-group mg-b-10-force">
								<label class="form-control-label">Resolution Detail <span class="tx-danger">*</span></label>
								<input class="form-control" name="resolutiondetailmodel" id="resolutiondetailmodel"  type="text" required="">

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
					<button type="button" class="btn btn-danger updatevoterlistrecord" data-dismiss="modal"><i class="fas fa-upload"></i>&nbsp;Update</button>
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


			@php
			date("h:i:s");
			$date = Carbon::now(('Asia/Kolkata'));
			$current_time=$date->toTimeString();

			@endphp
			<input type="hidden" value="{{$current_time}}" id="currenttime">

			@stop
			@section('js')

			<script>
				$( document ).ready(function(e) {

            // Wait for sometime before running this script again

            $('#surveytab').addClass('active');
            $('#loaderpage').hide();
            $('#voterlistloader').hide();            

            $('#entitytable').hide();
            $('#entitytable2').hide();
            $('#entitytable3').hide();
            $('#entitytable4').hide();

            $('.ballotform').hide();

            
            var currentime;
            var endtime;
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
            	type: "get",
            	url: "{{Route('gettime')}}",
            	data: {_token: CSRF_TOKEN},               			
            	dataType:'json',
            	success:function(data) {				
            		//console.log(data);
            		$("#starttime").val(data);
            		$("#endtime").val(data);
            		currentime=data;
            		endtime=data;
            	}
            });
            $('#wizard2').steps({
            	headerTag: 'h3',
            	bodyTag: 'section',
            	autoFocus: true,
            	titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
            	onStepChanging: function (event, currentIndex, newIndex) {
            		if(currentIndex < newIndex) {
              // Step 1 form validation
              if(currentIndex === 0) {
              	var surveytype = $('#surveytype').parsley();
              	var entity = $('#entity').parsley();
              	var surveytitle = $('#surveytitle').parsley();
              	var startdate = $('#startdate').parsley();
              	var enddate = $('#enddate').parsley();
              	var starttime = $('#starttime').parsley();
              	var endtime = $('#endtime').parsley();
              	var meetingdate = $('#meetingdate').parsley();
              	var meetingtitle = $('#meetingtitle').parsley();

              	if(surveytitle.isValid() && entity.isValid() && startdate.isValid() && enddate.isValid() && starttime.isValid() && endtime.isValid() && meetingdate.isValid() && surveytitle.isValid() &&  surveytype.isValid() &&  meetingtitle.isValid())              	{
              		//return true;
              		var createsurveysubmit=$('#createsurveysubmit').val();
              		// alert(createsurveysubmit);
              		if(createsurveysubmit==0)

              		{
              			$.ajax({
              				type: "get",
              				url: "{{Route('insertsurvey')}}",
              				data: {_token: CSRF_TOKEN,surveytype:$('#surveytype').val(),entity:$('#entity').val(),surveytitle:$('#surveytitle').val(),startdate:$('#startdate').val(),enddate:$('#enddate').val(),starttime:$('#starttime').val(),endtime:$('#endtime').val(),meetingdate:$('#meetingdate').val(),meetingtitle:$('#meetingtitle').val()}, 
              				dataType:'json',
              				success:function(data) {
              					// console.log(data);
              					$('#createsurveyid').val(data.id);
              					$('#surveyidvoterlist').val(data.id);
              					$('#surveyidquesionier').val(data.id);
              					$('#createsurveysubmit').val(1);
              					$('#ibcidlabel1').text('Survey Voting Id : '+data.surveyid);
              					$('#ibcidlabel2').text('Survey Voting Id : '+data.surveyid);
              					$('#ibcidlabel3').text('Survey Voting Id : '+data.surveyid);
              					$('#ibcidlabel4').text('Survey Voting Id : '+data.surveyid);
              					var x = document.getElementById("snackbarentityid");
              					x.className = "show";
              					setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);


              				}
              			});
              			// console.log(data);
              		}
              		if(createsurveysubmit==1)

              		{
              			$.ajax({
              				type: "get",
              				url: "{{Route('updatesurvey')}}",
              				data: {_token: CSRF_TOKEN,createsurveyid:$('#createsurveyid').val(),surveytype:$('#surveytype').val(),entity:$('#entity').val(),surveytitle:$('#surveytitle').val(),startdate:$('#startdate').val(),enddate:$('#enddate').val(),starttime:$('#starttime').val(),endtime:$('#endtime').val(),meetingdate:$('#meetingdate').val(),meetingtitle:$('#meetingtitle').val()}, 
              				dataType:'json',
              				success:function(data) {

              					$('#createsurveysubmit').val(1);

              				}
              			});
              		}


              		return true;
              	} else {
              		surveytitle.validate();
              		entity.validate();
              		startdate.validate();
              		endtime.validate();
              		enddate.validate();
              		starttime.validate();
              		meetingdate.validate();
              		meetingtitle.validate();
              		surveytype.validate();
              	}
              }

              // // Step 2 address validation
              // if(currentIndex == 1) {
              // 	var voterlist = $('#voterlist').parsley();
              // 	if(voterlist.isValid()) {
              // 		return true;
              // 	} else { voterlist.validate(); }
              // }
               // Step 2 address validation
               if(currentIndex == 1) {
               	var rowCount1 = $('#voterlisttable tr').length;
               	if(rowCount1>1)
               	{
               		return true;
               	}
               }

                            // Step 3 form validation

                            if(currentIndex == 2) 
                            {
                            	var preview_id=$('#surveyidquesionier').val();
                            	$.ajax({
                            		type: "get",
                            		url: "{{Route('getsurveypreviewdata')}}",
                            		data: {preview_id:preview_id}, 
                            		dataType:'json',
                            		success:function(data) {
							//console.log(data);
							$('#previewtblrow').empty();
							$('#preview_survey_title').text(' '+data['survey_data']['surveytitle']);
							$('#preview_survey_enddate').text(' '+data['survey_data']['enddate']);
							$('#preview_survey_endtime').text(' '+data['survey_data']['endtime']);
							var sr_no=0;
							$.each(data['questionier'], function (a, z) {
								sr_no++;  
								$("#previewtblrow").append('<tr><td colspan="3"><span style="font-size: 20px;">Q '+sr_no+'. '+z.question+' </span><br><br></td></tr>');


							});

							$("#previewtbl").append('<tr><td colspan="3" align="center"><button type="submit" class="btn btn-primary" >Submit</button></td></tr>');

							createtable3();
							$('#loader').hide();


						}
					});


                            	var rowCount = $('#survey_questioner_table tr').length;
                            	if(rowCount>1)
                            	{
                            		return true;
                            	}
                            }
                            if(currentIndex == 3) {
                            	$.ajax({
                            		type: "get",
                            		url: "{{Route('insertsurveybilling')}}",
                            		data: {_token: CSRF_TOKEN,createsurveyid:$('#createsurveyid').val(),resulttype:$('#resulttype').val()}, 
                            		dataType:'json',
                            		success:function(data) {
                            			var x = document.getElementById("snackbarsuccess");
                            			x.className = "show";
                            			setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

                            			setTimeout(function(){ 
                            				window.location.href = "{{Route('added_survey')}}";}, 
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
$('#removefile').click(function(){
	$('#loaderpage').show();

	var resolutionid=$('#createsurveyid').val();
	$.ajax({
		type: "get",
		url: "{{Route('removeelectionvoterlistdata')}}",
		data: {resolutionid:resolutionid}, 
		dataType:'json',
		success:function(data) {
						//alert(data);
						$('#voterlisttable').DataTable().clear().destroy();
						$('#loaderpage').hide();

					}
				});
});



$("#votinguserrow").on('click','.deletemodal',function(){
	var id=$(this).attr('id');

	$("#deletevoterlistid").val(id);

});
$("#votinguserrow").on('click','.deleterecord',function(){
	$('#loaderpage').show();

	var id=$(this).attr('id');
	var surveyidvoterlist=$('#surveyidvoterlist').val();
	$(this).parent().parent().remove();
	$.ajax({
		type: "get",
		url: "{{Route('deletesurveyvoterlist')}}",
		data: {id:id,surveyidvoterlist:surveyidvoterlist}, 
		dataType:'json',
		success:function(data) {
			//console.log(data);
			$('#voterlisttable').DataTable().clear().destroy();
			$.each(data, function (a, b) {   
				$("#votinguserrow").append(
					'<tr><td>'+b.orgname+'</td><td>'+b.memname+'</td><td>'+b.membershare+'</td><td>'+b.email+'</td><td>'+b.mobno+'</td><td>'+b.ratio+'</td><td><button class="btn btn-primary btn-sm rounded-circle editrecord" data-id="'+b.id+'" data-toggle="modal" data-target="#editmodal" data-placement="top"  title="Edit Record" ><i class="fas fa-edit"></i></button>&nbsp;<button class="modal-effect btn btn-danger btn-sm rounded-circle deleterecord" data-toggle="modal" data-effect="effect-sign" id="'+b.id+'" data-toggle="tooltip-danger" title="Delete Record" data-placement="top"><i class="fas fa-trash"></i></button></td></tr>'
					);

                                      //alert(data[j].fullname);
                                  });
			createtable1();

			$('#loaderpage').hide();


		}
	});
});
$("#survey_questioner_row").on('click','.deleterecordquestion',function(){
	$('#loaderpage').show();

	var id=$(this).attr('id');
	var surveyidquesionier=$('#surveyidquesionier').val();
	$(this).parent().parent().remove();
	$.ajax({
		type: "get",
		url: "{{Route('deletesurveyquestion')}}",
		data: {id:id,surveyidquesionier:surveyidquesionier}, 
		dataType:'json',
		success:function(data) {
			//console.log(data);
			$('#survey_questioner_table').DataTable().clear().destroy();
			$.each(data, function (a, b) {   
				if(b.question_type=='Image')
				{
					var question_image="{{asset('public/images/survey_questions')}}/"+b.question_image;
					var image_1="{{asset('public/images/survey_questions')}}/"+b.image_1;
					var image_2="{{asset('public/images/survey_questions')}}/"+b.image_2;
					var image_3="{{asset('public/images/survey_questions')}}/"+b.image_3;
					var image_4="{{asset('public/images/survey_questions')}}/"+b.image_4;
					var answer="{{asset('public/images/survey_questions')}}/"+b.answer;
				// alert('asset("public/images/survey_questions/'+b.image_1+'")');

				$("#survey_questioner_row").append(
					'<tr><td>'+b.question_type+'</td><td>'+b.question+'</td><td><img src="'+question_image+'" width="50" height="50" alt=""></td><td><img src="'+image_1+'" width="50" height="50" alt=""></td><td><img src="'+image_2+'" width="50" height="50" alt=""></td><td><img src="'+image_3+'" width="50" height="50" alt=""></td><td><img src="'+image_4+'" width="50" height="50" alt=""></td><td><img src="'+answer+'" width="50" height="50" alt=""></td><td>&nbsp;<button class="modal-effect btn btn-danger btn-sm rounded-circle deleterecordquestion" data-toggle="modal" data-effect="effect-sign" id="'+b.id+'" data-toggle="tooltip-danger" title="Delete Record" data-placement="top"><i class="fas fa-trash"></i></button></td></tr>'
					);
			} 
			else
			{

				$("#survey_questioner_row").append(
					'<tr><td>'+b.question_type+'</td><td>'+b.question+'</td><td></td><td>'+b.option_1+'</td><td>'+b.option_2+'</td><td>'+b.option_3+'</td><td>'+b.option_4+'</td><td>'+b.answer+'</td><td>&nbsp;<button class="modal-effect btn btn-danger btn-sm rounded-circle deleterecordquestion" data-toggle="modal" data-effect="effect-sign" id="'+b.id+'" data-toggle="tooltip-danger" title="Delete Record" data-placement="top"><i class="fas fa-trash"></i></button></td></tr>'
					);
			}

                                      //alert(data[j].fullname);
                                  });
			createtable2();

			$('#loaderpage').hide();


		}
	});
	return true;
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
	var id=$("#updatevoterlistid").val();	
	$.ajax({
		type: "get",
		url: "{{Route('updatesinglevoterlist')}}",
		data: {id:id,resolutionid:$('#createsurveyid').val(),orgname:$("#voterlistorgname").val(),memname:$("#voterlistmemname").val(),membershare:$("#voterlistmembershare").val(),mobno:$("#voterlistmobno").val(),email:$("#voterlistemail").val(),ratio:$("#voterlistratio").val()}, 
		dataType:'json',
		success:function(data) {
			$('#voterlisttable').DataTable().clear().destroy();
			$.each(data, function (a, b) {   
				$("#votinguserrow").append(
					'<tr><td>'+b.orgname+'</td><td>'+b.memname+'</td><td>'+b.membershare+'</td><td>'+b.email+'</td><td>'+b.mobno+'</td><td>'+b.ratio+'</td><td><button class="btn btn-primary btn-sm rounded-circle editrecord" data-id="'+b.id+'" data-toggle="modal" data-target="#editmodal" data-placement="top"  title="Edit Record" ><i class="fas fa-edit"></i></button>&nbsp;<button class="modal-effect btn btn-danger btn-sm rounded-circle deleterecord" data-toggle="modal" data-effect="effect-sign" id="'+b.id+'" data-toggle="tooltip-danger" title="Delete Record" data-placement="top"><i class="fas fa-trash"></i></button></td></tr>'
					);

                                      //alert(data[j].fullname);
                                  });
			createtable1();

		}
	});
});

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});


$('#voterlistform').submit(function(e) {
	e.preventDefault();
	$('#loaderpage').show();
	var formData = new FormData(this);
	$.ajax({
		type:'post',
		url: "{{url('insertsurveyvoteruserlist')}}",
		data: formData,
		cache:false,
		contentType: false,
		processData: false,
		dataType:'json',

		success:function(data) {
			//console.log(data);
			$('#voterlisttable').DataTable().clear().destroy();	
			$.each(data, function (a, b) {   
				$("#votinguserrow").append(
					'<tr><td>'+b.orgname+'</td><td>'+b.memname+'</td><td>'+b.membershare+'</td><td>'+b.email+'</td><td>'+b.mobno+'</td><td>'+b.ratio+'</td><td>&nbsp;<button class="modal-effect btn btn-danger btn-sm rounded-circle deleterecord" data-toggle="modal" data-effect="effect-sign" id="'+b.id+'" data-toggle="tooltip-danger" title="Delete Record" data-placement="top"><i class="fas fa-trash"></i></button></td></tr>'
					);

                                      //alert(data[j].fullname);
                                  });
			$('#loaderpage').hide();

			createtable1();

			$('#voterlistform')[0].reset();


		}
	});

});

$('#survey_questioner_form').submit(function(e) {
	e.preventDefault();
	// $('#voterlistloader').show();	
	// alert();
	var formData = new FormData(this);
	$.ajax({
		type:'post',
		url: "{{url('add_survey_questionier')}}",
		data: formData,
		cache:false,
		contentType: false,
		processData: false,
		dataType:'json',

		success:function(data) {
			//console.log(data);
			$('#survey_questioner_table').DataTable().clear().destroy();	
			$.each(data, function (a, b) {   
				if(b.question_type=='Image')
				{
					var question_image="{{asset('public/images/survey_questions')}}/"+b.question_image;
					var image_1="{{asset('public/images/survey_questions')}}/"+b.image_1;
					var image_2="{{asset('public/images/survey_questions')}}/"+b.image_2;
					var image_3="{{asset('public/images/survey_questions')}}/"+b.image_3;
					var image_4="{{asset('public/images/survey_questions')}}/"+b.image_4;
					var answer="{{asset('public/images/survey_questions')}}/"+b.answer;
				// alert('asset("public/images/survey_questions/'+b.image_1+'")');

				$("#survey_questioner_row").append(
					'<tr><td>'+b.question_type+'</td><td>'+b.question+'</td><td><img src="'+question_image+'" width="50" height="50" alt=""></td><td><img src="'+image_1+'" width="50" height="50" alt=""></td><td><img src="'+image_2+'" width="50" height="50" alt=""></td><td><img src="'+image_3+'" width="50" height="50" alt=""></td><td><img src="'+image_4+'" width="50" height="50" alt=""></td><td><img src="'+answer+'" width="50" height="50" alt=""></td><td>&nbsp;<button class="modal-effect btn btn-danger btn-sm rounded-circle deleterecordquestion" data-toggle="modal" data-effect="effect-sign" id="'+b.id+'" data-toggle="tooltip-danger" title="Delete Record" data-placement="top"><i class="fas fa-trash"></i></button></td></tr>'
					);
			} 
			else
			{

				$("#survey_questioner_row").append(
					'<tr><td>'+b.question_type+'</td><td>'+b.question+'</td><td></td><td>'+b.option_1+'</td><td>'+b.option_2+'</td><td>'+b.option_3+'</td><td>'+b.option_4+'</td><td>'+b.answer+'</td><td>&nbsp;<button class="modal-effect btn btn-danger btn-sm rounded-circle deleterecordquestion" data-toggle="modal" data-effect="effect-sign" id="'+b.id+'" data-toggle="tooltip-danger" title="Delete Record" data-placement="top"><i class="fas fa-trash"></i></button></td></tr>'
					);
			}

                                      //alert(data[j].fullname);
                                  });
			// $('#voterlistloader').hide();

			createtable2();


			$('#survey_questioner_form')[0].reset()

		}
	});

});
$("#resolutiontablerow").on('click','.deleteresolutionrow',function(){
	$('#loaderpage').show();
	var id=$(this).attr('id');
	var resolutionid=$('#createsurveyid').val();
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
			resorder=parseInt(resorder)-1;
//alert(resorder);
$("#resorder").val(resorder);
}

});
});
$("#resolutiontablerow").on('click','.upresolution',function(){
	$('#loaderpage').show();

	var resorder=$(this).attr('id');
	//alert(resorder);
	var resolutionid=$('#createsurveyid').val();
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
	var resolutionid=$('#createsurveyid').val();
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
$('#loaderpage').show();

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
$('#ballottype').on('change', function() {
	var ballottype=$("#ballottype").val();
            	//alert(ballottype);
            	if(ballottype==1)
            	{
            		$('.ballotform').hide();
            		$('#firstballetform').show();
            	}
            	if(ballottype==2)
            	{
            		$('.ballotform').hide();
            		$('#secondballetform').show();
            	}
            	if(ballottype==3)
            	{
            		$('.ballotform').hide();
            		$('#thirdballetform').show();
            	}
            	if(ballottype==4)
            	{
            		$('.ballotform').hide();
            		$('#fourthballetform').show();
            	}
            	if(ballottype==5)
            	{
            		$('.ballotform').hide();
            		$('#fifthballetform').show();
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

			$("#entity_id").val(data.id);

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
	var start_time=$("#startdate").val()+' '+ $("#starttime").val();
	var end_time=$("#enddate").val()+' '+ $("#endtime").val();
	var start_time_sec = new Date(start_time).getTime();

	var end_time_sec = new Date(end_time).getTime();
	var current_time_sec = new Date($("#current_datettime").val()).getTime();
	

	if(start_time_sec>end_time_sec  ||current_time_sec>end_time_sec )
	{
		$("#enddate").val($("#startdate").val());
		$("#endtime").val($("#starttime").val());
		
	}
	if(current_time_sec>start_time_sec)
	{
		$("#starttime").val($("#currenttime").val());
	}
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
$('#question_type').on('change', function() {
	var question_type=$('#question_type').val();
	if(question_type=='Yes/No/Not Interested' || question_type=='Agree/Disagree/Neutral' || question_type=='True/False')
	{
		var str=question_type;
		var text=str.split("/");
		$(".images").each(function(){
			$(this).hide();
		});
		$('#question_image').removeAttr( "required" );
		$('#image_1').removeAttr( "required" );
		$('#image_2').removeAttr( "required" );
		$('#image_3').removeAttr( "required" );
		$('#image_4').removeAttr( "required" );
		$(".options").each(function(){
			$(this).hide();
		});
		$('#option_1').removeAttr( "required" );
		$('#option_2').removeAttr( "required" );
		$('#option_3').removeAttr( "required" );
		$('#option_4').removeAttr( "required" );
		$('#answer').removeAttr( "required" );
		$('#correct_option').show();
		$('#correct_option1').attr('required','true');
		$('#correct_option1').empty();
		if(question_type=='Yes/No/Not Interested')
		{
			$('#correct_option1').append('<option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option><option value="Not Interested">Not Interested</option>');
		}
		if(question_type=='Agree/Disagree/Neutral')
		{
			$('#correct_option1').append('<option value="">Select</option><option value="Agree">Agree</option><option value="Disagree">Disagree</option><option value="Neutral">Neutral</option>');
		}
		if(question_type=='True/False')
		{
			$('#correct_option1').append('<option value="">Select</option><option value="True">True</option><option value="False">False</option>');
		}
	}
	if(question_type=='Single Choice')
	{
		$(".images").each(function(){
			$(this).hide();
		});
		$('#question_image').removeAttr( "required" );
		$('#image_1').removeAttr( "required" );
		$('#image_2').removeAttr( "required" );
		$('#image_3').removeAttr( "required" );
		$('#image_4').removeAttr( "required" );
		$(".options").each(function(){
			$(this).show();
		});
		$('#option_1').attr('required','true');
		$('#option_2').attr('required','true');
		$('#option_3').attr('required','true');
		$('#option_4').attr('required','true');
		$('#answer').attr('required','true');
		$('#correct_option').hide();
		$('#correct_option1').removeAttr( "required" );
	}
	if(question_type=='Describe' || question_type=='Rank/Scaling')
	{
		$(".images").each(function(){
			$(this).hide();
		});
		$('#question_image').removeAttr( "required" );
		$('#image_1').removeAttr( "required" );
		$('#image_2').removeAttr( "required" );
		$('#image_3').removeAttr( "required" );
		$('#image_4').removeAttr( "required" );
		$(".options").each(function(){
			$(this).hide();
		});
		$('#option_1').removeAttr( "required" );
		$('#option_2').removeAttr( "required" );
		$('#option_3').removeAttr( "required" );
		$('#option_4').removeAttr( "required" );
		$('#answer').removeAttr( "required" );
		$('#correct_option').hide();
		$('#correct_option1').removeAttr( "required" );
	}
	if(question_type=='Image')
	{
		$(".images").each(function(){
			$(this).show();
		});
		$('#question_image').attr('required','true');
		$('#image_1').attr('required','true');
		$('#image_2').attr('required','true');
		$('#image_3').attr('required','true');
		$('#image_4').attr('required','true');
		$(".options").each(function(){
			$(this).hide();
		});
		$('#option_1').removeAttr( "required" );
		$('#option_2').removeAttr( "required" );
		$('#option_3').removeAttr( "required" );
		$('#option_4').removeAttr( "required" );
		$('#answer').removeAttr( "required" );
		$('#correct_option').show();
		$('#correct_option1').empty();
		$('#correct_option1').append('<option value="" selected="" disabled="">Select</option><option value="option_1">Option 1</option><option value="option_2">Option 2</option><option value="option_3">Option 3</option><option value="option_4">Option 4</option>');
		$('#correct_option1').attr('required','true');
	}
	$("#votingtype").selectpicker('refresh');

});
$(".selectpicker").selectpicker();


$('.select2-show-search').select2({
	minimumResultsForSearch: ''
});



});
</script>

@stop