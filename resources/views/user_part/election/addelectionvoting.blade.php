@extends('user_part.user_layout')
@section('content')
<div id="snackbarsuccess">

  <strong>Success!</strong> You Have Voted Successfully.

</div>
<div id="snackbardanger">

  <strong>Error!</strong> Please Vote For All The Positions.

</div>


<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="electiondetails.html">Election

        </a></li>
      </ol>
      <h6 class="slim-pagetitle">Election</h6>
    </div><!-- slim-pageheader -->
    <form id="election_form">

      <input type="hidden" id="election_id" value="{{$election_position[0]->election_id}}">
      <input type="hidden"  value="{{$user_id}}" id="user_id2">
      <input type="hidden"  value="{{$election_data->voteenddate}} {{$election_data->voteendtime}} " id="enddatetime">
      
      <input type="hidden" value="{{count($election_position)}}" id="position_length">
      <input type="hidden"  value="{{$election_data->ballottype}} " id="ballottype">
      @foreach($election_position as $e)
      <input type="hidden" name="{{$e->id}}" value="{{$e->id}}">
      <div class="row row-sm mg-t-30">
        <div class="col-lg-12">


          <div class="card card-table">
            <div class="card-header">
              <h6 class="slim-card-title">Position: {{ucfirst($e->position)}}</h6>
              <div class="timer_position"><i class="fas fa-hourglass-half glassrotate">  </i> &nbsp;<span id="timer" class="timer"> </span></div>
            </div><!-- card-header -->
            @if($election_data->ballottype==1 || $election_data->ballottype==2)
            <div class="table-responsive">
              <table class="table mg-b-0 tx-13">
               <thead>
                 <th width="12%">Candidate ID</th>
                 <th width="12%">Candidate Image</th>
                 <th width="15%">Candidate Name</th>
                 <th width="15%">Candidate Info</th>
                 <th width="10%">Group Name</th>
                 <th width="13%">Election Symbol</th>
                 <th width="10%">Biodata</th>
                 <th width="12%">Vote</th>
               </thead>
               <tbody>

                @foreach($election_candidate as $ec)
                @if($ec->position_id==$e->id)
                <tr>


                  <td class="align-middle">{{$ec->candidate_id_no}}</td>
                  <td class="pd-l-20">
                    <img src="{{asset('public/election/svsp_election/'.$ec->candidate_photo)}}" class="wd-55 ht-55" alt="Image">
                  </td>
                  <td class="align-middle"> {{$ec->candidate_name}}</td>
                  <td class="align-middle"> {{$ec->candidate_info}}</td>
                  <td class="align-middle"> {{$ec->group_name}}</td>
                  <td class="pd-l-20">
                    <img src="{{asset('public/election/svsp_election/'.$ec->candidate_election_symbol)}}" class="wd-55 ht-55" alt="Image">
                  </td>
                  <td class="align-middle"
                  class="col-2 col-sm-2 col-lg-1 tx-center mg-t-10 mg-lg-t-0"
                  title="bar-chart">
                  <a href="{{asset('public/election/svsp_election/'.$ec->candidate_biodata)}}" ] class="tx-primary tooltip2" target="_blank" download><span class="tooltiptext2">Download Biodata</span><i class="fas fa-download"></i></a>

                </td>
                <td>
                 <div >
                  <label class="switchss">
                    <input class="switch-input " name="vote{{$ec->position_id}}" value="{{$ec->id}}" cand_id="{{$ec->id}}" type="radio" required="" />
                    <span class="switch-label" data-on="Voted" data-off="Vote"></span> 
                    <span class="switch-handle"></span> 
                  </label>
                </div><!-- btn-demo -->
              </td>
            </tr>
            @endif
            @endforeach


          </tbody>
        </table>
      </div><!-- table-responsive -->
      @endif
      @if($election_data->ballottype==3 || $election_data->ballottype==4)
      <div class="table-responsive">
        <table class="table mg-b-0">
          <thead>
           <th width="15%">Candidate ID</th>
           <th width="15%">Candidate Image</th>
           <th width="15%">Candidate Name</th>
           <th width="15%">Group Name</th>
           <th width="15%">Election Symbol</th>
           <th width="10%">Action</th>
         </thead>
         <tbody  id="{{$e->id}}" class="sortable">
          @foreach($election_candidate as $ec)
          @if($ec->position_id==$e->id)
          <tr id="{{$ec->id}}" >

            <td class="valign-middle">{{$ec->candidate_id_no}}</td>
            <td class="pd-l-20">
              <img src="{{asset('public/election/svsp_election/'.$ec->candidate_photo)}}" class="wd-55 ht-55" alt="Image">
            </td>
            <td class="valign-middle"> {{$ec->candidate_name}}</td>
            <td class="valign-middle"> {{$ec->group_name}}</td>
            <td class="pd-l-20">
              <img src="{{asset('public/election/svsp_election/'.$ec->candidate_election_symbol)}}" class="wd-55 ht-55" alt="Image">
            </td>
            <td class="valign-middle">
             <a href="{{asset('public/election/svsp_election/'.$ec->candidate_biodata)}}" data-placement="top" title="Download Biodata File" target="_blank" download><i class="fas fa-download tx-28"></i></a>

           </td>

         </tr>
         @endif
         @endforeach
       </tbody>
     </table>
   </div><!-- table-responsive -->
   @endif



 </div><!-- card -->

</div><!-- col-6 -->
</div><!-- row -->
@endforeach
<div class="col-sm-12 col-md-12 pd-t-20">
  <div class="btn-demotext-align-center">
    <button type="button" class="btn btn-primary active col-lg-3 mg-b-10" id="submit_btn">Submit</button>
  </div><!-- btn-demo -->
</div><!-- card-footer -->
</form>

</div><!-- container -->
</div><!-- slim-mainpanel -->


@stop
@section('js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>


  $(document).ready(function()
  {
    var position_id_array = @php echo json_encode($position_id_array); @endphp;
  //console.log(position_id_array);


  var ans_array3 = [];
  $("#electiontab").addClass('active');
  var enddatetime=$("#enddatetime").val();
  var countdown = new Date(enddatetime).getTime();
  var distance;
  var check_api_call=0;
  var x = setInterval(function(){
    var now = new Date().getTime();
    distance = countdown - now;

    if(distance<1 )
    {
      window.location.href = "{{Route('electiondetails')}}";                 
    }
    else
    {
     var days = Math.floor(distance / (1000 * 60 * 60 * 24));
     var hours = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
     var minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
     var seconds = Math.floor(distance % (1000 *60) / 1000);

     seconds=seconds < 10 ? ("0" + seconds) : seconds;
     minutes=minutes < 10 ? ("0" + minutes) : minutes;
     hours=hours < 10 ? ("0" + hours) : hours;
     document.getElementById("timer").innerHTML = days +" d "+  hours + " : " + minutes + " : " + seconds;
   }


 },1000);


  $("#submit_btn").on('click',function()
  {
    var ballottype=$("#ballottype").val();  
    var str = $('#election_form').serializeArray();

    if(ballottype==1 || ballottype==2)
    {



     /// $('#submit_btn').prop("disabled", true)
     if($("#position_length").val()!=str.length/2)
     {
       var x = document.getElementById("snackbardanger");
       x.className = "show";
       setTimeout(function() {
        x.className = x.className.replace("show", "");
      }, 3000);
     }  


     var ans_array = [];
     var i=0;
     var j=0;
     for(i=0;i<(str.length)/2;i++)
     {
      var ans = {
        id: str[j+1]['value'],
        election_id:$("#election_id").val(),
        user_id:$("#user_id2").val(),
        position_id:str[j]['value'],
        rank:'null',
      }
      ans_array[i] = ans;
      j=j+2;
    }


    $.ajax({
      type: "POST",
      url: '{{route("insert_election_ans")}}',
    data: {
      election_ans:ans_array
    },
    dataType: "json",
    success: function(data) {


     var x = document.getElementById("snackbarsuccess");
     x.className = "show";
     setTimeout(function() {
      x.className = x.className.replace("show", "");
      window.location.href = '{{url('electiondetails')}}';
    }, 3000);
   }
 })
  }
  else
  {

    $.ajax({
      type: "POST",
      url: '{{route("insert_election_ans")}}',
      data: {
        election_ans:ans_array3,ballottype:ballottype,
      },
      dataType: "json",
      success: function(data) {
      //  console.log(data);

      var x = document.getElementById("snackbarsuccess");
      x.className = "show";
      setTimeout(function() {
        x.className = x.className.replace("show", "");
        window.location.href = '{{url('electiondetails')}}';
      }, 3000);
    }
  }) 
  }
})


  $( function() {
   $('.sortable').sortable({
     revert: 600,
     update: function () 
     {
       var id=$(this).attr('id');

       save_new_order(id);
     }
   });
   var pid=[];
   var id=2;
   save_new_order();


   var l=2;
   function save_new_order() {
    ans_array3=[];
    var k;
    var i=0;

    var no_of_position;
    for(k=0;k<position_id_array.length;k++)
    {
  //console.log(position_id_array[k]);
  
  var array_name="ans_array"+position_id_array[k];
  var array_name=[];
  $('#'+position_id_array[k]['id']).children().each(function (i) {
    var ans = {                      

      id: $(this).attr('id'),
      election_id:$("#election_id").val(),
      user_id:$("#user_id2").val(),
      position_id:position_id_array[k]['id'],
      rank:i,
    }
    array_name.push(ans);

  });
  ans_array3.push(array_name);
  // console.log(array_name);
}


       // console.log(ans_array3);

     }

   } );
})
</script>
@stop



