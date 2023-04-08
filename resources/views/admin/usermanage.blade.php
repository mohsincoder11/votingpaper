@extends('layout')
@section('content')
<div id="snackbarsuccess">   
	<div class="row">
		
		<div class="col-md-12">
			<strong>Success!</strong> User Added Successfully.
		</div>  		


	</div>
</div>
<div id="snackbarupdate"> 
	<div class="row">
		
		<div class="col-md-12">
			<strong>Success!</strong> User Updateed Successfully.
		</div>  		


	</div>
</div>


<div class="slim-mainpanel">
	<div class="container">
		<div class="slim-pageheader">
			<ol class="breadcrumb slim-breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
				<li class="breadcrumb-item">User Manage</li>
			</ol>
			<h6 class="slim-pagetitle">User Management</h6>
		</div><!-- slim-pageheader -->

		<div class="section-wrapper">
			<label class="section-title"><i class="fas fa-user-plus"></i> &nbsp;&nbsp;<span id="inputmodelabel">Add User</span></label>
			<form  id="form" name="form" autocomplete="off">
				@csrf
				<input type="hidden" id="inputmode" value="insert">
				<input type="hidden" id="updateid" value="">
				<div class="form-layout pt-2">
					<div class="row ">
						<div class="col-lg-4">
							<div class="form-group">
								<input type="hidden" id="username2">
								<label class="form-control-label">Username: <span class="tx-danger">*</span></label>
								<input class="form-control" type="text" name="username" id="username"  placeholder="Enter Username" required="">
								<label for="" ><span class="tx-danger" id="usernamepresent"></span></label>
							</div>
						</div><!-- col-4 -->
						<div class="col-lg-4" id="passwordarea">
							<div class="form-group">
								<label class="form-control-label">Password: <span class="tx-danger">*</span></label>
								<input class="form-control" type="password" name="password" id="password" placeholder="Enter Password" required="" autocomplete="off">
								<label for="" ><span class="tx-danger" id="passworlabel"></span></label>

							</div>
						</div><!-- col-4 -->
						<div class="col-lg-4">
							<div class="form-group">
								<label class="form-control-label">Email : <span class="tx-danger">*</span></label>
								<input class="form-control" type="email" name="email" id="email" placeholder="Enter email address" required="">
							</div>
						</div><!-- col-4 -->


					</div><!-- row -->
					<div class="row mg-b-10">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-4">
									<label >
										<span> <strong>Entity Registration :</strong></span>
									</label>
								</div>
								<div class="col-lg-3">
									<label class="ckbox">
										<input type="checkbox" class="checkboxclass" checked="checked" value="1"  name="regnew" id="regnew"><span> New Registration</span>
									</label>
								</div>
								<div class="col-lg-2">
									<label class="ckbox">
										<input type="checkbox" class="checkboxclass" checked="checked" value="1" name="regedit" id="regedit"><span> Edit</span>
									</label>
								</div>
								<div class="col-lg-2">
									<label class="ckbox">
										<input type="checkbox" class="checkboxclass" checked="checked" value="1" name="regview" id="regview"><span> View</span>
									</label>
								</div>
							</div>

							<div class="row pt-2">
								<div class="col-lg-4">
									<label >
										<span> <strong>Election :</strong></span>
									</label>
								</div>
								<div class="col-lg-3">
									<label class="ckbox">
										<input type="checkbox" class="checkboxclass" checked="checked" value="1" name="elecmake" id="elecmake"><span> Make Election</span>
									</label>
								</div>
								<div class="col-lg-2">
									<label class="ckbox">
										<input type="checkbox" class="checkboxclass" checked="checked" value="1" name="elecedit" id="elecedit"><span> Edit</span>
									</label>
								</div>
								<div class="col-lg-2">
									<label class="ckbox">
										<input type="checkbox" class="checkboxclass" checked="checked" value="1" name="elecview" id="elecview"><span> View</span>
									</label>
								</div>
							</div>
							<div class="row pt-2">
								<div class="col-lg-4">
									<label >
										<span> <strong>Resolution :</strong></span>
									</label>
								</div>
								<div class="col-lg-3">
									<label class="ckbox">
										<input type="checkbox" class="checkboxclass" value="1" checked="checked" name="resmake" id="resmake"><span> Make Resolution</span>
									</label>
								</div>
								<div class="col-lg-2">
									<label class="ckbox">
										<input type="checkbox" class="checkboxclass" value="1" checked="checked" name="resedit" id="resedit"><span> Edit</span>
									</label>
								</div>
								<div class="col-lg-2">
									<label class="ckbox">
										<input type="checkbox" class="checkboxclass" value="1" checked="checked" name="resview" id="resview"><span> View</span>
									</label>
								</div>
							</div>
							<div class="row pt-2">
								<div class="col-lg-4">
									<label >
										<span> <strong>Survey :</strong></span>
									</label>
								</div>
								<div class="col-lg-3">
									<label class="ckbox">
										<input type="checkbox" class="checkboxclass" value="1" checked="checked" name="surmake" id="surmake"><span> Make Survey</span>
									</label>
								</div>
								<div class="col-lg-2">
									<label class="ckbox">
										<input type="checkbox" class="checkboxclass" value="1" checked="checked" name="suredit" id="suredit"><span> Edit</span>
									</label>
								</div>
								<div class="col-lg-2">
									<label class="ckbox">
										<input type="checkbox" class="checkboxclass" value="1" checked="checked" name="surview" id="surview"><span> View</span>
									</label>
								</div>
							</div>




						</div><!-- col-3 -->

					</div><!-- row -->
					<div class="row pt-3">

						<div class="form-layout-footer">
							<button type="submit" class="btn btn-primary submit bd-0"><span id="inputmodebutton">Add User</span></button>
							<button type="button" class="btn btn-secondary bd-0" id="clearbutton">Clear</button>
						</div><!-- form-layout-footer -->
					</div><!-- form-layout -->
				</div>
			</form>


		</div><!-- section-wrapper -->


		<div class="section-wrapper pt-4">
			<label class="section-title"><i class="fas fa-user"></i> &nbsp;User Table</label>
			
			<div class="table-wrapper pt-2" >
				<table id="usertable" class="table display responsive nowrap">
					<thead>
						<tr>
							<th>id</th>
							<th class="wd-10p">User Name</th>
							<th class="wd-15p">Email</th>
							<th class="wd-15p">Registration</th>
							<th class="wd-15p">Election</th>
							<th class="wd-15p">Resolution</th>
							<th class="wd-15p">Survey</th>
							<th class="wd-25p">Action</th>

						</tr>
					</thead>
					<tbody id="userdatarow">
						


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

				$('#loaderpage').hide();

				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

				$('#usermanagetab').addClass('active');
				$('#clearbutton').click(function()
				{
					$('#form').trigger("reset");
				});
				var buttoncount=0;
				var data_username;
				$('#username').blur(function()
				{
					var username=$("#username").val();
					$.ajax({
						type: "get",
						data: {_token: CSRF_TOKEN,username:username}, 
						url: "{{Route('checkusername')}}",
						dataType:'json',
						success:function(data) {
							data_username=data.username;
							//console.log(data.username);

							if(data!=0)	
							{
								if($("#inputmode").val()=='insert' && username==data.username)
								{
									$("#username2").val(data.username);
									$("#usernamepresent").text('Username Already Present');
								}
								if($("#inputmode").val()=='update')
								{	
									if($("#username2").val()!=data.username)
									{
										$("#usernamepresent").text('Username Already Present');
									}	
									else{
										$("#usernamepresent").text('');
									}						
									

								}
								

							}	
							else
							{
								$("#usernamepresent").text('');
								//$("#username2").val('');

							}				
						}
					});

				});

				$('#password').blur(function()
				{
					var password=$('#password').val();
					if(password.length<6)
					{
						$('#passworlabel').text('Password Should Be 6 Or More Digit');
					}
					else
					{
						$('#passworlabel').text('');
					}
				});
				$(".checkboxclass").click(function(event){

					var id=$(this).attr('id');
					var val=$("#"+id).val();
					if(val==0)
					{
						$("#"+id).val(1);
					}
					else
					{
						$("#"+id).val(0);
					}

//$("#resmake").val(0);
});
				function show_product()
				{
					$('#loaderpage').show();

					$.ajax({
						type: "get",
						url: "{{Route('getalluser')}}",
						dataType:'json',
						success:function(data) {						
							$('#usertable').DataTable().clear().destroy();
							$.each(data, function (a, b) { 
								var regedit='danger';
								var elecedit='danger';;
								var resedit='danger';;
								var suredit='danger';;
								var regnew='danger';
								var elecmake='danger';;
								var resmake='danger';;
								var surmake='danger';;
								var regview='danger';;
								var elecview='danger';;
								var resview='danger';;
								var surview='danger';;
								if(b.regedit==1)  
								{
									var regedit= 'success';
								}
								if(b.elecedit==1)  
								{
									var elecedit= 'success';
								}
								if(b.resedit==1)  
								{
									var resedit= 'success';
								}
								if(b.suredit==1)  
								{
									var suredit= 'success';
								}
								//-----------------------------------------------------

								if(b.regnew==1)  
								{
									var regnew= 'success';
								}
								if(b.elecmake==1)  
								{
									var elecmake= 'success';
								}
								if(b.resmake==1)  
								{
									var resmake= 'success';
								}
								if(b.surmake==1)  
								{
									var surmake= 'success';
								}
								//-----------------------------------------------------
								if(b.regview==1)  
								{
									var regview= 'success';
								}
								if(b.elecview==1)  
								{
									var elecview= 'success';
								}
								if(b.resview==1)  
								{
									var resview= 'success';
								}
								if(b.surview==1)  
								{
									var surview= 'success';
								}
								$("#userdatarow").append(
									'<tr><td>'+b.id+'</td><td>'+b.username+'</td><td>'+b.email+'</td><td><label><span class="btn-'+regnew+' btn-sm rounded">Make</span></label> <label><span class="btn-'+regedit+' btn-sm rounded">Edit</span></label> <label><span class="btn-'+regview+' btn-sm rounded">View</span></label></td><td><label><span class="btn-'+elecmake+' btn-sm rounded">Make</span></label> <label><span class="btn-'+elecedit+' btn-sm rounded">Edit</span></label> <label><span class="btn-'+elecview+' btn-sm rounded">View</span></label></td><td><label><span class="btn-'+resmake+' btn-sm rounded">Make</span></label> <label><span class="btn-'+resedit+' btn-sm rounded">Edit</span></label> <label><span class="btn-'+resview+' btn-sm rounded">View</span></label></td><td><label><span class="btn-'+surmake+' btn-sm rounded">Make</span></label> <label><span class="btn-'+suredit+' btn-sm rounded">Edit</span></label> <label><span class="btn-'+surview+' btn-sm rounded">View</span></label></td><td><button class="btn btn-primary btn-sm rounded-circle editrecord tooltip2" id='+b.id+' ><span class="tooltiptext2">Edit Record</span><i class="fas fa-edit"></i></button>&nbsp;<a href="#deletemodalcall" class="modal-effect btn btn-danger btn-sm rounded-circle deletemodal tooltip2" data-toggle="modal" data-effect="effect-sign" id='+b.id+'><span class="tooltiptext2">Delete Record</span><i class="fas fa-trash"></i></a></td></tr>'
									);
                                      //alert(data[j].fullname);
                                  });
							$('#loaderpage').hide();

							createtable();
						}
					});
				}

				show_product();

				$("#form").on('submit',function(e){
					$('#loaderpage').show();
					e.preventDefault();
					var username = $('#username').val();
					var username2 = $('#username2').val();					
					var password = $('#password').val();
					var email = $('#email').val();
					var regnew = $('#regnew').val();
					var regedit = $('#regedit').val();
					var regview = $('#regview').val();

					var elecmake = $('#elecmake').val();
					var elecview = $('#elecview').val();
					var elecedit = $('#elecedit').val();

					var resmake = $('#resmake').val();
					var resview = $('#resview').val();
					var resedit = $('#resedit').val();

					var surmake = $('#surmake').val();
					var surview = $('#surview').val();
					var suredit = $('#suredit').val();

					$('#suredit').prop('checked', false);
					var inputmode=$("#inputmode").val();
					var updateid=$("#updateid").val();
					var username1 = $('#username').parsley();
					var password1 = $('#password').parsley();
					var email1 = $('#email').parsley();
					if(username1.isValid() && email1.isValid() && password1.isValid())
					{

						if(inputmode=='insert' && username!=username2)
						{
							$.ajax({
								type: "get",
								url: "{{Route('addusermanage')}}",
								data: {_token: CSRF_TOKEN,username:username,password:password,email:email,regnew:regnew,regedit:regedit,regview:regview,elecmake:elecmake,elecedit:elecedit,elecview:elecview,resmake:resmake,resview:resview,resedit:resedit,surmake:surmake,surview:surview,suredit:suredit}, 
								dataType:'json',
								success:function(data) {
									if(data==1)
									{
							//alert(1);
							var x = document.getElementById("snackbarsuccess");
							x.className = "show";
							setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);


							$('#form').trigger("reset");
							show_product();

						}
						else
						{
							alert('some error' );
						}
					}
				});
							
						}
						if(inputmode=='update')
						{
							//console.log('data::'+data_username);
							if(!data_username || data_username==$("#username2").val())
							{
							$.ajax({
								type: "get",
								url: "{{Route('updateusermanage')}}",
								data: {_token: CSRF_TOKEN,updateid:updateid,username:username,password:password,email:email,regnew:regnew,regedit:regedit,regview:regview,elecmake:elecmake,elecedit:elecedit,elecview:elecview,resmake:resmake,resview:resview,resedit:resedit,surmake:surmake,surview:surview,suredit:suredit}, 
								dataType:'json',
								success:function(data) {
									if(data==1)
									{
							//alert(1);
							var x = document.getElementById("snackbarupdate");
							x.className = "show";
							setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);


							$('#form').trigger("reset");
							$("#inputmode").val('insert');
							$("#inputmodelabel").text('Add User');
							$("#inputmodebutton").text('Add User');
							$('#passwordarea').show();						

							show_product();
						}
						else
						{
							alert('some error' );
						}
					}
				});
						}
						}
						$('#loaderpage').hide();

					}
					else
					{
						username1.validate();
						email1.validate();
						password1.validate();

					}

				});


				$("#userdatarow").on('click','.editrecord',function(){
					var id=$(this).attr('id');
					$.ajax({
						type: "get",
						url: "{{Route('editusermanage')}}",
						data: {_token: CSRF_TOKEN,id:id}, 
						dataType:'json',
						success:function(data) {
							$('#form').trigger("reset");

							$('#username').val(data.username);
							$('#username2').val(data.username);

							$('#password').val(data.password);
							$('#passwordarea').hide();						
							$('#email').val(data.email);
							if(data.regnew==0)
							{
								$("#regnew").prop('checked', false); 
							}
							$('#regnew').val(data.regnew);
							if(data.regedit==0)
							{
								$("#regedit").prop('checked', false); 
							}
							$('#regedit').val(data.regedit);
							if(data.regview==0)
							{
								$("#regview").prop('checked', false); 
							}
							$('#regview').val(data.regview);
							if(data.elecmake==0)
							{
								$("#elecmake").prop('checked', false); 
							}
							$('#elecmake').val(data.elecmake);
							if(data.elecview==0)
							{
								$("#elecview").prop('checked', false); 
							}
							$('#elecview').val(data.elecview);
							if(data.elecedit==0)
							{
								$("#elecedit").prop('checked', false); 
							}
							$('#elecedit').val(data.elecedit);
							if(data.resmake==0)
							{
								$("#resmake").prop('checked', false); 
							}
							$('#resmake').val(data.resmake);
							if(data.resview==0)
							{
								$("#resview").prop('checked', false); 
							}
							$('#resview').val(data.resview);
							if(data.resedit==0)
							{
								$("#resedit").prop('checked', false); 
							}
							$('#resedit').val(data.resedit);
							if(data.surmake==0)
							{
								$("#surmake").prop('checked', false); 
							}
							$('#surmake').val(data.surmake);
							if(data.surview==0)
							{
								$("#surview").prop('checked', false); 
							}
							$('#surview').val(data.surview);
							if(data.suredit==0)
							{
								$("#suredit").prop('checked', false); 
							}
							$('#suredit').val(data.suredit);
							$('#updateid').val(data.id);
							$("#inputmode").val('update');
							$("#inputmodelabel").text('Update User');
							$("#inputmodebutton").text('Update User');

						}
					});
				});


				$("#userdatarow").on('click','.deletemodal',function(){
					var id=$(this).attr('id');
					$("#deleteid").val(id);	
				});


				$(".deleterecord").click(function(){
					var id=$("#deleteid").val();
					$.ajax({
						type: "get",
						url: "{{Route('deleteusermanage')}}",
						data: {id:id}, 
						dataType:'json',
						success:function(data) {
							show_product();
						}
					});
				});

				function createtable()
				{
					$("#usertable").dataTable(
					{
						"info": true,
						"autoWidth": false,
						responsive: true,
						"order": [[ 0, "desc" ]],
						"columnDefs": [
						{
							"targets": [ 0],
							"visible": false,
						}],
						language: {
							searchPlaceholder: 'Search...',
							sSearch: '',
							lengthMenu: '_MENU_ items/page',
						}

					});
				} 

			});

		</script>
		@stop