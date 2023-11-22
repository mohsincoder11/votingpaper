<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;
use App\Electionvotinguserdata;
use App\Survey_questionier;
use Session;
use \Carbon\Carbon;
use File, DB;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ElectionvotinguserdataImport;

class SurveyController extends Controller
{
  public function add_survey()
  {
    return view('survey.addsurvey');
  }
  public function added_survey()
  {
    return view('survey.addedsurvey');
  }
  public function insertsurvey(Request $request)
  {
    $oldentityid = Survey::select('surveyid')->orderBy('id', 'desc')->first();
    if ($oldentityid) {
      $newentityid = substr($oldentityid['surveyid'], 5) + 1;
      $newentityid = str_pad($newentityid, 3, '0', STR_PAD_LEFT);
      $newentityid = 'SURID' . $newentityid;
    } else {
      $newentityid = 'SURID01';
    }

    $data = Survey::create([
      'surveyid' => $newentityid,
      'entity' => $request->entity,
      'surveytype' => $request->surveytype,
      'surveytitle' => $request->surveytitle,
      'startdate' => $request->startdate,
      'enddate' => $request->enddate,
      'starttime' => $request->starttime,
      'endtime' => $request->endtime,
      'meetingdate' => $request->meetingdate,
      'meetingtitle' => $request->meetingtitle,
      'status' => 1,
    ]);
    session()->put('surveyid', $data['id']);
    echo json_encode($data);
  }

  public function updatesurvey(Request $request)
  {
    $data = Survey::where('id', $request->createsurveyid)->update([
      'entity' => $request->entity,
      'surveytype' => $request->surveytype,
      'surveytitle' => $request->surveytitle,
      'startdate' => $request->startdate,
      'enddate' => $request->enddate,
      'starttime' => $request->starttime,
      'endtime' => $request->endtime,
      'meetingdate' => $request->meetingdate,
      'meetingtitle' => $request->meetingtitle,
      'status' => 1,

    ]);
    $data = Survey::orderBy('id', 'desc')->first();
    echo json_encode($data['id']);
  }
  public function insertsurveyvoteruserlist(Request $request)
  {
    $data = Excel::toArray(new ElectionvotinguserdataImport, request()->file('voterlist'));
    $total_member_sum = array_sum(array_column($data[0], 'membershare'));

    $copyarray = array(array());
    $i = 0;
    foreach ($data[0] as $d) {
      if ($d['orgname'] != '') {


        $array = array(
          'parent_id' => $request['surveyidvoterlist'],
          'entityid' => $request['entity_id'],

          'type' => 'survey',
          'orgname' => $d['orgname'],
          'memname' => $d['memname'],
          'membershare' => $d['membershare'],
          'email' => $d['email'],
          'mobno' => $d['mobno'],
          'ratio' => number_format((float)($d['membershare'] * 100) / $total_member_sum, 2, '.', ''),
        );
        $copyarray[$i] = $array;
        $i++;
      }
    }
    $insert = Electionvotinguserdata::insert($copyarray);


    $data = Survey::where('id', $request->surveyidvoterlist)->update([
      'status' => 2,
    ]);
    return response()->json(Electionvotinguserdata::where('parent_id', $request['surveyidvoterlist'])->where('type', 'survey')->orderby('id', 'desc')->get());

    // return response()->json($copyarray);

  }
  public function deletesurveyvoterlist(Request $request)
  {
    $delete = Electionvotinguserdata::where('id', $request->id)->delete();
    $data = Electionvotinguserdata::where('parent_id', $request->surveyidvoterlist)->where('type','survey')->get();
    echo json_encode($data);
  }
  public function add_survey_questionier(Request $request)
  {
    if ($request->question_type == 'Image') {
      $image_1 = $request->file('image_1');
      $image_1name = rand() . time() . '.' . $image_1->getClientOriginalExtension();
      $image_1->move(public_path('images/survey_questions'), $image_1name);

      $image_2 = $request->file('image_2');
      $image_2name = rand() . time() . '.' . $image_2->getClientOriginalExtension();
      $image_2->move(public_path('images/survey_questions'), $image_2name);

      $image_3 = $request->file('image_3');
      $image_3name = rand() . time() . '.' . $image_3->getClientOriginalExtension();
      $image_3->move(public_path('images/survey_questions'), $image_3name);

      $image_4 = $request->file('image_4');
      $image_4name = rand() . time() . '.' . $image_4->getClientOriginalExtension();
      $image_4->move(public_path('images/survey_questions'), $image_4name);

      $question_image = $request->file('question_image');
      $question_image_name = rand() . time() . '.' . $question_image->getClientOriginalExtension();
      $question_image->move(public_path('images/survey_questions'), $question_image_name);
    } else {
      $image_1name = '';
      $image_2name = '';
      $image_3name = '';
      $image_4name = '';
      $question_image_name = '';
    }
    if (!isset($request->option_1)) {
      $request->option_1 = '';
    }
    if (!isset($request->option_2)) {
      $request->option_2 = '';
    }
    if (!isset($request->option_3)) {
      $request->option_3 = '';
    }
    if (!isset($request->option_4)) {
      $request->option_4 = '';
    }
    if ($request->question_type == 'Image') {
      if ($request->correct_option == 'option_1') {
        $answer = $image_1name;
      }
      if ($request->correct_option == 'option_2') {
        $answer = $image_2name;
      }
      if ($request->correct_option == 'option_3') {
        $answer = $image_3name;
      }
      if ($request->correct_option == 'option_4') {
        $answer = $image_4name;
      }
    } else {

      if (isset($request->answer)) {
        if ($request->answer == 'option_1') {
          $answer = $request->option_1;
        }
        if ($request->answer == 'option_2') {
          $answer = $request->option_2;
        }
        if ($request->answer == 'option_3') {
          $answer = $request->option_3;
        }
        if ($request->answer == 'option_4') {
          $answer = $request->option_4;
        }
      } else if (isset($request->correct_option)) {
        $answer = $request->correct_option;
      } else {
        $answer = '';
      }
    }
    // return response()->json($request->option_1);
    $data = Survey_questionier::create([
      'surveyid' => $request->surveyidquesionier,
      'question_type' => $request->question_type,
      'question' => $request->question,
      'option_1' => $request->option_1,
      'option_2' => $request->option_2,
      'option_3' => $request->option_3,
      'option_4' => $request->option_4,
      'answer' => $answer,
      'image_1' => $image_1name,
      'image_2' => $image_2name,
      'image_3' => $image_3name,
      'image_4' => $image_4name,
      'question_image' => $question_image_name,

    ]);
    $data = Survey::where('id', $request->surveyidquesionier)->update([
      'status' => 3,
    ]);
    $data = Survey_questionier::where('surveyid', $request->surveyidquesionier)->orderBy('id', 'desc')->get();
    echo json_encode($data);
  }
  public function deletesurveyquestion(Request $request)
  {
    $delete = Survey_questionier::where('id', $request->id)->delete();
    $data = Survey_questionier::where('surveyid', $request->surveyidquesionier)->get();
    echo json_encode($data);
  }
  public function getsurveypreviewdata(Request $request)
  {
    $data['survey_data'] = Survey::where('id', $request->preview_id)->first();
    $data['questionier'] = Survey_questionier::where('surveyid', $request->preview_id)->get();
    echo json_encode($data);
  }
  public function getallsurveyrow()
  {
      $data = DB::table('surveys')->leftjoin('entities','entities.id','=','surveys.entity')->select('surveys.*','entities.entityname')->orderBy('surveys.id', 'desc')->get();

    return response()->json($data);
  }
  public function delete_survey(Request $request)
  {
    DB::table('surveys')->delete($request->id);
    DB::table('electionvotinguserdatas')->where('parent_id', $request->id)->where('type','survey')->delete();
    DB::table('survey_questioniers')->where('surveyid', $request->id)->delete();    
        DB::table('survey_ans')->where('survey_id',$request->id)->delete();

    return response()->json(1);
  }
public function live_survey(Request $request)
{
  if($request->ajax())
    {
      //follower_id as parent_follower,user_id as parent_user,
      $data = DB::select("select e.id,e.surveyid,e.startdate,e.starttime,e.enddate,e.endtime,e.surveytitle,e.meetingtitle,e.meetingdate,(select count(*) from electionvotinguserdatas  where parent_id=e.id) as total_voter,(select count(*) from electionvotinguserdatas where electionvotinguserdatas.parent_id=e.id AND electionvotinguserdatas.ans_status=1) as voted from surveys as e left join electionvotinguserdatas on e.id=electionvotinguserdatas.parent_id where e.status=3 Group By e.id order by  e.id desc");

      //$data = DB::table('elections')->orderBy('id', 'desc')->where('status',3)->get();
      return response()->json($data);
    }
  return view('survey.live_survey');
}
  	public function send_remaining_survey_voter_notification(Request $request)
{
    $send_notification=DB::table('electionvotinguserdatas')->select('mobno')
    ->where('parent_id',$request->survey_id)->where('ans_status','=',NULL)->get();
    return response()->json($send_notification);
}
public function survey_result()
{
  return view('survey.survey_result');
}

public function view_survey_result(Request $request)
{
      $this->data['survey_data']=Survey::find($request->id);
      $this->data['survey_que']=Survey_questionier::where('surveyid',$request->id)->get();

  return view('survey.view_survey_result', $this->data);
}

public function get_survey_describeans(Request $request)
{
   $this->data['que']=Survey_questionier::select('question')->where('id',$request->que_id)->first();
  $this->data['data']=DB::table('survey_ans as s')->join('electionvotinguserdatas as e','e.id','=','s.user_id')
  ->select('s.id','s.survey_que_id','s.ans','e.memname','e.mobno')->where('s.survey_que_id',$request->que_id)->where('s.id','>',$request->skip_id)->take(2)->orderby('s.id')->get();
  return response()->json($this->data);
}






}
