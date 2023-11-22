@extends('layout')
@section('content')
<div id="snackbarsuccess">

    <strong>Success!</strong> Notification Sent Successfully.

</div>
<div class="slim-mainpanel" style="margin-bottom: 8%;">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="">Send Notification

                    </a></li>
            </ol>
            <h6 class="slim-pagetitle">Send Notification</h6>
        </div><!-- slim-pageheader -->
        <div class="section-wrapper">
            <form id="feedback_form">
                <input type="hidden" id="updateid">
                <input type="hidden" id="inputmode" value="insert">
                <div class="card card-quick-post mg-t-10">
                    <div class="row">
                    <div class="col-md-3" id="entitydiv">
                           <label class="form-control-label">Select Entity</label>
                            <select class="form-control select2-show-search" data-placeholder="Select Entity" id="entity_list" required>

                            </select>
                        </div>
                        <div class="col-md-3" id="userdiv">
                           <label class="form-control-label">Select User <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search " multiple data-placeholder="Select User" name="user[]" id="user" required>

                            </select>
                        </div>
                        <div class="col-lg-3" id="otherinput">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Title <span class="tx-danger">*</span></label>
                                <input class="form-control" value="" placeholder="Title" name="title" id="title" required>

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-3">
                           <label class="form-control-label">Message <span class="tx-danger">*</span></label>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Write message here" id="message" required></textarea>
                            </div><!-- form-group -->
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary col-md-2" id="submit_btn">Send</button>
                    </div><!-- card-footer -->
                </div><!-- card -->

            </form>

        </div><!-- section-wrapper -->
          <div class="section-wrapper mg-t-5">
              <div class="table-wrapper ">
                <table id="notification_table" class="table">
                    <thead>
                        <tr class="wd-100p">
                            <th class="wd-10p"></th>
                            <th class="wd-10p">No of User</th>
                            <th class="wd-20p"> Title</th>
                            <th class="wd-50">Message</th>
                            <th class="wd-10p">Action</th>

                        </tr>

                    </thead>
                    <tbody id="notification_table_row" class="notification_table_row">
                        


                    </tbody>
                </table>
            </div><!-- table-wrapper -->


        </div><!-- section-wrapper -->
    </div>
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
                    <h5 class="lh-3 tx-inverse">Are You Sure You Want To Delete This Notification ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger delete_model_btn" data-dismiss="modal"><i class="fas fa-trash"></i>&nbsp;Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i>&nbsp;Cancel</button>
                    </div>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->



  <div id="viewmodal" class="modal fade">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">User List </h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pd-20">

             <div class="table-responsive lh-3">

            <table class="table" id="notificaton_list_table">
              <thead>
                <tr style="width: 1000px;">
                  <th style="width: 150px;">User</th>
                  <th style="width: 250px;">Title</th>
                  <th style="width: 500px;">Message</th>
                  <th style="width: 100px;">Action</th>
                </tr>
              </thead>
              <tbody id="notificaton_list">
               
              
              </tbody>
            </table>
          </div><!-- table-responsive -->
          </div><!-- modal-body -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->
@stop
@section('js')
<script>
    $(document).ready(function() {
              var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
               get_all_notification();

        $("#submit_btn").on('click', function(e) {

            'use strict';
            if($("#inputmode").val()=='insert')
            {
                  if ($("#entity_list").val() == '' || $("#title").val() == '' || $("#message").val() == '' || $("#user").val() == ''  || $("#user").val() == null) {
                $('#feedback_form').parsley();
                return;

            }
            }
          
            e.preventDefault();
            $.ajax({
                type: "get",
                url: 'send_notification',
                data: {
                    entity_id: $("#entity_list").val(),
                    title: $("#title").val(),
                    mobile_no: $("#user").val(),
                    sender_id: $("#sender_id").val(),
                    message: $("#message").val(),
                    inputmode: $("#inputmode").val(),
                    updateid: $("#updateid").val(),
                },
                dataType: "json",
                success: function(data) {
                    var x = document.getElementById("snackbarsuccess");
                    x.className = "show";
                    setTimeout(function() {
                        x.className = x.className.replace("show", "");
                       location.reload();
                    }, 3000);

                    $("#feedback_form")[0].reset();

                }

            })
        })

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{Route('getentitylist')}}",
            success: function(data) {
                $("#entity_list").empty();
                $("#entity_list").append(
                    '<option label="Choose one"></option>');
                $.each(data, function(a, b) {
                    $("#entity_list").append(
                        '<option value="' + b.id + '">' + b.entityname + '</option>'
                    );

                });

                $("#entity_list").selectpicker("refresh");

            }
        });
function get_all_notification()
{
    

           $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{Route('get_all_adminnotification')}}",
            success: function(data) {
             
                            $('#notification_table').DataTable().clear().destroy();
                $.each(data, function(a, b) {
                    $("#notification_table_row").append(' <tr><td>'+b.id+'</td><td>'+b.noofuser+'</td><td>'+b.title+'</td><td>'+b.message+'</td><td><a class="btn btn-sm rounded-circle btn-info modal-effect viewbutton tooltip2" id="'+b.id+'" href="#viewmodal" data-toggle="modal" data-effect="effect-sign "><span class="tooltiptext2">View Record</span><i class="fas fa-eye"></i></a> <button class="btn btn-sm rounded-circle btn-warning editbutton tooltip2" id="'+b.id+'" ><span class="tooltiptext2">Edit Record</span><i class="fas fa-edit"></i></button> <a href="#deletemodalcall" class="modal-effect btn btn-danger btn-sm rounded-circle delete_notification tooltip2" data-toggle="modal" data-effect="effect-sign" id='+b.id
                                         +' ><span class="tooltiptext2">Delete Record</span><i class="fas fa-trash"></i></a> </td></tr>');

                });

createtable1();
            }
        });
           }
        $('#loaderpage').hide();
        $("#notification_table tbody").on('click','.delete_notification',function(){
                    var id=$(this).attr('id');
                    $("#deleteid").val(id); 
                });

       $('.delete_model_btn').on('click', function () 
  {
                    var id=$("#deleteid").val();
      $.ajax({
        type: "get",
        url: "{{Route('delete_notification')}}",
        data: {_token: CSRF_TOKEN,id:id}, 
        dataType:'json',
         success:function(data) {
            get_all_notification();
     }
    });
  })
        $("#notification_table tbody").on('click','.viewbutton',function()  {
    var id=$(this).attr('id');
      $.ajax({
        type: "get",
        url: "{{Route('get_single_notification')}}",
        data: {_token: CSRF_TOKEN,id:id}, 
        dataType:'json',
         success:function(data) {
            //console.log(data);
        
         $("#notificaton_list").empty(); 
         $.each(data,function(a,b)
         {
                     $("#notificaton_list").append('<tr><td>'+b.memname+'</td><td>'+b.title+'</td><td>'+b.message+'</td><td><button class="btn btn-danger btn-sm rounded-circle deleterow" id="'+b.id+'"><i class="fa fa-trash"></i></button></td></tr>'); 


         })
     }
    });
  })

        $("#notificaton_list_table tbody").on('click','.deleterow',function()  {
    var id=$(this).attr('id');
                                    $(this).parent().parent().remove();

      $.ajax({
        type: "get",
        url: "{{Route('delete_single_notification')}}",
        data: {_token: CSRF_TOKEN,id:id}, 
        dataType:'json',
         success:function(data) {
            //console.log(data);

     }
    });
  })

        $("#notification_table tbody").on('click','.editbutton',function()  {
  
    var id=$(this).attr('id');
      $.ajax({
        type: "get",
        url: "{{Route('edit_notification')}}",
        data: {_token: CSRF_TOKEN,id:id}, 
        dataType:'json',
         success:function(data) {
            //console.log(data);
            $("#userdiv").hide();
            $("#entitydiv").hide();

            $("#title").val(data.title);
            $("#message").val(data.message);
            $("#updateid").val(data.id);
                        $("#inputmode").val('update');

            $("#submit_btn").text('Update');

     }
    })
  })



        $('.select2-show-search').select2({
            minimumResultsForSearch: ''
        });

		$('#entity_list').on('change', function() 
{
    $('#loaderpage').show();

    $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{Route('get_user_byentity')}}",
            data:{id:$("#entity_list").val()},
            success: function(data) {
                $("#user").empty();

                if(data!='')
                {
                $("#user").append(
                    '<option label="Choose one"></option><option value="all">All</option>');
                $.each(data, function(a, b) {
                    $("#user").append(
                        '<option value="' + b[0].mobno + '">' + b[0].memname + '</option>'
                    );

                });

                $("#user").selectpicker("refresh");
                }
                
                $('#loaderpage').hide();


            }
        });
})






    function createtable1(){
                    'use strict';
                    $('#notification_table').DataTable({
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



    })
</script>
@stop