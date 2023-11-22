@extends('layout')
@section('content')
@php $successcode=Session::get('successcode') ;@endphp
<input type="hidden" id="successcode" value="{{$successcode}}">
<div id="snackbarupdate"> 
	<div class="row">
	
		<div class="col-md-10">
	<strong>Success!</strong> Entity updated Successfully.
		</div>
	</div> 
</div>
<div class="slim-mainpanel" id="mainview">
	<div class="container">
		<div class="slim-pageheader">
			<ol class="breadcrumb slim-breadcrumb">
				<li class="breadcrumb-item"><a href="{{route('addentity')}}">Entity</a></li>
				<li class="breadcrumb-item">Added Entity</li>
			</ol>
			<h6 class="slim-pagetitle">Added Entity</h6>
		</div><!-- slim-pageheader -->




		<div class="section-wrapper mg-t-5">
			
			<div class="table-wrapper">
				<table id="entitytable" class="table display responsive nowrap">
					<thead>
						<tr>
							<th ></th>
							<th class="wd-15p">ENTITY ID</th>
							<th class="wd-40p">Entity Name </th>
							<th class="wd-20p">City</th>
							<th class="wd-15p">Registration Status</th>
							<th class="wd-10p">Action</th>

						</tr>
					</thead>
					<tbody id="entitydatarow">
						


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


		<div id="viewmodel" class="modal fade">
			<input type="hidden" id="entityviewid">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0 bg-transparent rounded overflow-hidden">
        	<div class="modal-footer" >
						<button type="button" class="btn btn-warning printrecord" ><i class="fas fa-print" ></i>&nbsp;Print</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i>&nbsp;Cancel</button>
					</div>
          <div class="modal-body pd-0 viewinfoclass" >
            <div class="row no-gutters">
              <div class="col-lg-12 bg-white">
                <div class="pd-2">
                	<table class="table">
                		<tr class="head">
                			<td style="border-top-color: #fff;
"><b><p>Entity Information</p></b></td>
                		</tr>
                		<tr>
                			<td>Entity Id : <span id="entityidview"></span></td>
                			<td>Entity Type : <span id="entitytypeview"></span></td>
                			<td>Entity Name : <span id="entitynameview"></span></td>
                			
                		</tr>
                		<tr>
                			<td>Date Of Registration : <span id="entitydateofregview"></span></td>
                			<td>Registration Number : <span id="entityregnoview"></span></td>
                			<td>Pan No : <span id="entitypannoview"></span></td>
                			
                		</tr>
                		<tr class="head">
                			<td><b><p>Address</p></b></td>
                		</tr>
                		<tr>
                			<td>Street : <span id="entitystreet1view"></span></td>
                			<td>Landmark : <span id="entitylandmark1view"></span></td>
                			<td>City : <span id="entitycity1view"></span></td>
                		</tr>
                		<tr>
                			<td>Pincode : <span id="entitypincode1view"></span></td>
                			<td>State : <span id="entitystate1view"></span></td>
                			<td>Country : <span id="entitycountry1view"></span></td>
                		</tr>
                		<tr class="head">
                			<td><b><p>Authorised Person/ Contact Person</p></b></td>
                		</tr>
                		<tr>
                			<td>Authorized Person Name : <span id="entitypernameview"></span></td>
                			<td>Designation : <span id="entitydesignationview"></span></td>
                			<td>Email : <span id="entityemailview"></span></td>
                		</tr>
                		<tr>
                			<td>Alternate Email : <span id="entityaltemailview"></span></td>
                			<td>Mobile No : <span id="entitymobnoview"></span></td>
                			<td>Alternate Mobile No : <span id="entityaltmobnoview"></span></td>
                		</tr>
                		<tr class="head">
                			<td><b><p>KYC Document</p></b></td>
                		</tr>
                		<tr>
                			<td>ID : <span id="entityidproofview"></span></td>
                			<td>Address : <span id="entityaddressproofview"></span></td>
                			<td>Business : <span id="entitybusinessproofview"></span></td>
                		</tr>
                		
                		
                	</table>
                 
                </div>
              </div><!-- col-6 -->
              
            </div><!-- row -->
          </div><!-- modal-body -->
          
        </div><!-- modal-content -->
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
				$('#loaderpage').hide();

				$('#entitytab').addClass('active');

				var successcode=$('#successcode').val();


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
						url: "{{Route('getallentity')}}",
						dataType:'json',
						success:function(data) {

							$('#entitytable').DataTable().clear().destroy();

							$.each(data, function (a, b) { 
										//console.log(b.dateofreg);
										var dateofreg=b.dateofreg.split("-").reverse().join("-");
										var status;
										if(b.status==4)
										{
											status='<label><span class="btn-success btn-sm rounded">Completed</span></label>';
										}
										if(b.status<4)
										{
											status='<label><span class="btn-warning btn-sm rounded">Incomplete</span></label>';
										} 


										$("#entitydatarow").append(
											'<tr><td>'+b.id+'</td><td>'+b.entityid+'</td><td>'+b.entityname+'</td><td>'+b.city1+'</td><td>'+status+'</td><td><a href="editentity/'+b.id+'" class="btn btn-primary btn-sm rounded-circle editrecord tooltip2" id='+b.id+' ><span class="tooltiptext2">Edit Record</span><i class="fas fa-edit"></i></a>&nbsp;<a href="#deletemodalcall" class="modal-effect btn btn-danger btn-sm rounded-circle deletemodal tooltip2" data-toggle="modal" data-effect="effect-sign" id='+b.id+' ><span class="tooltiptext2">Delete Record</span><i class="fas fa-trash"></i></a> <a href="#viewmodel"  class="modal-effect btn btn-success btn-sm rounded-circle viewbutton tooltip2" data-toggle="modal" data-effect="effect-sign" id='+b.id+' ><span class="tooltiptext2">View Record</span><i class="fas fa-eye"></i></a></td></tr>'
											);

                                      //alert(data[j].fullname);
                                  });

							createtable();
							$('#loaderpage').hide();
						}		        

					});
				};
				$("#entitydatarow").on('click','.deletemodal',function(){
					var id=$(this).attr('id');
					$("#deleteid").val(id);	
				});
	
				$("#entitydatarow").on('click','.viewbutton',function(){
					var id=$(this).attr('id');
					$.ajax({
						type: "get",
						url: "{{Route('getsingleentity')}}",
						data: {id:id}, 
						dataType:'json',
						success:function(data) {
							//console.log(data);

							$("#entityidview").text(data.entityid)
							$("#entitytypeview").text(data.entitytype)
							$("#entitynameview").text(data.entityname)
							$("#entitydateofregview").text(data.dateofreg)
							$("#entityregnoview").text(data.regno)
							$("#entitypannoview").text(data.panno)

							$("#entitylandmark1view").text(data.landmark1)
							$("#entitycity1view").text(data.city1)
							$("#entitystreet1view").text(data.streeta1)
							$("#entitypincode1view").text(data.pincode1)
							$("#entitystate1view").text(data.state1)
							$("#entitycountry1view").text(data.country1)

							$("#entityemailview").text(data.email)
							$("#entityaltemailview").text(data.altemail)
							$("#entitymobnoview").text(data.mobno)
							$("#entityaltmobnoview").text(data.altmobno)
							$("#entitydesignationview").text(data.designation)
							$("#entitypernameview").text(data.pername)

							$("#entityidproofview").html(data.idproof+'  <a href="{{asset('public/entity/idproof')}}/'+data.idproof+'" class="tx-primary" target="_blank" download><i class="fas fa-download"></i></a>');
							$("#entityaddressproofview").html(data.addressproof+'  <a href="{{asset('public/entity/addressproof')}}/'+data.addressproof+'" class="tx-primary" target="_blank" download><i class="fas fa-download"></i></a>');
							$("#entitybusinessproofview").html(data.businessproof+'  <a href="{{asset('public/entity/businessproof')}}/'+data.businessproof+'" class="tx-primary" target="_blank" download><i class="fas fa-download"></i></a>');
							$("#entityviewid").val(data.id)


						}
					});						});



				$(".printrecord").click(function(){
					var id=$("#entityviewid").val();
					        window.location.href = '{{url('printentityview')}}/'+id;

				});
				$(".deleterecord").click(function(){
					var id=$("#deleteid").val();
					$.ajax({
						type: "get",
						url: "{{Route('deleteentity')}}",
						data: {id:id}, 
						dataType:'json',
						success:function(data) {
							show_product();
					//alert(data)

				}
			});
				});
				function createtable()
				{
					$('#entitytable').DataTable({
						"order": [[ 0, "desc" ]],
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
					});        // Select2

    };

});

</script>
@stop