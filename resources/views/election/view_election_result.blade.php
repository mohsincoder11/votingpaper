@extends('layout')
@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<div class="slim-mainpanel" style="margin-bottom: 18%;">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('addedelection')}}">Election

        </a></li>
      </ol>
      <h6 class="slim-pagetitle">Election Result</h6>
    </div><!-- slim-pageheader -->


    <div class="section-wrapper" id="print_area">
      <div class="col-lg-1 float-right">
                <button class="btn btn-warning " id="print_button"><i class="fas fa-print"></i>  Print Page</button>
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
@if($election_detail->ballottype==1)

<div class="row">
  <div class="col-lg-6">
   <label class="section-title">{{$election_detail->electionid}}
   </label>
   <p >{{$election_detail->votingtitle}}</p>

 </div>
 <div class="col-lg-6">
  <div id="piechart_3d" style="height: 300px;">
  </div>

</div>
</div>
<div class="table-responsive">
  <table class="table mg-b-0">
    <thead>
      <tr >
        <th width="10%">Candidate ID</th>
        <th  width="35%">Name</th>
        <th  width="15%"> Election Symbol</th>
        <th  width="15%">Total Vote</th>
      </tr>
    </thead>
    <tbody>
      @foreach($candidate_list ?? '' as $c)
      <tr>
        <th scope="row">{{$c->candidate_id_no}}</th>
        <td>{{$c->candidate_name}}</td>
        <td><img src="{{asset('public/election/svsp_election/'.$c->candidate_election_symbol)}}" class="election_candidate_images" alt=""></td>
        <td class="tx-18"><b> {{$c->totalvote}}</b></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div> 
@endif 

@if($election_detail->ballottype==2)
<div class="row">
  <div class="col-lg-6">
   <label class="section-title">{{$election_detail->electionid}}
   </label>
   <p class="mg-b-2 mg-sm-b-2">{{$election_detail->votingtitle}}</p>

 </div>

</div>
@php
$i=1;

@endphp
@foreach($election_poisition as $e)
@php
$data=DB::select("select sv.candidate_id_no,sv.candidate_name,sv.candidate_election_symbol,(select count(*) from  election_ans where election_ans.candidate_id=sv.id AND election_ans.position_id='$e->id') as totalvote from svsp_election_tables sv where sv.election_id='$election_detail->id' Group By sv.id order by totalvote desc");
//echo json_encode($data);

@endphp

<div class="row">
  <div class="col-lg-6"></div>
  <div class="col-lg-6">
    <div id="piechart_3d{{$i}}" style="height: 250px;"></div>


  </div>
</div>

<script>
 function drawChart() {
   var data=@php echo json_encode($data ?? ''); @endphp; 
  // console.log(data);
   var arrValues = [['Candidate', 'vote']];  
var total_vote=0;      // DEFINE AN ARRAY.
for(i=0;i<data.length;i++)
{
  total_vote=total_vote+data[i].totalvote;
  arrValues.push([data[i].candidate_name, data[i].totalvote]);
}
if(total_vote<1)
{
 $("#piechart_3d{{$i}}").html('<h4 class="text-grey tx-18">Not a single vote cast yet.</h4>');
}
var data = google.visualization.arrayToDataTable(arrValues);
var options = {
  title: 'Voting Result',
  is3D: true,
};
var chart = new google.visualization.PieChart(document.getElementById('piechart_3d{{$i}}'));
chart.draw(data, options);
return;
}               
google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart);


</script>
<p class="text-dark"><b>{{$e->position}}</b></p>


<div class="table-responsive mg-b-20">
  <table class="table ">
    <thead>
      <tr >
        <th width="10%">Candidate ID</th>
        <th  width="35%">Name</th>
        <th  width="15%"> Election Symbol</th>
        <th  width="15%">Total Vote</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $d)
      <tr>
        <th scope="row">{{$d->candidate_id_no}}</th>
        <td>{{$d->candidate_name}}</td>
        <td><img src="{{asset('public/election/svsp_election/'.$d->candidate_election_symbol)}}" class="election_candidate_images" alt=""></td>
        <td class="tx-18"><b> {{$d->totalvote}}</b></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div> 
@php
$i++;
@endphp

@endforeach
@endif


</div><!-- container -->


</div><!-- container -->
</div><!-- slim-mainpanel -->

@stop
@section('js')
<script>
  $("document").ready(function() {
    $("#electiontab").addClass('active');
    var type=@php echo $election_detail->ballottype; @endphp;
    if(type==1)
    {
     var data=@php echo json_encode($candidate_list ?? ''); @endphp;
//     console.log(data);
var total_vote=0;
for(i=0;i<data.length;i++)
{
 total_vote=total_vote+data[i].totalvote;

}
if(total_vote<1)
{

  $("#piechart_3d").html('<h4 class="text-grey tx-18">Not a single vote cast yet.</h4>');
}
else{
  drawchart_function(data);
}

}

function drawchart_function(data)
{
  var arrValues = [['Candidate', 'vote']];        // DEFINE AN ARRAY.
  var i = 0;
                //alert(data.length);
                for(i=0;i<data.length;i++)
                {
                    // POPULATE ARRAY WITH THE EXTRACTED DATA.
                    arrValues.push([data[i].candidate_name, data[i].totalvote]);

                  }
                  google.charts.load("current", {packages:["corechart"]});
                  google.charts.setOnLoadCallback(drawChart);
                  function drawChart() {
                    var data = google.visualization.arrayToDataTable( arrValues);

                    var options = {
                      title: 'Voting Result',
                      is3D: true,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                    chart.draw(data, options);
                  }
                }

                $('body').on('click','#print_button',function()
{
  $("#print_button").css("display", "none");

  var printContents = document.getElementById('print_area').innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;

  window.print();

  document.body.innerHTML = originalContents;
  $("#print_button").css("display", "");

})
                $("#loaderpage").hide();

              })
            </script>

            @stop