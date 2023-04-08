@extends('user_part.user_layout')
@section('content')
<div id="snackbarsuccess">

			<strong>Success!</strong> Feedback Submitted Successfully.
		
</div>
  <div class="slim-mainpanel">
    <div class="container">
      <div class="slim-pageheader">
        <ol class="breadcrumb slim-breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('user_dashboard')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="">My Feedback

            </a></li>
        </ol>
        <h6 class="slim-pagetitle">My Feedback</h6>
      </div><!-- slim-pageheader -->
      <div class="section-wrapper">
      <form id="feedback_form">
      <div class="card card-quick-post mg-t-10">
      <div class="row">
      <div class="col-md-3">
     <label class="form-control-label">I'm telling you about</label>
            <select class="form-control select2" data-placeholder="Choose one" id="category" required>
              <option label="Choose one"></option>
              <option value="ui_issue">UI issue</option>
              <option value="a_bug">A bug</option>
              <option value="functionality">Functionality</option>
              <option value="other">Other</option>
            </select>
      </div>
      <div class="col-md-9">
     <label class="form-control-label">Share Your Feedback</label>
              <div class="form-group">
                <textarea class="form-control" rows="3" placeholder="What's on your mind?"  id="description" required></textarea>
              </div><!-- form-group -->
      </div>
      </div>
              
              <div class="card-footer">
                <button class="btn btn-primary col-md-2" id="submit_btn">Submit</button>
              </div><!-- card-footer -->
            </div><!-- card -->
      
      </form>

      </div><!-- section-wrapper -->
    </div>
  </div>
 @stop
 @section('js')
 <script>
 $(document).ready(function()
 {
  $("#submit_btn").on('click',function(e) {
    'use strict';
if($("#category").val()=='' || $("#description").val()=='')
{
  $('#feedback_form').parsley();
  return;

}
e.preventDefault();


$.ajax({
type: "post",
url: 'api/insert_user_feedback',
data: {
  description: $("#description").val(),
  category: $("#category").val(),
  user_id: $("#user_id").val(),
},
dataType: "json",
success: function(data) {
  var x = document.getElementById("snackbarsuccess");
x.className = "show";
setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

  $("#feedback_form")[0].reset();

}

})
})

 })
 </script>
 @stop