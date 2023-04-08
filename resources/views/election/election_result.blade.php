@extends('layout')
@section('content')

<div class="slim-mainpanel" style="margin-bottom: 18%;">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('addedelection')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Election Result

        </a></li>
      </ol>
      <h6 class="slim-pagetitle">Election Result</h6>
    </div><!-- slim-pageheader -->



    <div class="row row-sm mg-t-20" id="election_card">
    </div>

  </div><!-- container -->
</div><!-- slim-mainpanel -->

@stop
@section('js')
<script>
  $("document").ready(function() {
    $("#electiontab").addClass('active');

    $.ajax({
      type: "GET",
      url: '{{route('live_election')}}',
      dataType: "json",
      success: function(data) {
        console.log(data);

        $("#election_card").empty();

        if (data.length > 0) {
          $.each(data, function(a, b) {
           btn_class='btn-primary';
           btn_text='View Result';
           
           if(!b.meetingtitle==null)
           {
            if(b.meetingtitle.length>20)
            {
             var meeting_title=b.meetingtitle.substr(0,22)+'...';
           }
           else
           {
             var meeting_title=b.meetingtitle;

           }
         }               
         if(b.votingtitle.length>20)
         {
           var votingtitle=b.votingtitle.substr(0,22)+'...';
         }
         else
         {
           var votingtitle=b.votingtitle;

         }           
         var remaining=b.total_voter-b.voted;
                  $("#election_card").append('     <div class="col-lg-6 mg-t-20 mg-lg-t-10">            <div class="card card-sales">              <h3 class=" tx-primary">'+
           b.electionid + '</h3>              <div class="row">                <div class="col">                  <label class="tx-12">Voting Title</label>                  <p>' +
           votingtitle + '</p>                </div>                <div class="col">                  <label class="tx-12">Meeting Title</label>                  <p> '+
           meeting_title + '</p>                </div>                <div class="col">                  <label class="tx-12">Meeting Date</label>                  <p>'+b.meetingdate+'</p>                </div>              </div>               <div class="row">                <div class="col">                  <label class="tx-12">Start Date</label>                  <p>'+
           b.votestartdate+'</p>                </div>                <div class="col">                  <label class="tx-12">End Date</label>                  <p>'+
           b.voteenddate+'</p>                </div>                <div class="col">                  <label class="tx-12">End Time</label>                  <p>'+b.voteendtime+'</p>                </div>              </div> <div class="row">                <div class="col">                  <label class="tx-12">Total Voter</label>                  <p>'+
           b.total_voter+'</p>                </div>                <div class="col">                  <label class="tx-12">Total Voted</label>                  <p>'+
           b.voted+'</p>                </div>                <div class="col">                  <label class="tx-12">Remaining Voter</label>                  <p>'+remaining+'</p>                </div>              </div>   <p class="mg-b-0"><a href="{{url("view_election_result")}}/'+b.id+'"  class="btn '+btn_class+' btn-sm btn-block tx-14"> <b> '+btn_text+'</b> </a></p>            </div>          </div>');
       })
        } else {
          $("#election_card").append('  <div class="col-lg-4"></div><div class="class="col-lg-4 nothing_found " style="padding-left:5%;"><img src="{{asset("public/m_icon-nothing-found.png")}}"  alt=""> <p style="font-size: 20px;;"><b> Sorry No Election Found For You! </b> </p></div>')
        }

      }
    })
  })
</script>

@stop