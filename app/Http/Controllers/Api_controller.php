<?php

namespace App\Http\Controllers;

use App\Electionvotinguserdata;
use Illuminate\Http\Request;
use Svg\Tag\Rect;
use DB, Session, Hash, Http;
use App\Survey;
use App\Resolution;
use App\Election;
use App\Election_ans;
use App\Election_groupname_master;
use App\Resolutionsurvey;
use App\Resolution_ans;
use App\User_feedback;
use App\Survey_ans;
use App\Election_postion_master;
use App\Notification;
use Auth;

class Api_controller extends Controller
{
    //user voting part
    public function sortable()
    {
        return view('sortableui');
    }
    public function user_login()
    {
        return view('user_part.user_login');
    }
    public function user_signout()
    {
        Auth::logout();
        return redirect()->route('user_login');
    }
    public function user_dashboard()
    {
        return view('user_part.user_dashboard');
    }

    public function addelectionvoting(Request $request)
    {
        $this->data['user_id'] = $request->user_id;

        $this->data['election_data'] = Election::select('voteenddate', 'voteendtime', 'ballottype')->where('id', $request->id)->first();

        $this->data['election_position'] = DB::table('election_postion_masters')
            ->select('id', 'election_id', 'position')
            ->where('election_id', $request->id)->get();

        $this->data['position_id_array'] = DB::table('election_postion_masters')
            ->select('id')
            ->where('election_id', $request->id)->get();

        $this->data['election_candidate']  = DB::table('svsp_election_tables')
            ->join('election_position_with_candidates', function ($join) use ($request) {
                $join->on('election_position_with_candidates.candidate_id', '=', 'svsp_election_tables.id')
                    ->where('election_position_with_candidates.election_id', '=', $request->id);
            })
            ->join('election_postion_masters', 'election_postion_masters.id', '=', 'election_position_with_candidates.position_id')
            ->leftjoin('election_groupname_masters', 'election_groupname_masters.id', '=', 'svsp_election_tables.candidate_group_name')
            ->where('svsp_election_tables.election_id', $request->id)
            ->select('election_groupname_masters.group_name', 'svsp_election_tables.*', 'election_postion_masters.position', 'election_postion_masters.id as position_id')
            ->orderby('svsp_election_tables.id', 'desc')->get();
        return view('user_part.election.addelectionvoting', $this->data);
    }

    public function electiondetails()
    {
        return view('user_part.election.electiondetails');
    }

    public function addibcvoting(Request $request)
    {

        $this->data['ibc'] = DB::table('resolutionsurveys')
            ->join('resolutions', 'resolutions.id', '=', 'resolutionsurveys.resolutionid')
            ->where('resolutionsurveys.resolutionid', $request->id)
            ->select(
                'resolutions.id as res_id',
                'resolutions.resulttype',
                'resolutions.voteenddate',
                'resolutions.voteendtime',
                'resolutionsurveys.id',
                'resolutionsurveys.resolutionid',
                'resolutionsurveys.resdescription',
                'resolutionsurveys.resolutiondetail'
            )->get();
        $this->data['user_id'] = $request->user_id;


        return view('user_part.ibcvoting.addibcvoting', $this->data);
    }

    public function ibcdetails()
    {
        return view('user_part.ibcvoting.ibcdetails');
    }
    public function que_for_survey(Request $request)
    {

        $this->data['que'] = DB::table('survey_questioniers')
            ->join('surveys', 'surveys.id', '=', 'survey_questioniers.surveyid')
            ->where('survey_questioniers.surveyid', $request->id)
            ->select('survey_questioniers.*', 'surveys.id as survey_id', 'surveys.enddate', 'surveys.endtime')->get();
        $this->data['user_id'] = $request->user_id;

        return view('user_part.survey.que_for_survey', $this->data);
    }
    public function surveydetails()
    {
        return view('user_part.survey.surveydetails');
    }
    public function insert_()
    {
        return view('user_part.feedback');
    }

    public function receipt()
    {
        return view('user_part.receipt');
    }
    public function user_notification()
    {
        return view('user_part.user_notification');
    }

    public function user_profile()
    {
        return view('user_part.user_profile');
    }
    public function checkuser_login(Request $request)
    {
        $user_exist = Electionvotinguserdata::where('mobno', $request->mobno)
            ->where('entityid', $request->entityid)->first();
        if ($user_exist) {
            return response()->json($user_exist);
        } else {
            return response()->json(0);
        }
    }

    public function checkuser_login2(Request $request)
    {
        $user_exist = Electionvotinguserdata::where('mobno', $request->mobno)
            ->where('entityid', $request->entityid)->first();
        if ($user_exist) {
            Auth::login($user_exist);
            return response()->json($user_exist);
        } else {
            return response()->json(0);
        }
    }



    //API's


    public function senduser_otp(Request $request)
    {
        $user_exist = Electionvotinguserdata::where('mobno', $request->mobno)->first();
        if ($user_exist) {
            $otp = rand(1000, 9999);
            // $name = 'Sir/Mam';
            // $msg = 'Dear ' . $name . ', Your OTP is ' . $otp . '. Send by WEBMEDIA';
            // $msg = urlencode($msg);
            // $data = "uname=habitm1&pwd=habitm1&senderid=WMEDIA&to=" . $request->mobno . "&msg=" . $msg . "&route=T&peid=1701159196421355379&tempid=1707161527969328476";
            // $ch = curl_init('http://bulksms.webmediaindia.com/sendsms?');
            // curl_setopt($ch, CURLOPT_POST, true);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // $result = curl_exec($ch);
            // curl_close($ch);
            return response()->json($otp);
        } else {
            return response()->json(0);
        }
    }
    public function getall_entity()
    {
        return response()->json(DB::table('entities')->select('id', 'entityname', 'entitytype')->get());
    }


    //Election 
    public function view_election(Request $request)
    {
        $user_exist = Electionvotinguserdata::where('mobno', $request->mobno)
            ->where('entityid', $request->entityid)->where('type', 'election')
            ->select('parent_id')->get();
        //   return response()->json($user_exist);
        if (count($user_exist) > 0) {
            $election_id = array();
            foreach ($user_exist as $u) {
                $election_id[] = $u['parent_id'];
            }
            // return $election_id;

            $election_data = DB::table('elections')
                ->join('electionvotinguserdatas', function ($join) use ($request) {
                    $join->on('electionvotinguserdatas.parent_id', '=', 'elections.id')
                        ->where('electionvotinguserdatas.mobno', '=', $request->mobno)
                        ->where('electionvotinguserdatas.type', '=', 'election');
                })
                ->where('elections.status', 3)->whereIn('elections.id', $election_id)
                ->select('elections.*', 'electionvotinguserdatas.ans_status', 'electionvotinguserdatas.id as user_id')
                ->orderby('elections.id', 'desc')->get();
            return response()->json($election_data);
        } else {
            return response()->json(0);
        }
    }
    public function view_election_positions(Request $request)
    {
        $data = DB::table('election_postion_masters')
            ->select('id', 'election_id', 'position')
            ->where('election_id', $request->election_id)->get();
        return response()->json($data);
    }
    public function get_election_candidate(Request $request)
    {
        $data = DB::table('svsp_election_tables')
            ->join('election_position_with_candidates', function ($join) use ($request) {
                $join->on('election_position_with_candidates.candidate_id', '=', 'svsp_election_tables.id')
                    ->where('election_position_with_candidates.election_id', '=', $request->election_id);
            })
            ->join('election_postion_masters', 'election_postion_masters.id', '=', 'election_position_with_candidates.position_id')
            ->leftjoin('election_groupname_masters', 'election_groupname_masters.id', '=', 'svsp_election_tables.candidate_group_name')
            ->where('svsp_election_tables.election_id', $request->election_id)
            ->select('election_groupname_masters.group_name', 'svsp_election_tables.*', 'election_postion_masters.position', 'election_postion_masters.id as position_id')
            ->orderby('svsp_election_tables.id', 'desc')->get();
        if (count($data) > 0) {
            return response()->json($data);
        } else {
            return response()->json(0);
        }
    }

    public function get_election_positions(Request $request)
    {
        return response()->json(Election_postion_master::where('election_id', $request->election_id)->get());
    }
    public function insert_election_ans(Request $request)
    {

        if ($request->ballottype == 3 || $request->ballottype == 4) {
            for ($i = 0; $i < count($request->election_ans); $i++) {
                for ($k = 0; $k < count($request->election_ans[$i]); $k++) {
                    Election_ans::create([
                        'election_id' => $request->election_ans[$i][$k]['election_id'],
                        'candidate_id' => $request->election_ans[$i][$k]['id'],
                        'user_id' => $request->election_ans[$i][$k]['user_id'],
                        'position_id' => $request->election_ans[$i][$k]['position_id'],
                        'status' => 1,
                        'rank' => $request->election_ans[$i][$k]['rank'],

                    ]);
                }
            }
            Electionvotinguserdata::where('id', $request->election_ans[0][0]['user_id'])
                ->where('parent_id', $request->election_ans[0][0]['election_id'])
                ->where('type', 'election')->update([
                    'ans_status' => 1,
                ]);
        } else {
            for ($i = 0; $i < count($request->election_ans); $i++) {
                Election_ans::create([
                    'election_id' => $request->election_ans[$i]['election_id'],
                    'candidate_id' => $request->election_ans[$i]['id'],
                    'user_id' => $request->election_ans[$i]['user_id'],
                    'position_id' => $request->election_ans[$i]['position_id'],
                    'status' => 1,
                    'rank' => $request->election_ans[$i]['rank'],

                ]);
            }
            Electionvotinguserdata::where('id', $request->election_ans[0]['user_id'])
                ->where('parent_id', $request->election_ans[0]['election_id'])
                ->where('type', 'election')->update([
                    'ans_status' => 1,
                ]);
        }



        return response()->json(1);
    }







    //Survey
    public function view_survey(Request $request)
    {

        $user_exist = Electionvotinguserdata::where('mobno', $request->mobno)
            ->where('entityid', $request->entityid)->where('type', 'survey')
            ->select('parent_id')->get();

        if (count($user_exist) > 0) {
            $election_id = array();
            foreach ($user_exist as $u) {
                $election_id[] = $u['parent_id'];
            }
            $survey_data = DB::table('surveys')
                ->join('electionvotinguserdatas', function ($join) use ($request) {
                    $join->on('electionvotinguserdatas.parent_id', '=', 'surveys.id')
                        ->where('electionvotinguserdatas.mobno', '=', $request->mobno)
                        ->where('electionvotinguserdatas.type', '=', 'survey');;
                })
                ->where('surveys.status', 3)->whereIn('surveys.id', $election_id)
                ->where('surveys.entity', '=', $request->entityid)
                ->select('surveys.*', 'electionvotinguserdatas.ans_status', 'electionvotinguserdatas.id as user_id')
                ->orderby('surveys.id', 'desc')->get();
            return response()->json($survey_data);
        } else {
            return response()->json(0);
        }
    }


    public function get_survey_que(Request $request)
    {
        $data = DB::table('survey_questioniers')
            ->join('surveys', 'surveys.id', '=', 'survey_questioniers.surveyid')
            ->where('survey_questioniers.surveyid', $request->surveyid)
            ->select('survey_questioniers.*')->orderby('survey_questioniers.id', 'desc')->get();
        if (count($data) > 0) {
            return response()->json($data);
        } else {
            return response()->json(0);
        }
    }

    public function insert_survey_ans(Request $request)
    {
        if (count($request->survey_ans_data) > 0) {
            $user_id = 0;
            $survey_id = 0;
            $i = 0;

            $copyarray = array(array());

            foreach ($request->survey_ans_data as $r) {
                $array = array(
                    'survey_id' => $r['survey_id'],
                    'survey_que_id' => $r['survey_que_id'],
                    'user_id' => $r['user_id'],
                    'status' => 1,
                    'ans' => $r['ans'],
                );
                $copyarray[$i] = $array;

                $user_id = $r['user_id'];
                $survey_id = $r['survey_id'];
                $i++;
            }
            Survey_ans::insert($copyarray);

            Electionvotinguserdata::where('id', $user_id)->where('parent_id', $survey_id)
                ->where('type', 'survey')->update([
                    'ans_status' => 1,
                ]);
            return response()->json(1);
        } else {
            return response()->json(0);
        }
    }


    //IBC Resolution
    public function view_ibcresolution(Request $request)
    {
        $user_exist = Electionvotinguserdata::where('mobno', $request->mobno)
            ->where('entityid', $request->entityid)->where('type', 'ibcresolution')
            ->select('parent_id')->get();
        if (count($user_exist) > 0) {
            $election_id = array();
            foreach ($user_exist as $u) {
                $election_id[] = $u['parent_id'];
            }
            $resolution_data = DB::table('resolutions')
                ->join('electionvotinguserdatas', function ($join) use ($request) {
                    $join->on('electionvotinguserdatas.parent_id', '=', 'resolutions.id')
                        ->where('electionvotinguserdatas.mobno', '=', $request->mobno)
                        ->where('electionvotinguserdatas.type', '=', 'ibcresolution');;
                })
                ->where('resolutions.status', 4)->whereIn('resolutions.id', $election_id)
                ->select('resolutions.*', 'electionvotinguserdatas.ans_status', 'electionvotinguserdatas.id as user_id')
                ->orderby('resolutions.id', 'desc')->get();
            return response()->json($resolution_data);
        } else {
            return response()->json(0);
        }
    }

    public function get_resolution_que(Request $request)
    {
        $data = DB::table('resolutionsurveys')
            ->join('resolutions', 'resolutions.id', '=', 'resolutionsurveys.resolutionid')
            ->where('resolutionsurveys.resolutionid', $request->resolutionid)
            ->select(
                'resolutions.resulttype',
                'resolutionsurveys.id',
                'resolutionsurveys.resolutionid',
                'resolutionsurveys.resdescription',
                'resolutionsurveys.resolutiondetail'
            )->get();
        if (count($data) > 0) {
            return response()->json($data);
        } else {
            return response()->json(0);
        }
    }

    public function insert_resolution_ans(Request $request)
    {
        if (count($request->resolution_ans_data) > 0) {
            $copyarray = array(array());
            $i = 0;
            $resolution_id = 0;
            $user_id = 0;
            foreach ($request->resolution_ans_data as $r) {
                $array = array(

                    'ibcresolution_id' => $r['ibcresolution_id'],
                    'resolution_que_id' => $r['resolution_que_id'],
                    'user_id' => $r['user_id'],
                    'status' => 1,
                    'ans' => $r['ans'],
                );
                $resolution_id = $r['ibcresolution_id'];
                $user_id = $r['user_id'];
                $copyarray[$i] = $array;
                $i++;
            }
            $insert = Resolution_ans::insert($copyarray);
            Electionvotinguserdata::where('id', $user_id)->where('parent_id', $resolution_id)
                ->where('type', 'ibcresolution')->update([
                    'ans_status' => 1,
                ]);
            return response()->json(1);
        } else {
            return response()->json(0);
        }
    }


    //feedback
    public function user_feedback(Request $request)
    {
        return view('user_part.feedback');
    }
    public function insert_user_feedback(Request $request)
    {
        User_feedback::create([
            'user_id' => $request->user_id,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return response()->json(1);
    }


    //Notification


    public function get_alluser_notification(Request $request)
    {
        if ($request->count > 0) {
            $data = DB::table('notifications as n')
                ->select(
                    'n.title',
                    'n.message',
                    DB::raw('TIME(n.created_at) AS created_time'),
                    DB::raw('DATE(n.created_at) AS created_date'),
                )
                ->where('n.entity_id', $request->entity_id)
                ->where('n.mobile_no', $request->mobile_no)->orderby('n.id', 'desc')->get();
        } else {
            $data = DB::table('notifications as n')
                ->select(
                    'n.title',
                    'n.message',
                    DB::raw('TIME(n.created_at) AS created_time'),
                    DB::raw('DATE(n.created_at) AS created_date'),
                )
                ->where('n.entity_id', $request->entity_id)
                ->where('n.mobile_no', $request->mobile_no)->orderby('n.id', 'desc')
                ->take(3)->get();
        }


        return response()->json($data);
    }


    public function get_sie_count(Request $request)
    {
        $this->data['election_data'] = 0;
        $this->data['survey_data'] = 0;
        $this->data['resolution_data'] = 0;
        $user_exist = Electionvotinguserdata::where('mobno', $request->mobno)
            ->where('entityid', $request->entityid)->where('type', 'election')
            ->select('parent_id')->get();
        //   return response()->json($user_exist);
        if (count($user_exist) > 0) {
            $election_id = array();
            foreach ($user_exist as $u) {
                $election_id[] = $u['parent_id'];
            }
            // return $election_id;

            $this->data['election_data'] = DB::table('elections')
                ->join('electionvotinguserdatas', function ($join) use ($request) {
                    $join->on('electionvotinguserdatas.parent_id', '=', 'elections.id')
                        ->where('electionvotinguserdatas.mobno', '=', $request->mobno)
                        ->where('electionvotinguserdatas.type', '=', 'election');
                })
                ->where('elections.status', 3)->whereIn('elections.id', $election_id)
                ->select('elections.*', 'electionvotinguserdatas.ans_status', 'electionvotinguserdatas.id as user_id')
                ->orderby('elections.id', 'desc')->count();
        }

        $user_exist = Electionvotinguserdata::where('mobno', $request->mobno)
            ->where('entityid', $request->entityid)->where('type', 'survey')
            ->select('parent_id')->get();

        if (count($user_exist) > 0) {
            $election_id = array();
            foreach ($user_exist as $u) {
                $election_id[] = $u['parent_id'];
            }
            $this->data['survey_data'] = DB::table('surveys')
                ->join('electionvotinguserdatas', function ($join) use ($request) {
                    $join->on('electionvotinguserdatas.parent_id', '=', 'surveys.id')
                        ->where('electionvotinguserdatas.mobno', '=', $request->mobno)
                        ->where('electionvotinguserdatas.type', '=', 'survey');;
                })
                ->where('surveys.status', 3)->whereIn('surveys.id', $election_id)
                ->where('surveys.entity', '=', $request->entityid)
                ->select('surveys.*', 'electionvotinguserdatas.ans_status', 'electionvotinguserdatas.id as user_id')
                ->orderby('surveys.id', 'desc')->count();
        }

        $user_exist = Electionvotinguserdata::where('mobno', $request->mobno)
            ->where('entityid', $request->entityid)->where('type', 'ibcresolution')
            ->select('parent_id')->get();

        if (count($user_exist) > 0) {
            $election_id = array();
            foreach ($user_exist as $u) {
                $election_id[] = $u['parent_id'];
            }
            $this->data['resolution_data'] = DB::table('resolutions')
                ->join('electionvotinguserdatas', function ($join) use ($request) {
                    $join->on('electionvotinguserdatas.parent_id', '=', 'resolutions.id')
                        ->where('electionvotinguserdatas.mobno', '=', $request->mobno)
                        ->where('electionvotinguserdatas.type', '=', 'ibcresolution');;
                })
                ->where('resolutions.status', 4)->whereIn('resolutions.id', $election_id)
                ->select('resolutions.*', 'electionvotinguserdatas.ans_status', 'electionvotinguserdatas.id as user_id')
                ->orderby('resolutions.id', 'desc')->count();
        }
        return response()->json($this->data);
    }
}
