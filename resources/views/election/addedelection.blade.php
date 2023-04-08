@extends('layout')
@section('content')
<?php $successcode=Session::get('successcode') ;?>
<input type="hidden" id="successcode" value="{{$successcode}}">

<div id="snackbarupdate"> 
	<div class="row">
		
		<div class="col-md-10">
			<strong>Success!</strong>Election Updated Successfully.
		</div>
	</div> 
</div>
<div class="slim-mainpanel" id="mainview">
	<div class="container">
		<div class="slim-pageheader">
			<ol class="breadcrumb slim-breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('addedelection')}}">Election</a></li>
				<li class="breadcrumb-item">Added Election</li>
			</ol>
			<h6 class="slim-pagetitle">Added Election</h6>
		</div><!-- slim-pageheader -->




		<div class="section-wrapper mg-t-5">
			
			<div class="table-wrapper">
				<table id="election_table" class="table">
					<thead>
						<tr>
							<th ></th>
							<th class="wd-10p">Election Id</th>
							<th class="wd-15p"> Type</th>
							<th class="wd-10p"> Title</th>
							<th class="wd-10p"> Entity Name</th>
							<th class="wd-12p">Start Time</th>
							<th class="wd-12p">End Time</th>
							<th class="wd-15p">Status</th>
							<th class="wd-10p">Action</th>

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
			$( document ).ready(function() {

				$('#electiontab').addClass('active');				
				var successcode=$('#successcode').val();
				$('#loaderpage').hide();

				if(successcode==2)
				{
					var x = document.getElementById("snackbarupdate");
					x.className = "show";
					setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

				}

				show_product();
				function show_product(){
					$('#loaderpage').show();


					$.ajax({
						type: "get",
						url: "{{Route('getallelectionrow')}}",
						dataType:'json',
						success:function(data) {
				//alert(data);
				$('#election_table').DataTable().clear().destroy();

				$.each(data, function (a, b) {   
                                     //alert(address);    
                                     
                                     var status; 
                                     var viewbutton; var edit_mode='disabled';
                                     var ballottype;
                                     var end_time=b.voteenddate+' '+ b.voteendtime;
                                     var start_time=b.votestartdate+' '+ b.votestarttime;
                                     var end_time_sec = new Date(end_time).getTime();
                                     var start_time_sec = new Date(start_time).getTime();
                                     var current_time_sec = new Date().getTime();


                                     if(current_time_sec>start_time_sec && current_time_sec<end_time_sec)
                                     {
                                     	status='<label><span class="btn-success btn-sm rounded">Election Live </span></label>';
                                     	edit_mode='';
                                     }

                                     if(current_time_sec>end_time_sec)
                                     {
                                     	status='<label><span class="btn-danger btn-sm rounded">Election Over</span></label>';

                                     }  

                                     if(start_time_sec>current_time_sec)
                                     {
                                     	status='<label><span class="btn-warning btn-sm rounded">Upcoming Election</span></label>';
                                     	edit_mode='';                                     	viewbutton='disabled';

                                     } 

                                     if(b.status<3)
                                     {
                                     	status='<label><span class="btn-primary btn-sm rounded">Incomplete</span></label>';
                                     	edit_mode='';
                                     	viewbutton='disabled';
                                     }

                                     
                                     if(b.ballottype==1)
                                     {
                                     	ballottype='Single Vote for Single Position ';
                                     }
                                     if(b.ballottype==2)
                                     {
                                     	ballottype='Single Vote for Mutliple Position ';
                                     }
                                     if(b.ballottype==3)
                                     {
                                     	ballottype='Ranking Vote for Single Position ';
                                     }
                                     if(b.ballottype==4)
                                     {
                                     	ballottype='Ranking Vote for Multiple Position ';
                                     }
                                     if(b.ballottype==5)
                                     {
                                     	ballottype='Hybrid Voting ';
                                     }
                                     if(b.ballottype==0)
                                     {
                                     	ballottype='Ballot not generated';
                                     }


                                     var votestartdate=b.votestartdate.split("-").reverse().join("-");
                                     var voteenddate=b.voteenddate.split("-").reverse().join("-");
                                     var meetingdate=b.meetingdate.split("-").reverse().join("-");
                                     $("#election_table_row").append(
                                     	'<tr><td>'+b.id+'</td><td><b>'+b.electionid+'</b></td><td><b>'+ballottype+'</b></td><td>'+b.votingtitle+'</td><td>'+b.entityname+'</td><td>'
                                     	+votestartdate+' '+b.votestarttime+'</td><td>'+voteenddate+' '+b.voteendtime+'</td><td>'+status+'</td><td><a href="editelection/' + b.id 
                                     	+ '" class="btn btn-primary btn-sm rounded-circle editrecord tooltip2 '+edit_mode+'" id=' 
                                     	+ b.id + '  ><span class="tooltiptext2">Edit Record</span><i class="fas fa-edit"></i></a>  <a href="#deletemodalcall" class="modal-effect btn btn-danger btn-sm rounded-circle deletemodal tooltip2" data-toggle="modal" data-effect="effect-sign" id='+b.id
                                     	+' ><span class="tooltiptext2">Delete Record</span><i class="fas fa-trash"></i></a> <a href="{{url("view_election_result")}}/'+b.id+'"   class="btn btn-success btn-sm rounded-circle tooltip2 '+viewbutton+'"> <span class="tooltiptext2">View Result</span><i class="fas fa-eye"></i></a></td></tr>'
                                     	);

                                      //alert(data[j].fullname);
                                  });


createtable1();
$('#loaderpage').hide();


}
});
}

function createtable1(){
	'use strict';
	$('#election_table').DataTable({
		"order": [[ 0, "desc" ]],
		"bInfo" : true,
		"autoWidth": false,
 //use to hide and show count 

 "columnDefs": [
 {
 	"targets": [ 0],
 	"visible": false,
 }],
 Responsive:false,
 language: {
 	searchPlaceholder: 'Search...',
 	sSearch: '',
 	lengthMenu: '_MENU_ items/page',
 }
});
}

        // Select2


        $("#election_table_row").on('click','.deletemodal',function(){
        	var id=$(this).attr('id');
        	$("#deleteid").val(id);	
        });


        $(".deleterecord").click(function(){
        	var id=$("#deleteid").val();
        	$.ajax({
        		type: "get",
        		url: "{{Route('deleteelection')}}",
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