@extends('layout')
@section('content')
<?php $successcode=Session::get('successcode') ;?>
<input type="hidden" id="successcode" value="{{$successcode}}">
<div id="snackbarupdate"> 
	<div class="row">
		<div class="col-md-2">
			<svg
          width="25"
          height="25"
          viewBox="0 0 125 125"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <circle
            cx="62.5"
            cy="62.5"
            r="57.5"
            id="exclamation_icon_circle"
            stroke="#FF0000"
          />
          <path
            d="M70.1289 74.4902H56.7988L54.6992 25.9062H72.2285L70.1289 74.4902ZM54.2109 89.627C54.2109 87.2181 55.0736 85.2487 56.7988 83.7188C58.5566 82.1562 60.7376 81.375 63.3418 81.375C65.946 81.375 68.1107 82.1562 69.8359 83.7188C71.5938 85.2487 72.4727 87.2181 72.4727 89.627C72.4727 92.0358 71.5938 94.0215 69.8359 95.584C68.1107 97.1139 65.946 97.8789 63.3418 97.8789C60.7376 97.8789 58.5566 97.1139 56.7988 95.584C55.0736 94.0215 54.2109 92.0358 54.2109 89.627Z"
            fill="black"
          />
        </svg>
		</div>
		<div class="col-md-10">
	<strong>Success!</strong> Survey updated Successfully.
		</div>
	</div> 
</div>
<div class="slim-mainpanel" id="mainview">
	<div class="container">
		<div class="slim-pageheader">
			<ol class="breadcrumb slim-breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('addsurvey')}}">Survey</a>
				</li>
				<li class="breadcrumb-item">Added Survey</li>
			</ol>
			<h6 class="slim-pagetitle">Added Survey</h6>
		</div><!-- slim-pageheader -->




		<div class="section-wrapper mg-t-5">
			
			<div class="table-wrapper">
				<table id="surveytable" class="table display responsive nowrap">
					<thead>
						<tr>
							<th ></th>
							<th class="wd-10p">Survey Id</th>

							<th class="wd-10p"> Type</th>
							<th class="wd-15p"> Title</th>
														<th class="wd-15">Entity Name</th>

							<th class="wd-10p">Start Date</th>
							<th class="wd-10p">End Date</th>
							<th class="wd-10p">Status</th>
							<th class="wd-10p">Action</th>

						</tr>
					</thead>
					<tbody id="surveyrow">
						


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
				<h5 class="lh-3 tx-inverse text-center"><img style="height: 120px;width: 170px;" src="{{asset('public/images/icons/delete3.gif')}}" alt=""></p>
					<h5 class="lh-3 tx-inverse">Are You Sure You Want To Delete This Record ?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger deleterecord" data-dismiss="modal"><i class="fas fa-trash"></i>&nbsp;Delete</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i>&nbsp;Cancel</button>
					</div>
				</div>
			</div><!-- modal-dialog -->
		</div><!-- modal -->
				<div class="loader" id="loader"></div>


		@stop
		@section('js')
		<script>
			$( document ).ready(function() {
				$('#surveytab').addClass('active');
				
				var successcode=$('#successcode').val();
$('#loader').hide();

				if(successcode==2)
				{
					var x = document.getElementById("snackbarupdate");
					x.className = "show";
					setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

				}

				show_product();
				function show_product(){
					$('#loader').show();


				$.ajax({
					type: "get",
					url: "{{Route('getallsurveyrow')}}",
					dataType:'json',
					success:function(data) {
				//console.log(data);
							$('#surveytable').DataTable().clear().destroy();
					
					$.each(data, function (a, b) {   
                                     //alert(address);    
                                     
                                    var viewbutton; 
						  var edit_mode='disabled';
                                     var ballottype;
                                     var end_time=b.enddate+' '+ b.endtime;
                                     var start_time=b.startdate+' '+ b.starttime;
                                     var end_time_sec = new Date(end_time).getTime();
                                     var start_time_sec = new Date(start_time).getTime();
                                     var current_time_sec = new Date().getTime();


                                     if(current_time_sec>start_time_sec && current_time_sec<end_time_sec)
                                     {
                                     	status='<label><span class="btn-success btn-sm rounded">Survey Live </span></label>';
                                     	                                     	edit_mode='';
                                     }

                                     if(current_time_sec>end_time_sec)
                                     {
                                     	status='<label><span class="btn-danger btn-sm rounded">Survey Over</span></label>';

                                     }  
                                     if(start_time_sec>current_time_sec)
                                     {
                                     	status='<label><span class="btn-warning btn-sm rounded">Upcoming Survey</span></label>';
viewbutton='disabled';
                                     } 
                                     if(b.status<3)
                                     {
                                     	status='<label><span class="btn-primary btn-sm rounded">Incomplete</span></label>';
                                     	edit_mode='';

viewbutton='disabled';
                                     }

                                     var votestartdate=b.startdate.split("-").reverse().join("-");
                                     var voteenddate=b.enddate.split("-").reverse().join("-");
                                    // var meetingdate=b.meetingdate.split("-").reverse().join("-");
                                     $("#surveyrow").append(
                                     	'<tr><td>'+b.id+'</td><td>'+b.surveyid+'</td><td>'+b.surveytype+'</td><td>'+b.surveytitle+'</td><td>'+b.entityname+'</td><td>'+votestartdate+' '+b.starttime+'</td><td>'+voteenddate+' '+b.endtime+'</td><td>'+status+'</td><td>&nbsp;<a href="#deletemodalcall" class="modal-effect btn btn-danger btn-sm rounded-circle deletemodal tooltip2" data-toggle="modal" data-effect="effect-sign" id='+b.id+' ><span class="tooltiptext2">Delete Record</span><i class="fas fa-trash"></i></a> <a href="{{url("view_survey_result")}}/'+b.id+'"   class="btn btn-success btn-sm rounded-circle tooltip2 '+viewbutton+'"> <span class="tooltiptext2">View Result</span><i class="fas fa-eye"></i></a></td></tr>'
                                     	);

                                      //alert(data[j].fullname);
                                  });
					
			createtable1();
			$('#loader').hide();


				}
			});

			
			}

				function createtable1(){
					'use strict';
					$('#surveytable').DataTable({
						"order": [[ 0, "desc" ]],
						"bInfo" : true,
						"autoWidth": false,
 //use to hide and show count 

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

        // Select2

   
				$("#surveyrow").on('click','.deletemodal',function(){
					var id=$(this).attr('id');
					$("#deleteid").val(id);	
				});


				$(".deleterecord").click(function(){
					var id=$("#deleteid").val();
					$.ajax({
						type: "get",
						url: "{{Route('delete_survey')}}",
						data: {id:id}, 
						dataType:'json',
						success:function(data) {
show_product();

				}
			});
				});

			});

		</script>
		@stop