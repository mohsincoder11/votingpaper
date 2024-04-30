<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity;
use App\Resolution;
use App\Electionvotinguserdata;
use App\Imports\ElectionvotinguserdataImport;
use App\Resolutionsurvey;
use App\Resolution_ans;
use Session;
use \Carbon\Carbon;
use File, DB, Auth;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;


class ResolutionController extends Controller
{
	//
	public function gettime()
	{
		$date = Carbon::now(('Asia/Kolkata'));
		return response()->json($date->toTimeString());
		//exit();
	}

	public function addibc()
	{

		return view('ibcvoting.addibc');
	}
	public function addedibc()
	{
		return view('ibcvoting.addedibc');
	}
	public function getallibcvotingrow()
	{
		$user = Auth::user();
		$data = DB::table('resolutions')
			->leftjoin('entities', 'entities.id', '=', 'resolutions.entity')
			->select('resolutions.*', 'entities.entityname')
			->when($user->role == 2, function ($query) use ($user) {
				return $query->where('resolutions.user_id', $user->id);
			})
			->orderBy('resolutions.id', 'desc')
			->get();

		return response()->json($data);
	}
	public function deleteibcvoting(Request $request)
	{
		$data = Resolution::where('id', $request->id)->delete();
		$getdata = Resolutionsurvey::select('resolutiondetail')->where('resolutionid', $request->id)->get();
		foreach ($getdata as $g) {
			File::delete(public_path('resolution/' . $g['resolutiondetail']));
		}
		$data = Electionvotinguserdata::where('parent_id', $request->id)->where('type', 'ibcresolution')->delete();
		$data = Resolution_ans::where('ibcresolution_id', $request->id)->delete();

		$data = Resolutionsurvey::where('resolutionid', $request->id)->delete();
		return response()->json($data);
	}

	public function addcreatepoll(Request $request)
	{
		$oldentityid = Resolution::select('ibcid')->orderBy('id', 'desc')->first();
		if ($oldentityid) {
			$newentityid = substr($oldentityid['ibcid'], 5) + 1;
			$newentityid = str_pad($newentityid, 3, '0', STR_PAD_LEFT);
			$newentityid = 'IBCID' . $newentityid;
		} else {
			$newentityid = 'IBCID001';
		}

		$data = Resolution::create([
			'user_id' => Auth::user()->id,
			'ibcid' => $newentityid,
			'entity' => $request->entity,
			'votingtype' => $request->votingtype,
			'votingtitle' => $request->votingtitle,
			'votestartdate' => $request->votestartdate,
			'voteenddate' => $request->voteenddate,
			'votestarttime' => $request->votestarttime,
			'voteendtime' => $request->voteendtime,
			'meetingdate' => $request->meetingdate,
			'meetingtitle' => $request->meetingtitle,
			'status' => 1,
		]);
		session()->put('resolutionid', $data['id']);
		return response()->json($data);
	}
	public function updatecreatepoll(Request $request)
	{
		$data = Resolution::where('id', $request->createpollid)->update([
			'entity' => $request->entity,
			'votingtype' => $request->votingtype,
			'meetingtitle' => $request->meetingtitle,
			'votingtitle' => $request->votingtitle,
			'votestartdate' => $request->votestartdate,
			'voteenddate' => $request->voteenddate,
			'votestarttime' => $request->votestarttime,
			'voteendtime' => $request->voteendtime,
			'meetingdate' => $request->meetingdate,
			'status' => 1,
		]);
		$data = Resolution::orderBy('id', 'desc')->first();
		return response()->json($data['id']);
	}
	public function insertvoteruserlist(Request $request)
	{
		$insert_data = collect(json_decode($request->XL_row_object, TRUE));
		$chunks = $insert_data->chunk(800);
		foreach ($chunks as $chunk) {
			DB::table('electionvotinguserdatas')->insert($chunk->toArray());
		}
		$status = 2;
		if ($request->election_status2) {
			$status = $request->election_status2;
		}

		Resolution::where('id', $request->parent_id)->update([
			'status' => $status,
		]);
		$data = DB::table('electionvotinguserdatas')->where('type', 'ibcresolution')
			->where('parent_id', $request->parent_id)->get();
		return response()->json($data);
	}

	public function removevoterlistdata(Request $request)
	{
		$delete = Electionvotinguserdata::where('parent_id', $request->resolutionid)
			->where('type', 'ibcresolution')->delete();
		return response()->json('success');
	}
	public function deletevoterlist(Request $request)
	{
		$delete = Electionvotinguserdata::where('id', $request->id)->where('type', 'ibcresolution')->delete();
		$data = Electionvotinguserdata::where('parent_id', $request->resolutionid)
			->where('type', 'ibcresolution')->get();
		return response()->json($data);
	}

	public function getsinglevoterlist(Request $request)
	{
		$data = Electionvotinguserdata::find($request->id);
		return response()->json($data);
	}
	public function updatesinglevoterlist(Request $request)
	{
		if ($request->votermode == 'insert') {
			$data = Electionvotinguserdata::create([
				'type' => 'ibcresolution',
				'entityid' => $request->entityid,
				'parent_id' => $request->resolutionid,
				'orgname' => $request->orgname,
				'memname' => $request->memname,
				'membershare' => $request->membershare,
				'email' => $request->email,
				'mobno' => $request->mobno,
				'ratio' => $request->ratio,
			]);
		} else {
			$data = Electionvotinguserdata::where('id', $request->id)->update([
				'orgname' => $request->orgname,
				'memname' => $request->memname,
				'membershare' => $request->membershare,
				'email' => $request->email,
				'mobno' => $request->mobno,
				'ratio' => $request->ratio,
			]);
		}
		$data = DB::table('electionvotinguserdatas')->where('parent_id', $request->resolutionid)
			->where('type', 'ibcresolution')->get();

		return response()->json($data);
	}
	public function insertresolution(Request $request)
	{
		if ($files = $request->file('resolutiondetail')) {
			$idproof = $request->file('resolutiondetail');
			$new_name1 = rand() . '.' . $idproof->getClientOriginalExtension();
			$file = $idproof->move(public_path('resolution/'), $new_name1);
		} else {
			$new_name1 = '';
		}
		$insert = Resolutionsurvey::create([
			'resorder' => $request->resorder1,
			'resorder2' => $request->resorder1,
			'resolutionid' => $request->createpollid2,
			'resolutiondetail' => $new_name1,
			'resdescription' => $request->resdescription,
		]);
		$data = Resolution::where('id', $request->createpollid2)->update([
			'status' => 3,

		]);
		$data = Resolutionsurvey::where('resolutionid', $request->createpollid2)->get();
		return response()->json($data);
	}
	public function deleteresolutionlist(Request $request)
	{
		$delete = Resolutionsurvey::where('id', $request->id)->delete();
		$decreament = DB::table('resolutionsurveys')->where('resolutionid', $request->resolutionid)->where('id', '>', $request->id)->decrement('resorder', 1);
		$data = Resolutionsurvey::where('resolutionid', $request->resolutionid)->get();
		return response()->json($data);
	}
	public function insertbilling(Request $request)
	{
		$finalupdate = Resolution::where('id', $request->createpollid)->update([
			'resulttype' => $request->resulttype,
			'status' => 4,
		]);
		return response()->json('success');
	}

	//---------------------------------------------------------------------------------------------------------
	public function editibcvoting(Request $request)
	{
		$this->data['singledata'] = Resolution::find($request->id);
		$this->data['entitydata'] = Entity::select('entityname', 'id')
			->where('id', $this->data['singledata']->entity)->first();
		//return response()->json($this->data['singledata']);
		//exit();
		return view('ibcvoting.editibcvoting', $this->data);
	}
	public function getibcvoterdata(Request $request)
	{
		$data = DB::table('electionvotinguserdatas')->where('parent_id', $request->resolutionid)
			->where('type', 'ibcresolution')->get();
		return response()->json($data);
	}
	public function getibcresoultiondata(Request $request)
	{
		$data = Resolutionsurvey::where('resolutionid', $request->resolutionid)->get();
		return response()->json($data);
	}
	//-------
	public function upresolutionrow(Request $request)
	{
		$uprow = DB::table('resolutionsurveys')->where('resolutionid', $request->resolutionid)->where('resorder', $request->resorder)->first();
		$decreament = DB::table('resolutionsurveys')->where('resolutionid', $request->resolutionid)->where('resorder', $request->resorder)->decrement('resorder', 1);
		$increament = DB::table('resolutionsurveys')->where('resolutionid', $request->resolutionid)->where('id', $uprow['id'] - 1)->increment('resorder', 1);
		$getdata = Resolutionsurvey::where('resolutionid', $request->resolutionid)->get();

		return response()->json($getdata);
	}


	public function downresolutionrow(Request $request)
	{
		$decreament = DB::table('resolutionsurveys')->where('resolutionid', $request->resolutionid)->where('resorder', '>', $request->id)->increment('resorder', 1);
		$decreament = DB::table('resolutionsurveys')->where('resolutionid', $request->resolutionid)->where('resorder', '>', $request->id - 1)->decrement('resorder', 1);
		$getdata = Resolutionsurvey::where('resolutionid', $request->resolutionid)->get();
		return response()->json($getdata);
	}
	public function getvoterlistedit(Request $request)
	{
		$getdata = DB::table('electionvotinguserdatas')->where('type', 'ibcresolution')
			->where('parent_id', $request->resolutionid)->get();
		return response()->json($getdata);
	}
	public function getsingleeditresolution(Request $request)
	{
		$getdata = Resolutionsurvey::where('resolutionid', $request->resolutionid)->get();
		return response()->json($getdata);
	}

	public function convertexcel(Request $request)
	{
		return view('excel');
	}
	public function live_ibc_voting(Request $request)
	{
		$user=Auth::user();
		if ($request->ajax()) {
			//follower_id as parent_follower,user_id as parent_user,
			$data = DB::table('resolutions as e')
				->select(
					'e.id',
					'e.ibcid',
					'e.votestartdate',
					'e.votestarttime',
					'e.voteenddate',
					'e.voteendtime',
					'e.votingtitle',
					'e.meetingtitle',
					'e.meetingdate',
					DB::raw('(select count(*) from electionvotinguserdatas where parent_id = e.id) as total_voter'),
					DB::raw('(select count(*) from electionvotinguserdatas where electionvotinguserdatas.parent_id = e.id AND electionvotinguserdatas.ans_status = 1) as voted')
				)
				->leftJoin('electionvotinguserdatas', 'e.id', '=', 'electionvotinguserdatas.parent_id')
				->where('e.status', 4)
				->when($user->role == 2, function ($query) use ($user) {
					return $query->where('e.user_id', $user->id);
				})
				->groupBy('e.id')
				->orderBy('e.id', 'desc')
				->get();

			//$data = DB::table('elections')->orderBy('id', 'desc')->where('status',3)->get();
			return response()->json($data);
		}
		return view('ibcvoting.live_ibc_voting');
	}
	public function send_remaining_ibc_voter_notification(Request $request)
	{
		$send_notification = DB::table('electionvotinguserdatas')->select('mobno')
			->where('parent_id', $request->ibc_id)->where('ans_status', '=', NULL)->get();
		return response()->json($send_notification);
	}

	public function ibc_result()
	{
		return view('ibcvoting.ibc_result');
	}

	public function view_ibc_result(Request $request)
	{
		$this->data['ibc_data'] = Resolution::find($request->id);
		$this->data['ibc_que'] = DB::table('resolutionsurveys')->where('resolutionid', $request->id)->get();

		return view('ibcvoting.view_ibc_result', $this->data);
	}

	public function get_ibc_que_ans(Request $request)
	{
		//$data=DB::table('')->where('resolutionid',$request->ibc_id)->get();
		$data = DB::select("select r.id,r.resolutionid,r.resdescription,r.resolutiondetail,(select count(*) from resolution_ans  where resolution_que_id=r.id) as total_ans from resolutionsurveys as r left join resolution_ans on r.id=resolution_ans.resolution_que_id where r.resolutionid='$request->ibc_id' Group By r.id order by  r.id");
		return response()->json($data);
	}
}
