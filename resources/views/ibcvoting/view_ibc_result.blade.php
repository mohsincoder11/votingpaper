@extends('layout')
@section('content')


<div class="slim-mainpanel" style="margin-bottom: 18%;">
  <div class="container">
    <div class="slim-pageheader">
     <ol class="breadcrumb slim-breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('addedibc')}}">IBC Voting</a></li>
      <li class="breadcrumb-item">IBC Voting Result</li>
    </ol>
    <h6 class="slim-pagetitle">IBC Voting Result</h6>
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

    <div class="row">
      <div class="col-lg-6">
       <label class="section-title">{{$ibc_data->ibcid}}
       </label>
       <p >{{$ibc_data->votingtitle}}</p>

     </div>
     <div class="col-lg-6">
      <div id="piechart_3d" style="height: 250px;">
      </div>

    </div>
  </div>
  <div class="table-responsive">
    <table class="table mg-b-0">
      <thead>
        <tr >
          <th  class="wd-40">Resolution Description</th>
          <th  class="wd-20"> Resolution Deatail</th>
          <th  class="wd-40">Result</th>
        </tr>
      </thead>
      <tbody>
        @php
        $yes_countt=0;
        $no_countt=0;
        $abstained_countt=0;
        $favor_countt=0;
        $against_countt=0;
        $accept_countt=0;
        $reject_countt=0;
        @endphp

        @foreach($ibc_que as $q)
        <tr>
          <td>{{ucfirst($q->resdescription)}}</td>
          <td> 
            @if($q->resolutiondetail)
            <a href="{{asset('public/resolution/'.$q->resolutiondetail)}}" class="tx-primary tooltip2" target="_blank" download><span class="tooltiptext2">Download Description File</span><i class="fas fa-download"></i>
            </a>
            @else
            <b>No File</b>
            @endif

            
          </td>
          @if($ibc_data->resulttype=='yn')
          <td>
            @php
            $yes_count=DB::table('resolution_ans')->where('resolution_que_id',$q->id)->where('ans','yes')->count();
            $no_count=DB::table('resolution_ans')->where('resolution_que_id',$q->id)->where('ans','no')->count();
            $abstained_count=DB::table('resolution_ans')->where('resolution_que_id',$q->id)->where('ans','abstained')->count();
            $yes_countt=$yes_countt+$yes_count;
            $no_countt=$no_countt+$no_count;
            $abstained_countt=$abstained_countt+$abstained_count;
            $total_yn=$yes_count+$no_count+$abstained_count;
            @endphp
<div class="row col-lg-12">
  <div class="col-lg-8">
     <label for="" class="btn btn-sm btn-primary">Yes - {{$yes_count}}</label>
            <label for="" class="btn btn-sm btn-danger">No - {{$no_count}}</label> 
            <label for="" class="btn btn-sm btn-warning">Abstained - {{$abstained_count}}</label>
          
  </div>
  
  <div class="col-lg-3">
                   <div id="morrisDonut{{$q->id}}" class="ht-120 "></div>

  </div>
</div>
<script>
  var id='morrisDonut'+'{{$q->id}}';
  new Morris.Donut({
    element: id,
    data: [
      {label: "Yes", value: '{{$yes_count}}'},
      {label: "No", value: '{{$no_count}}'},
      {label: "Abstained", value: '{{$abstained_count}}'}
    ],
    colors: ['#1b84e7','#dc3545','#F49917'],
    resize: true,
        formatter: function (value, data) { return value+' ('+ (value/'{{$total_yn}}' *100).toFixed(2) + '%)'; }

  });
  </script>

          </td>

          @endif
          @if($ibc_data->resulttype=='ad')
          <td>
            @php
            $favor_count=DB::table('resolution_ans')->where('resolution_que_id',$q->id)->where('ans','favor')->count();
            $against_count=DB::table('resolution_ans')->where('resolution_que_id',$q->id)->where('ans','against')->count();
            $abstained_count=DB::table('resolution_ans')->where('resolution_que_id',$q->id)->where('ans','abstained')->count();

            $favor_countt=$favor_countt+$favor_count;
            $against_countt=$against_countt+$against_count;
            $abstained_countt=$abstained_countt+$abstained_count;
                        $total_ad=$favor_count+$against_count+$abstained_count;

            @endphp
<div class="row col-lg-12">
  <div class="col-lg-8">

            <label for="" class="btn btn-sm btn-primary">Favor - {{$favor_count}}</label>
            <label for="" class="btn btn-sm btn-danger">Against - {{$against_count}}</label> 
            <label for="" class="btn btn-sm btn-warning">Abstained - {{$abstained_count}}</label>
          </div>
             <div class="col-lg-3">
                   <div id="morrisDonut{{$q->id}}" class="ht-120 "></div>

</div>
</div>
<script>
  var id='morrisDonut'+'{{$q->id}}';
  new Morris.Donut({
    element: id,
    data: [
      {label: "Favor", value: '{{$favor_count}}'},
      {label: "Against", value: '{{$against_count}}'},
      {label: "Abstained", value: '{{$abstained_count}}'}
    ],
    colors: ['#1b84e7','#dc3545','#F49917'],
    resize: true,
            formatter: function (value, data) { return value+' ('+ (value/'{{$total_ad}}' *100).toFixed(2) + '%)'; }


  });
  </script>
          </td>
          @endif
          @if($ibc_data->resulttype=='ar')
          <td>
            @php
            $accept_count=DB::table('resolution_ans')->where('resolution_que_id',$q->id)->where('ans','accept')->count();
            $reject_count=DB::table('resolution_ans')->where('resolution_que_id',$q->id)->where('ans','reject')->count();
            $abstained_count=DB::table('resolution_ans')->where('resolution_que_id',$q->id)->where('ans','abstained')->count();
            $accept_countt=$accept_countt+$accept_count;
            $reject_countt=$reject_countt+$reject_count;
            $abstained_countt=$abstained_countt+$abstained_count;   
            $total_ar=$accept_count+$reject_count+$abstained_count;
            @endphp
<div class="row col-lg-12">
  <div class="col-lg-8">

            <label for="" class="btn btn-sm btn-primary">Accept - {{$accept_count}}</label>
            <label for="" class="btn btn-sm btn-danger">Reject - {{$reject_count}}</label> 
            <label for="" class="btn btn-sm btn-warning">Abstained - {{$abstained_count}}</label>
          </div>
             <div class="col-lg-3">
                   <div id="morrisDonut{{$q->id}}" class="ht-120 "></div>

</div>
</div>
<script>
  var id='morrisDonut'+'{{$q->id}}';
  new Morris.Donut({
    element: id,
    data: [
      {label: "Accept", value: '{{$accept_count}}'},
      {label: "Reject", value: '{{$reject_count}}'},
      {label: "Abstained", value: '{{$abstained_count}}'}
    ],
    colors: ['#1b84e7','#dc3545','#F49917'],
    resize: true,
        formatter: function (value, data) { return value+' ('+ (value/'{{$total_ar}}' *100).toFixed(2) + '%)'; }


  });
  </script>
          </td>
          @endif

        </tr>



        @endforeach

      </tbody>
    </table>
  </div> 




</div><!-- container -->


</div><!-- container -->
</div><!-- slim-mainpanel -->

@stop
@section('js')

<script>
  $("document").ready(function() {
    
    $("#ibcvotingtab").addClass('active');
  
    if('{{$ibc_data->resulttype}}'=='yn')
    {



      var total_vote=Math.floor('{{$yes_countt}}')+Math.floor('{{$no_countt}}')+Math.floor('{{$abstained_countt}}');
      var yes_count=parseInt('{{$yes_countt}}');
      var no_count=parseInt('{{$no_countt}}');
      var abstained_count=parseInt('{{$abstained_countt}}');

      if(total_vote<1)
      {

        $("#piechart_3d").html('<h4 class="text-grey tx-18">Not a single vote cast yet.</h4>');
      }
      else{

        drawchart_function('yn');
      }
    }

    if('{{$ibc_data->resulttype}}'=='ar')
    {


      var total_vote=Math.floor('{{$accept_countt}}')+Math.floor('{{$reject_countt}}')+Math.floor('{{$abstained_countt}}');
      var accept_count=parseInt('{{$accept_countt}}');
      var reject_count=parseInt('{{$reject_countt}}');
      var abstained_count=parseInt('{{$abstained_countt}}');

      if(total_vote<1)
      {

        $("#piechart_3d").html('<h4 class="text-grey tx-18">Not a single vote cast yet.</h4>');
      }
      else{
        drawchart_function('ar');
      }
    }

    if('{{$ibc_data->resulttype}}'=='ad')
    {


      var total_vote=Math.floor('{{$favor_countt}}')+Math.floor('{{$no_countt}}')+Math.floor('{{$abstained_countt}}');
      var favor_count=parseInt('{{$favor_countt}}');
      var against_count=parseInt('{{$against_countt}}');
      var abstained_count=parseInt('{{$abstained_countt}}');

      if(total_vote<1)
      {

        $("#piechart_3d").html('<h4 class="text-grey tx-18">Not a single vote cast yet.</h4>');
      }
      else{
        drawchart_function('ad');
      }
    }

    function drawchart_function(type)
    {

       if(type=='ar') 
       {
                 var data =[
      {label: "Accept", value: accept_count},
      {label: "Reject", value: reject_count},
      {label: "Abstained", value: abstained_count}
    ];
        var total=Math.floor(accept_count)+Math.floor(reject_count)+Math.floor(abstained_count);
   
       } 
       if(type=='ad') 
       {
            var data =[
      {label: "Favor", value: favor_count},
      {label: "Against", value: against_count},
      {label: "Abstained", value: abstained_count}
    ];
        var total=Math.floor(favor_count)+Math.floor(against_count)+Math.floor(abstained_count);
   
       } 
       if(type=='yn') 
       {
         var data =[
      {label: "Yes", value: yes_count},
      {label: "No", value: no_count},
      {label: "Abstained", value: abstained_count}
    ];
        var total=Math.floor(yes_count)+Math.floor(no_count)+Math.floor(abstained_count);
       } 
      

     new Morris.Donut({
    element: 'piechart_3d',
    data:data ,
    colors: ['#1b84e7','#dc3545','#F49917'],
    resize: true,
    formatter: function (value, data) { return value+' ('+ (value/total *100).toFixed(2) + '%)'; }

  });
    
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