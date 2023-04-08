@extends('user_part.user_layout')
@section('content')

<div class="slim-mainpanel" style="margin-bottom: 18%;;">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">IBC Voting

          </a></li>
      </ol>
      <h6 class="slim-pagetitle">IBC VOTING</h6>
    </div><!-- slim-pageheader -->



    <div class="row row-sm mg-t-20" id="election_card">
    </div>

    </div><!-- container -->
  </div><!-- slim-mainpanel -->

  @stop
  @section('js')
  <script>
    $("document").ready(function() {
      $("#ibcvotingtab").addClass('active');

      $.ajax({
        type: "GET",
        url: 'api/view_ibcresolution',
        data: {
          entityid: $("#entityid").val(),
          mobno: $("#mobno").val()
        },
        dataType: "json",
        success: function(data) {
        //  console.log(data);
          $("#election_card").empty();

          if (data.length > 0) {
            $.each(data, function(a, b) {
                var end_time=b.voteenddate+' '+ b.voteendtime;
      var start_time=b.votestartdate+' '+ b.votestarttime;
      var end_time_sec = new Date(end_time).getTime();
      var start_time_sec = new Date(start_time).getTime();
      var current_time_sec = new Date().getTime();


      if(current_time_sec>start_time_sec && current_time_sec<end_time_sec)
      {
       btn_class='btn-primary';
       btn_text='Vote Now';
   }
   if(start_time_sec>current_time_sec)
   {
       btn_class='btn-warning disabled';
       btn_text='Upcoming Voting';     
   }   

   if(current_time_sec>end_time_sec)
   {
     btn_class='btn-danger disabled';
       btn_text='Time Over';     
   }     
                 if(b.ans_status==1)
            {
                btn_class='btn-success disabled';
             btn_text='Completed';

            }
            

             if(b.meetingtitle.length>20)
           {
                       var meeting_title=b.meetingtitle.substr(0,22)+'...';
           }
           else
           {
                       var meeting_title=b.meetingtitle;

           }
            if(b.votingtitle.length>20)
           {
                       var votingtitle=b.votingtitle.substr(0,22)+'...';
           }
           else
           {
                       var votingtitle=b.votingtitle;

           }

           
            $("#election_card").append('     <div class="col-lg-6 mg-t-20 mg-lg-t-10">            <div class="card card-sales">              <h3 class=" tx-primary">'+
                         b.ibcid + '</h3>              <div class="row">                <div class="col">                  <label class="tx-12">Survey Title</label>                  <p>' +
              votingtitle + '</p>                </div>                <div class="col">                  <label class="tx-12">Meeting Title</label>                  <p> '+
              meeting_title + '</p>                </div>                <div class="col">                  <label class="tx-12">Meeting Date</label>                  <p>'+b.meetingdate+'</p>                </div>              </div>               <div class="row">                <div class="col">                  <label class="tx-12">Start Date</label>                  <p>'+
              b.votestartdate+'</p>                </div>                <div class="col">                  <label class="tx-12">End Date</label>                  <p>'+
              b.voteenddate+'</p>                </div>                <div class="col">                  <label class="tx-12">End Time</label>                  <p>'+b.voteendtime+'</p>                </div>              </div>   <p class="mg-b-0"><a href="{{url("addibcvoting")}}/'+b.id+'/'+b.user_id+'"  class="btn '+btn_class+' btn-sm btn-block tx-14"> <b> '+btn_text+'</b> </a></p>            </div>          </div>');
          })
        } else {
            $("#election_card").append('  <div class="col-lg-4"></div><div class="class="col-lg-4 nothing_found " style="padding-left:5%;"><img src="{{asset("public/m_icon-nothing-found.png")}}"  alt=""> <p style="font-size: 20px;;"><b> Sorry No IBC Voting Found For You! </b> </p></div>')
          }

        }
      })
    })
  </script>

  @stop

  