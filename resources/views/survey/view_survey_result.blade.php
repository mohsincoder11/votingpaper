@extends('layout')
@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<div class="slim-mainpanel" style="margin-bottom: 18%;">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{url('added_survey')}}">Survey

        </a></li>
      </ol>
      <h6 class="slim-pagetitle">Survey Result</h6>
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
         <label class="section-title">{{$survey_data->surveyid}}
         </label>
         <p >{{$survey_data->surveytitle}}</p>

       </div>
<!--  <div class="col-lg-6">
  <div id="piechart_3d" style="height: 300px;">
  </div>

</div> -->
</div>
<div class="table-responsive">
  <table class="table mg-b-0">
    <thead>
      <tr >
        <th width="15%">Question Type</th>
        <th  width="35%">Question</th>
        <th  width="50%"> Result</th>
      </tr>
    </thead>
    <tbody>
      @foreach($survey_que ?? '' as $c)
      <tr>
        <th scope="row">{{$c->question_type}}</th>
        <td>
          <div class="col-lg-11">
            {{$c->question}}
            @if($c->question_type=='Image')
            <p>  <img class="custom_survey_class pd-t-20" src="{{asset('public/images/survey_questions/'.$c->question_image)}}"  alt="Image">
            </p>
            @endif

          </div>
        </td>


        <td class="tx-18">
          @if($c->question_type=='Yes/No/Not Interested')
          @php
          $yes_count=DB::table('survey_ans')->where('survey_que_id',$c->id)->where('ans','yes')->count();
          $no_count=DB::table('survey_ans')->where('survey_que_id',$c->id)->where('ans','no')->count();
          $not_intrested_count=DB::table('survey_ans')->where('survey_que_id',$c->id)->where('ans','not interested')->count();
          $total_ynn=$yes_count+$no_count+$not_intrested_count;
          @endphp
          <div class="row col-lg-12">
            <div class="col-lg-8">
              <label for="" class="btn btn-sm btn-primary">Yes - {{$yes_count}}</label>
              <label for="" class="btn btn-sm btn-danger">No - {{$no_count}}</label> 
              <label for="" class="btn btn-sm btn-warning">Not Interested - {{$not_intrested_count}}</label>   
            </div>
            <div class="col-lg-3 ">
             <div id="morrisDonut{{$c->id}}" class=" ht-120 "></div>

           </div>
         </div> 
         <script>
          var id='morrisDonut'+'{{$c->id}}';
          new Morris.Donut({
            element: id,
            data: [
            {label: "Yes", value: '{{$yes_count}}'},
            {label: "No", value: '{{$no_count}}'},
            {label: "Not Interested", value: '{{$not_intrested_count}}'}
            ],
            colors: ['#1b84e7','#dc3545','#F49917'],
            resize: true,
            formatter: function (value, data) { return value+' ('+ (value/'{{$total_ynn}}' *100).toFixed(2) + '%)'; }


          });
        </script>
        @endif

        @if($c->question_type=='Rank/Scaling')
        @php
        $total_rank=DB::table('survey_ans')->where('survey_que_id',$c->id)->sum('ans');
        $total_que=DB::table('survey_ans')->where('survey_que_id',$c->id)->count();
        @endphp

        <div class="row col-lg-12">
          <div class="col-lg-8">
            <label for="" class="btn btn-sm btn-primary"> {{$total_rank/$total_que}} /10</label>  
          </div>         
          <div class="col-lg-3">
           <div id="morrisDonut{{$c->id}}" class="ht-120 "></div>

         </div>
       </div> 
       <script>
        var id='morrisDonut'+'{{$c->id}}';
        new Morris.Donut({
          element: id,
          data: [
          {label: "Rank", value: '{{$total_rank/$total_que}}'},
          {label: "Total", value:10},
          ],
          colors: ['#1b84e7','#dc3545'],
          resize: true,
          formatter: function (value, data) { return value; }


        });   
      </script>    
      @endif

      @if($c->question_type=='True/False')
      @php
      $true_count=DB::table('survey_ans')->where('survey_que_id',$c->id)->where('ans','true')->count();
      $false_count=DB::table('survey_ans')->where('survey_que_id',$c->id)->where('ans','false')->count();
      $total_tf=$true_count+$false_count;
      @endphp
      <div class="row col-lg-12">
        <div class="col-lg-8">
         <label for="" class="btn btn-sm btn-primary">True - {{$true_count}}</label>
         <label for="" class="btn btn-sm btn-danger">False - {{$false_count}}</label> 
       </div>
       <div class="col-lg-3">
         <div id="morrisDonut{{$c->id}}" class="ht-120 "></div>

       </div>
     </div> 
     <script>
      var id='morrisDonut'+'{{$c->id}}';
      new Morris.Donut({
        element: id,
        data: [
        {label: "True", value: '{{$true_count}}'},
        {label: "False", value: '{{$false_count}}'},
        ],
        colors: ['#1b84e7','#dc3545'],
        resize: true,
        formatter: function (value, data) { return value+' ('+ (value/'{{$total_tf}}' *100).toFixed(2) + '%)'; }


      });
    </script>    
    @endif

    @if($c->question_type=='Agree/Disagree/Neutral')
    @php
    $agree_count=DB::table('survey_ans')->where('survey_que_id',$c->id)->where('ans','agree')->count();
    $disagree_count=DB::table('survey_ans')->where('survey_que_id',$c->id)->where('ans','disagree')->count();
    $neutral_count=DB::table('survey_ans')->where('survey_que_id',$c->id)->where('ans','neutral')->count();
    $total_ad=$agree_count+$disagree_count+$neutral_count;
    @endphp

    <div class="row col-lg-12">
      <div class="col-lg-8">
        <label for="" class="btn btn-sm btn-primary">Agree - {{$agree_count}}</label>
        <label for="" class="btn btn-sm btn-danger">Disagree - {{$disagree_count}}</label> 
        <label for="" class="btn btn-sm btn-warning">Neutral - {{$neutral_count}}</label>    
      </div>
      <div class="col-lg-3">
       <div id="morrisDonut{{$c->id}}" class="ht-120 "></div>

     </div>
   </div> 
   <script>
    var id='morrisDonut'+'{{$c->id}}';
    new Morris.Donut({
      element: id,
      data: [
      {label: "Agree", value: '{{$agree_count}}'},
      {label: "Disagree", value: '{{$disagree_count}}'},
      {label: "Neutral", value: '{{$neutral_count}}'},
      ],
      colors: ['#1b84e7','#dc3545','#F49917'],
      resize: true,
      formatter: function (value, data) { return value+' ('+ (value/'{{$total_ad}}' *100).toFixed(2) + '%)'; }


    });
  </script>   
  @endif

  @if($c->question_type=='Image')
  @php
  $image1=DB::table('survey_ans')->where('survey_que_id',$c->id)->where('ans','1')->count();
  $image2=DB::table('survey_ans')->where('survey_que_id',$c->id)->where('ans','2')->count();
  $image3=DB::table('survey_ans')->where('survey_que_id',$c->id)->where('ans','3')->count();
  $image4=DB::table('survey_ans')->where('survey_que_id',$c->id)->where('ans','4')->count();
  $total_image=$image1+$image2+$image3+$image4;
  @endphp

  <div class="row col-lg-12">
    <div class="col-lg-8">
      <div class="row">
        <div class="col-md-3">
         <label for="" class="btn btn-sm btn-primary">Option 1 - {{$image1}}</label>
         <img class="custom_survey_class" src="{{asset('public/images/survey_questions/'.$c->image_1)}}"  alt="Image">
       </div><!-- col -->
       <div class="col-md-3">
        <label for="" class="btn btn-sm btn-danger">Option 2 - {{$image2}}</label> 
        <img class=" custom_survey_class" src="{{asset('public/images/survey_questions/'.$c->image_2)}}" alt="Image">
      </div><!-- col -->
      <div class="col-md-3 ">
        <label for="" class="btn btn-sm btn-success">Option 3 - {{$image3}}</label>    
        <img class=" custom_survey_class" src="{{asset('public/images/survey_questions/'.$c->image_3)}}" alt="Image">
      </div><!-- col -->
      <div class="col-md-3 ">
        <label for="" class="btn btn-sm btn-warning">Option 4 - {{$image4}}</label>    
        <img class=" custom_survey_class" src="{{asset('public/images/survey_questions/'.$c->image_4)}}" alt="Image">
      </div><!-- col -->
    </div><!-- row -->
  </div>
  <div class="col-lg-3">
   <div id="morrisDonut{{$c->id}}" class="ht-120 "></div>

 </div>
</div> 
<script>
  var id='morrisDonut'+'{{$c->id}}';
  new Morris.Donut({
    element: id,
    data: [
    {label: "Option 1", value: '{{$image1}}'},
    {label: "Option 2", value: '{{$image2}}'},
    {label: "Option 3", value: '{{$image3}}'},
    {label: "Option 4", value: '{{$image4}}'},
    ],
    colors: ['#1b84e7','#dc3545','#23BF08','#F09917'],
    resize: true,
    formatter: function (value, data) { return value+' ('+ (value/'{{$total_image}}' *100).toFixed(2) + '%)'; }


  });
</script>   
@endif
@if($c->question_type=='Describe')
<div class="row col-lg-12">
  <div class="col-lg-8">
   <a href="#" id="{{$c->id}}" class="view_describe"> 
    <label for="" class="btn btn-sm btn-primary ">View Described Answer</label>
  </a>
</div>
</div>
@endif

</td>
</tr>
@endforeach
</tbody>
</table>
</div> 




</div><!-- container -->


</div><!-- container -->
</div><!-- slim-mainpanel -->

<div id="describe_modal" class="modal fade ">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content tx-size-sm">
    <div class="modal-header pd-x-20 ">
      <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Describe Question Answers!</h6>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <input type="hidden" id="lastid" value="0">
    <input type="hidden" id="que_id" >
    <div class="modal-body pd-20">
     <h5 class=" lh-3 mg-b-0 ">Que: <span class="que_class"></span></h5>          
   </div>
   <div class="modal-body pd-20 " id="append_ans">
   </div>
   <span id="read_more"></span><span class="tx-12 text-danger pd-l-20 pd-t-10 pd-b-10" id="all_Answer"></span>
   <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>


@stop
@section('js')
<script>
  $("document").ready(function() {
    $("#surveytab").addClass('active');

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

    $(".view_describe").click(function() {
      $("#describe_modal").modal('show');
      get_ans($(this).attr('id'));    
    });

    $("#read_more").on('click',function() {
     var  id= $("#que_id").val();
     get_ans(id);    
   });



    function get_ans(id)
    {
      $.ajax({
        type: "get",
        url: "{{Route('get_survey_describeans')}}",
        data: {
          que_id:id,
          skip_id:$("#lastid").val(),
        },
        dataType: 'json',
        success: function(data) {
          $("#all_Answer").text('');
          if(data.data.length<1)
          {
           $("#all_Answer").text('All answers loaded succesfully');
         }
         $(".que_class").text(data.que.question);
         $.each(data.data,function(a, b)
         {
          $("#append_ans").append('<h5 class="lh-4 mg-b-4 pd-t-4 tx-inverse">'+b.memname+' <span class="tx-12">'+b.mobno+'</span></h5>                    <p class="mg-b-5">Answer: '+b.ans+' </p>');
          $("#lastid").val(b.id);
          $("#que_id").val(b.survey_que_id);


        })
         $("#read_more").empty();
         $("#read_more").append('<a href="#" class="tx-12 tx-primary pd-20 " id="read_more" >Load More Answer</a>');

       }
     });
    }


  })
</script>
@stop