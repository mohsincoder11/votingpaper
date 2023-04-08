@extends('user_part.user_layout')
@section('content')
<div id="snackbarsuccess">

    <strong>Success!</strong> Survey Submitted Successfully.

</div>

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="notification.html">Survey

                        </a></li>
                </ol>
                <h6 class="slim-pagetitle">Survey</h6>
            </div><!-- slim-pageheader -->
            <div class="section-wrapper mg-t-20">
                <form id="survey_form" >
                    
                    <input type="hidden" id="survey_id" value="{{$que[0]->survey_id}}">
                    <input type="hidden"  value="{{$user_id}}" id="user_id2">
                    <input type="hidden"  value="{{$que[0]->enddate}} {{$que[0]->endtime}} " id="enddatetime">
                        <div class="timer_position"><i class="fas fa-hourglass-half glassrotate">  </i> &nbsp;<span id="timer" class="timer"> </span></div>

                
@foreach($que as $q)
@if($q->question_type=='Yes/No/Not Interested')

                <div class="card card-quick-post mg-t-10">
                    <h6 class="slim-card-title">Que. {{$q->question}}</h6>
                    <div class="row">
                        <!-- <div class="col-sm-4 col-md-4"></div> -->
                                                <div class="col-sm-2 col-md-2">
                             <label class="rdiobox rdiobox-success mg-t-5">
                <input type="radio" name="{{$q->id}}" value="yes"><span>Yes</span>
              </label> 
             </div><!-- btn-demo -->
                                     <div class="col-sm-2 col-md-2">
                             <label class="rdiobox rdiobox-danger mg-t-5">
                <input type="radio" name="{{$q->id}}" value="no"><span>No</span>
              </label> 
             </div><!-- btn-demo -->
                                     <div class="col-sm-3 col-md-3">
                             <label class="rdiobox rdiobox-warning mg-t-5">
                <input type="radio" name="{{$q->id}}" value="not interested"><span>Not Inrested</span>
              </label> 
             </div><!-- btn-demo -->
                    </div><!-- row -->
                </div><!-- card -->
                @endif

                @if($q->question_type=='Agree/Disagree/Neutral')

                <div class="card card-quick-post mg-t-10">
                    <h6 class="slim-card-title">Que.  {{$q->question}}</h6>
                    <div class="row">
                        <!-- <div class="col-sm-4 col-md-4"></div> -->
                                                   <div class="col-sm-2 col-md-2">
                             <label class="rdiobox rdiobox-success mg-t-5">
                <input type="radio" name="{{$q->id}}" value="agree"><span>Agree</span>
              </label> 
             </div><!-- btn-demo -->
                                     <div class="col-sm-2 col-md-2">
                             <label class="rdiobox rdiobox-danger mg-t-5">
                <input type="radio" name="{{$q->id}}" value="disagree"><span>Disagree</span>
              </label> 
             </div><!-- btn-demo -->
                                     <div class="col-sm-2 col-md-2">
                             <label class="rdiobox rdiobox-warning mg-t-5">
                <input type="radio" name="{{$q->id}}" value="neutral"><span>Neutral</span>
              </label> 
             </div><!-- btn-demo -->
                    

                    </div><!-- row -->
                </div><!-- card -->
                @endif

                @if($q->question_type=='True/False')

                <div class="card card-quick-post mg-t-10">
                    <h6 class="slim-card-title">Que.  {{$q->question}}</h6>
                    <div class="row">
                        <!-- <div class="col-sm-4 col-md-5"></div> -->
                        <div class="col-sm-2 col-md-2">
                             <label class="rdiobox rdiobox-success mg-t-5">
                <input type="radio" name="{{$q->id}}" value="true"><span>True</span>
              </label> 
             </div><!-- btn-demo -->
                         <div class="col-sm-2 col-md-2">
                            
                <label class="rdiobox rdiobox-danger mg-t-5">
                <input type="radio" name="{{$q->id}}" value="false"><span>False</span>
              </label>
                            </div><!-- btn-demo -->

                    </div><!-- row -->
                </div><!-- card -->
                @endif

                @if($q->question_type=='Rank/Scaling')

                <div class="card card-quick-post mg-t-10">
                    <h6 class="slim-card-title">Que.  {{$q->question}}</h6>
                    <div class="row">
                        <div class="col-lg-6">
              <input type="text" class="rangeslider1" name="{{$q->id}}" data-extra-classes="irs-outline irs-primary" id="{{$q->id}}">
            </div><!-- col-6 -->
                    </div><!-- row -->
                </div><!-- card -->
                @endif

                @if($q->question_type=='Describe')

                <div class="card card-quick-post mg-t-10">
                    <h6 class="slim-card-title">Que.  {{$q->question}} </h6>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="col-lg">
                                <textarea rows="3" class="form-control"
                                    placeholder="Enter more information here....." name="{{$q->id}}"></textarea>
                            </div><!-- col -->
                        </div><!-- col-sm-3 -->

                    </div><!-- row -->
                </div><!-- card -->
                @endif

                @if($q->question_type=='Single Choice')

                <div class="card card-quick-post mg-t-10">
                    <h6 class="slim-card-title">Que.  {{$q->question}}</h6>
                    <div class="row">
                                               <div class="col-sm-2 col-md-2">
                             <label class="rdiobox rdiobox-success mg-t-5">
                <input type="radio" name="{{$q->id}}"  value="{{$q->option_1}}"><span>{{$q->option_1}}</span>
              </label> 
             </div><!-- btn-demo -->
                                     <div class="col-sm-2 col-md-2">
                             <label class="rdiobox rdiobox-success mg-t-5">
                <input type="radio" name="{{$q->id}}"  value="{{$q->option_2}}"><span>{{$q->option_2}}</span>
              </label> 
             </div><!-- btn-demo -->
                                     <div class="col-sm-2 col-md-2">
                             <label class="rdiobox rdiobox-success mg-t-5">
                <input type="radio" name="{{$q->id}}"  value="{{$q->option_3}}"><span>{{$q->option_3}}</span>
              </label> 
             </div><!-- btn-demo -->
                                     <div class="col-sm-2 col-md-2">
                             <label class="rdiobox rdiobox-success mg-t-5">
                <input type="radio" name="{{$q->id}}"  value="{{$q->option_4}}"><span>{{$q->option_4}}</span>
              </label> 
             </div><!-- btn-demo -->

                    </div><!-- row -->
                </div><!-- card -->
                @endif

                @if($q->question_type=='Image')

                <div class="card card-quick-post mg-t-10">
                    <h6 class="slim-card-title">Que.  {{$q->question}}</h6>

                    <div class="row">
                        <div class="wd-sm-400">
                            <img style="max-height:100px;width:auto ;" src="{{asset('public/images/survey_questions/'.$q->question_image)}}" class="img-fluid" alt="">
                        </div>
                    </div><!-- section-wrapper -->

                    <br>
                    <div class="row">
                      
                     
                                               <div class="col-sm-2 col-md-2">
                             <label class="rdiobox rdiobox-success mg-t-5">
                <input type="radio" name="{{$q->id}}"  value="1"><span> <figure class="overlay">
                                <img style="max-height:100px;width:auto ;" src="{{asset('public/images/survey_questions/'.$q->image_1)}}"  class="img-fluid  mg-t-5" alt="">
                                <figcaption class="overlay-body d-flex align-items-end justify-content-center">
                                </figcaption>
                            </figure></span>
              </label> 
             </div><!-- btn-demo -->

                                               <div class="col-sm-2 col-md-2">
                             <label class="rdiobox rdiobox-success mg-t-5">
                <input type="radio" name="{{$q->id}}"  value="2" ><span> <figure class="overlay">
                                <img style="max-height:100px;width:auto ;" src="{{asset('public/images/survey_questions/'.$q->image_2)}}"  class="img-fluid  mg-t-5" alt="">
                                <figcaption class="overlay-body d-flex align-items-end justify-content-center">
                                </figcaption>
                            </figure></span>
              </label> 
             </div><!-- btn-demo -->

                                               <div class="col-sm-2 col-md-2">
                             <label class="rdiobox rdiobox-success mg-t-5">
                <input type="radio" name="{{$q->id}}"  value="3"><span> <figure class="overlay">
                                <img style="max-height:100px;width:auto ;" src="{{asset('public/images/survey_questions/'.$q->image_3)}}"  class="img-fluid mg-t-5" alt="">
                                <figcaption class="overlay-body d-flex align-items-end justify-content-center">
                                </figcaption>
                            </figure></span>
              </label> 
             </div><!-- btn-demo -->

                                               <div class="col-sm-2 col-md-2">
                             <label class="rdiobox rdiobox-success mg-t-5">
                <input type="radio" name="{{$q->id}}"  value="4"><span> <figure class="overlay">
                                <img style="max-height:100px;width:auto ;" src="{{asset('public/images/survey_questions/'.$q->image_4)}}"  class="img-fluid  mg-t-5" alt="">
                                <figcaption class="overlay-body d-flex align-items-end justify-content-center">
                                </figcaption>
                            </figure></span>
              </label> 
             </div><!-- btn-demo -->
                    </div><!-- row -->
                </div>
                @endif
                @endforeach

                <div class="col-lg-12 ">
                            <div class="btn-demotext-align-center">
                                <button  type="button" class="btn btn-primary col-lg-3  mg-t-20" id="submit_btn">Submit</button>
                            </div><!-- btn-demo -->
                        </div><!-- card-footer -->


        </form>


            </div>
        </div>
    </div>

  @stop

  @section('js')
<script>
$(document).ready(function()
{
var enddatetime=$("#enddatetime").val();
var countdown = new Date(enddatetime).getTime();
  var distance;
  var check_api_call=0;
    var x = setInterval(function(){
        var now = new Date().getTime();
         distance = countdown - now;

          if(distance<1 )
        {
                              window.location.href = "{{Route('surveydetails')}}";                

                 
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

            $('.rangeslider1').ionRangeSlider({
                  min: 0,
            max: 10,
            from: 0
            });

  $("#surveytab").addClass('active');

  $("#submit_btn").on('click',function()
  {
      $('#submit_btn').prop("disabled", true)
    var str = $('#survey_form').serializeArray();
    var ans_array = [];
    var i=0;
    for(i=0;i<str.length;i++)
    {
        var ans = {
  survey_que_id: str[i]['name'],
  ans:str[i]['value'],
  survey_id:$("#survey_id").val(),
  user_id:$("#user_id2").val()

}
ans_array[i] = ans;
    }
  $.ajax({
      type: "POST",
   url: '{{route("insert_survey_ans")}}',
      data: {
        survey_ans_data:ans_array
                      },
      dataType: "json",
      success: function(data) {
                  

         var x = document.getElementById("snackbarsuccess");
                    x.className = "show";
                    setTimeout(function() {
                        x.className = x.className.replace("show", "");
                   window.location.href = '{{url('surveydetails')}}';
                    }, 3000);
      }
  })

  })

})
</script>
@stop