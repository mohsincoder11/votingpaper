<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Election;
use App\Electionvotinguserdata;
use App\Imports\ElectionvotinguserdataImport;
use Session;
use \Carbon\Carbon;
use File, DB;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Election_postion_master;
use App\Svsp_election_table;
use App\Election_groupname_master;
use App\Election_position_with_candidate;
use App\Entity;
use App\Election_ans;
class ElectionController extends Controller
{
	public function addelection()
	{

		return view('election.addelection');
	}
	public function addedelection()
	{

		return view('election.addedelection');
	}

	public function getallelectionrow()
	{

		$data = DB::table('elections')->leftjoin('entities','entities.id','=','elections.entity')->select('elections.*','entities.entityname')->orderBy('elections.id', 'desc')->get();
		return response()->json($data);
	}
	public function deleteelection(Request $request)
	{
		Election::where('id', $request->id)->delete();
		Electionvotinguserdata::where('parent_id', $request->id)->where('type','survey')->delete();
		Election_postion_master::where('election_id', $request->id)->delete();
		Election_groupname_master::where('election_id', $request->id)->delete();
		Election_position_with_candidate::where('election_id', $request->id)->delete();
		Election_ans::where('election_id', $request->id)->delete();

		$get_first = Svsp_election_table::where('election_id', $request->id)->first();

		if ($get_first) {
			if($get_first->candidate_photo!='noimage.png')
				File::delete(public_path('election/svsp_election/' . $get_first->candidate_photo));
			if($get_first->candidate_election_symbol!='noimage.png')
				File::delete(public_path('election/svsp_election/' . $get_first->candidate_election_symbol));
			if($get_first->candidate_biodata!='noimage.png')
				File::delete(public_path('election/svsp_election/' . $get_first->candidate_biodata));
		}


		Svsp_election_table::where('election_id', $request->id)->delete();
		return response()->json(1);
	}
	////////////////////////////////////
	public function insertelection(Request $request)
	{
		$oldentityid = Election::select('electionid')->orderBy('id', 'desc')->first();

		if ($oldentityid) {
			$newentityid = substr($oldentityid['electionid'], 5) + 1;
			$newentityid = str_pad($newentityid, 3, '0', STR_PAD_LEFT);
			$newentityid = 'ELEID' . $newentityid;
		} else {
			$newentityid = 'ELEID001';
		}



		$data = Election::create([
			'electionid' => $newentityid,
			'entity' => $request->entity,
			'votingtype' => $request->votingtype,
			'votingtitle' => $request->votingtitle,
			'votestartdate' => $request->votestartdate,
			'voteenddate' => $request->voteenddate,
			'votestarttime' => $request->votestarttime,
			'voteendtime' => $request->voteendtime,
			'meetingdate' => $request->meetingdate,
			'meetingtitle' => $request->meetingtitle,
			'ballottype' => 0,
			'status' => 1,
		]);
		session()->put('electionid', $data['id']);
		return response()->json($data);
	}
	public function updateelection(Request $request)
	{
		$status=1;
		if($request->election_status)
		{
			$status=$request->election_status;
		}
		$data = Election::where('id', $request->createpollid)->update([
			'entity' => $request->entity,
			'votingtype' => $request->votingtype,
			'votingtitle' => ucfirst($request->votingtitle),
			'votestartdate' => $request->votestartdate,
			'voteenddate' => $request->voteenddate,
			'votestarttime' => $request->votestarttime,
			'voteendtime' => $request->voteendtime,
			'meetingdate' => $request->meetingdate,
			'meetingtitle' => $request->meetingtitle,
			'status' => $status,

		]);
		$data = Election::orderBy('id', 'desc')->first();
		return response()->json($data['id']);
	}
	public function insertelectionvoteruserlist(Request $request)
	{
		$insert_data = collect(json_decode($request->XL_row_object, TRUE));
		$chunks = $insert_data->chunk(800);
		foreach ($chunks as $chunk)
		{
			DB::table('electionvotinguserdatas')->insert($chunk->toArray());
		}
		$status=2;
		if($request->election_status2)
		{
			$status=$request->election_status2;
		}
		$data = Election::where('id', $request->parent_id)->update([
			'status' => $status,
		]);
		$data = DB::table('electionvotinguserdatas')->where('parent_id', $request->parent_id)
		->where('type', 'election')->orderby('id', 'desc')->get();
		return response()->json($data);
	}

	public function removeelectionvoterlistdata(Request $request)
	{
		$delete = Electionvotinguserdata::where('parent_id', $request->electionid)->where('type', 'election')->delete();
		return response()->json('success');
	}
	public function deleteelectionvoterlist(Request $request)
	{
		$delete = Electionvotinguserdata::where('id', $request->id)->delete();
		$data = DB::table('electionvotinguserdatas')->where('parent_id', $request->electionid)
		->where('type', 'election')->orderby('id', 'desc')->get();
		return response()->json($data);
	}

	public function getelectionsinglevoterlist(Request $request)
	{
		$data = Electionvotinguserdata::where('id', $request->id)->where('type', 'election')->first();
		return response()->json($data);
	}
	public function updateelectionsinglevoterlist(Request $request)
	{
		if($request->votermode=="insert")
		{
			$data = Electionvotinguserdata::create([
				'type' => 'election',			
				'entityid' => $request->entityid,
				'parent_id' => $request->electionid,
				'member_id_no' => $request->member_id_no,
				'serial_no' => $request->serial_no,
				'memname' => $request->memname,
				'additional_info' => $request->additional_info,
				'email' => $request->email,
				'mobno' => $request->mobno,
			]);
		}
		else
		{			

			$data = Electionvotinguserdata::where('id', $request->id)->update([
				'member_id_no' => $request->member_id_no,
				'serial_no' => $request->serial_no,
				'memname' => $request->memname,
				'additional_info' => $request->additional_info,
				'email' => $request->email,
				'mobno' => $request->mobno,
			]);
		}
		$data = DB::table('electionvotinguserdatas')->where('type', 'election')
		->where('parent_id', $request->electionid)
		->orderby('id', 'desc')->get();

		return response()->json($data);
	}

	public function add_position_election(Request $request)
	{

		$check = Election_postion_master::where('election_id', $request->election_id)
		->where('position', $request->position)->first();
		if ($check) {
			return response()->json(0);
		}
		Election_postion_master::create([
			'election_id' => $request->election_id,
			'position' => ucfirst($request->position),
		]);

		return response()->json(1);
	}
	public function delete_position_election(Request $request)
	{
		DB::table('election_postion_masters')->where('id', $request->id)->delete();

		return response()->json(1);
	}
	public function get_position_election(Request $request)
	{

		return response()->json(DB::table('election_postion_masters')
			->select('id', 'position')->where('election_id', $request->election_id)->get());
	}

	public function insert_election_candidate(Request $request)
	{


		$check = Svsp_election_table::where('election_id', $request->add_svsp_election_id)->where('candidate_id_no', $request->cand_id_no1)->first();
		if ($check) {
			return response()->json(0);
		}
		$new_name1='noimage.png';
		$new_name2='noimage.png';
		$new_name3='noimage.png';
		if($request->cand_photo12_name)
		{
			$new_name1=$request->cand_photo12_name;

		}
		if($request->cand_electsym12_name)
		{
			$new_name2=$request->cand_electsym12_name;

		}
		if($request->cand_biodata12_name)
		{
			$new_name3=$request->cand_biodata12_name;

		}		

		if($request->svspmode=='update')
		{

			if ($request->file('cand_photo12') ) {
				$cand_photo1 = $request->file('cand_photo12');
				$new_name1 = rand() . '.' . $cand_photo1->getClientOriginalExtension();
				$file = $cand_photo1->move(public_path('election/svsp_election/'), $new_name1);
			}
			if($request->file('cand_electsym12'))
			{
				$cand_electsym1 = $request->file('cand_electsym12');
				$new_name2 = rand() . '.' . $cand_electsym1->getClientOriginalExtension();
				$file = $cand_electsym1->move(public_path('election/svsp_election/'), $new_name2);

			}
			if($request->file('cand_biodata12'))
			{			
				$cand_biodata1 = $request->file('cand_biodata12');
				$new_name3 = rand() . '.' . $cand_biodata1->getClientOriginalExtension();
				$file = $cand_biodata1->move(public_path('election/svsp_election/'), $new_name3);	
			}



			$insert = Svsp_election_table::where('id',$request->svsp_editid)->update([
				'candidate_id_no' => $request->cand_id_no12,
				'candidate_name' => ucfirst($request->cand_id_name12),
				'candidate_info' => $request->cand_info12,
				'candidate_photo' => $new_name1,
				'candidate_election_symbol' => $new_name2,
				'candidate_group_name' => $request->cand_group_name12,
				'candidate_biodata' => $new_name3,
			]);
			if ($request->ballot_type2 == 2 || $request->ballot_type2 == 4) {
				Election_position_with_candidate::where('election_id',$request->edit_election_id)->where('candidate_id',$request->svsp_editid)->delete();

				for ($i = 0; $i < count($request->cand_pos22); $i++) {
					$position_name=Election_postion_master::select('position')->where('id',$request->cand_pos22[$i])->first();

					$insert_election_position = Election_position_with_candidate::insert([
						'position_id' => $request->cand_pos22[$i],
						'position_name' => $position_name['position'],
						'election_id'=>$request->edit_election_id,
						'candidate_id'=>$request->svsp_editid,

					]);
				}
			} else {
				$position_name=Election_postion_master::select('position')->where('id',$request->cand_pos12)->first();

				$insert_election_position = Election_position_with_candidate::where('election_id',$request->edit_election_id)
				->where('candidate_id',$request->svsp_editid)->update([
					'position_id' => $request->cand_pos12,
					'position_name' => $position_name['position'],
				]);
			}


			$data = DB::select("select svsp_election_tables.*,
				GROUP_CONCAT(election_position_with_candidates.position_name SEPARATOR',  ') 
				as position,election_position_with_candidates.candidate_id,election_groupname_masters.group_name from 
				svsp_election_tables 	
				left join election_position_with_candidates 
				on election_position_with_candidates.candidate_id=svsp_election_tables.id 
				left join election_groupname_masters 
				on election_groupname_masters.id=svsp_election_tables.candidate_group_name
				where svsp_election_tables.election_id='$request->edit_election_id'
				group by svsp_election_tables.id ");
		}
		else{

			if ($request->file('cand_photo1') ) {
				$cand_photo1 = $request->file('cand_photo1');
				$new_name1 = rand() . '.' . $cand_photo1->getClientOriginalExtension();
				$file = $cand_photo1->move(public_path('election/svsp_election/'), $new_name1);
			}
			if($request->file('cand_electsym1'))
			{
				$cand_electsym1 = $request->file('cand_electsym1');
				$new_name2 = rand() . '.' . $cand_electsym1->getClientOriginalExtension();
				$file = $cand_electsym1->move(public_path('election/svsp_election/'), $new_name2);

			}
			if($request->file('cand_biodata1'))
			{			
				$cand_biodata1 = $request->file('cand_biodata1');
				$new_name3 = rand() . '.' . $cand_biodata1->getClientOriginalExtension();
				$file = $cand_biodata1->move(public_path('election/svsp_election/'), $new_name3);	
			}



			$insert = Svsp_election_table::create([
				'election_id' => $request->add_svsp_election_id,
				'candidate_id_no' => $request->cand_id_no1,
				'candidate_name' => ucfirst($request->cand_id_name1),
				'candidate_info' => $request->cand_info1,
				'candidate_photo' => $new_name1,
				'candidate_election_symbol' => $new_name2,
				'candidate_group_name' => $request->cand_group_name1,
				'candidate_biodata' => $new_name3,
				'ballottype' => $request->ballot_type,
			]);
			if ($request->ballot_type == 2 || $request->ballot_type == 4) {
				for ($i = 0; $i < count($request->cand_pos2); $i++) {
					$position_name=Election_postion_master::select('position')->where('id',$request->cand_pos2[$i])->first();
					$insert_election_position = Election_position_with_candidate::create([
						'election_id' => $request->add_svsp_election_id,
						'position_id' => $request->cand_pos2[$i],
						'position_name' => $position_name['position'],
						'candidate_id' => $insert->id,
					]);
				}
			} else {
				$position_name=Election_postion_master::select('position')->where('id',$request->cand_pos1)->first();

				$insert_election_position = Election_position_with_candidate::create([
					'election_id' => $request->add_svsp_election_id,
					'position_id' => $request->cand_pos1,
					'position_name' => $position_name['position'],

					'candidate_id' => $insert->id,
				]);
			}

			Election::where('id', $request->add_svsp_election_id)->update([
				'status' => '3',
				'ballottype' => $request->ballot_type,
			]);

			$data = DB::select("select svsp_election_tables.*,
				GROUP_CONCAT(election_position_with_candidates.position_name SEPARATOR',  ') 
				as position,election_position_with_candidates.candidate_id,election_groupname_masters.group_name from 
				svsp_election_tables 	
				left join election_position_with_candidates 
				on election_position_with_candidates.candidate_id=svsp_election_tables.id 
				left join election_groupname_masters 
				on election_groupname_masters.id=svsp_election_tables.candidate_group_name
				where svsp_election_tables.election_id='$request->add_svsp_election_id'
				group by svsp_election_tables.id ");
		}


		


		return response()->json($data);
	}
	public function deletesvsp_candidate(Request $request)
	{
		$single_data=Svsp_election_table::find($request->id);
		if($single_data->candidate_photo!='noimage.png')
			File::delete(public_path('election/svsp_election/' . $single_data->candidate_photo));
		if($single_data->candidate_election_symbol!='noimage.png')
			File::delete(public_path('election/svsp_election/' . $single_data->candidate_election_symbol));
		if($single_data->candidate_biodata!='noimage.png')
			File::delete(public_path('election/svsp_election/' . $single_data->candidate_biodata));
		$single_data->delete();

		$data = DB::select("select svsp_election_tables.*,
			GROUP_CONCAT(election_position_with_candidates.position_name SEPARATOR',  ') 
			as position,election_position_with_candidates.candidate_id,election_groupname_masters.group_name from 
			svsp_election_tables 	
			left join election_position_with_candidates 
			on election_position_with_candidates.candidate_id=svsp_election_tables.id 
			left join election_groupname_masters 
			on election_groupname_masters.id=svsp_election_tables.candidate_group_name
			where svsp_election_tables.election_id='$request->election_id'
			group by svsp_election_tables.id ");
		return response()->json($data);
	}
	public function editsvsp_candidate(Request $request)
	{
		$join_data=DB::table('svsp_election_tables')->leftjoin('election_groupname_masters','election_groupname_masters.id','=','svsp_election_tables.candidate_group_name')->select('svsp_election_tables.*','election_groupname_masters.group_name')->where('svsp_election_tables.id',$request->id)->first();
		$data=([
			'c'=>$join_data,
			'position'=>Election_position_with_candidate::select('id','position_name')
			->where('candidate_id',$request->id)->where('election_id',$request->election_id)->get(),
		]);
		return response()->json($data);
	}

	public function add_groupname_election(Request $request)
	{
		Election_groupname_master::create([
			'election_id' => $request->election_id,
			'group_name' => ucfirst($request->group_name),
		]);

		return response()->json(1);
	}
	public function delete_groupname_election(Request $request)
	{
		DB::table('election_groupname_masters')->where('id', $request->id)->delete();

		return response()->json(1);
	}
	public function get_groupname_election(Request $request)
	{
		$data = DB::table('election_groupname_masters')->select('id', 'group_name')
		->where('election_id', $request->election_id)->get();
		return response()->json($data);
	}

	public function editelection(Request $request)
	{
		$this->data['singledata'] = Election::find($request->id);
		$this->data['entitydata'] = Entity::select('entityname', 'id')
		->where('id', $this->data['singledata']->entity)->first();


		return view('election.editelection', $this->data);
	}


	public function getelectionvoterlistedit(Request $request)
	{
		$getdata = DB::table('electionvotinguserdatas')->where('type', 'election')
		->where('parent_id', $request->election_id)->get();
		return response()->json($getdata);
	}
	public function get_candidate_Data(Request $request)
	{
		$data = DB::select("select svsp_election_tables.*,
			GROUP_CONCAT(election_position_with_candidates.position_name SEPARATOR',  ') 
			as position,election_position_with_candidates.candidate_id,election_groupname_masters.group_name from 
			svsp_election_tables 	
			left join election_position_with_candidates 
			on election_position_with_candidates.candidate_id=svsp_election_tables.id 
			left join election_groupname_masters 
			on election_groupname_masters.id=svsp_election_tables.candidate_group_name
			where svsp_election_tables.election_id='$request->election_id'
			group by svsp_election_tables.id ");


		return response()->json($data);
	}
	

	public function election_result()
	{
		return view('election.election_result');
	}


	public function view_election_result(Request $request)
	{
		$this->data['election_detail']=Election::find($request->election_id);

		if($this->data['election_detail']->ballottype==1)
		{
			$this->data['candidate_list']=DB::select("select sv.candidate_id_no,sv.candidate_name,sv.candidate_election_symbol,(select count(*) from  election_ans where election_ans.candidate_id=sv.id) as totalvote from svsp_election_tables sv where sv.election_id='$request->election_id' Group By sv.id order by totalvote desc");
		}   

		if($this->data['election_detail']->ballottype==2)
		{
			$this->data['election_poisition']=DB::table('election_postion_masters')->select('id','election_id','position')
			->where('election_id',$request->election_id)->get();

		}    	

		if($this->data['election_detail']->ballottype==3)
		{
			$this->data['candidate_list']=DB::select("select svsp_election_tables.candidate_id_no,svsp_election_tables.candidate_name,svsp_election_tables.candidate_election_symbol,(select count(*) from  election_ans where election_ans.candidate_id=svsp_election_tables.id) as totalvote from svsp_election_tables where svsp_election_tables.election_id='$request->election_id' Group By svsp_election_tables.id order by svsp_election_tables.id");
		}    	


    	// return  $this->data['candidate_list'];
   // 
    	//return $this->data['candidate_list'];
		return view('election.view_election_result',$this->data);
	}

	public function live_election(Request $request)
	{
		if($request->ajax())
		{
			//follower_id as parent_follower,user_id as parent_user,
			$data = DB::select("select e.id,e.electionid,e.ballottype,e.votestartdate,e.votestarttime,e.voteenddate,e.voteendtime,e.votingtitle,e.ballottype,(select count(*) from electionvotinguserdatas  where parent_id=e.id) as total_voter,(select count(*) from electionvotinguserdatas where electionvotinguserdatas.parent_id=e.id AND electionvotinguserdatas.ans_status=1) as voted from elections as e left join electionvotinguserdatas on e.id=electionvotinguserdatas.parent_id where e.status=3 Group By e.id order by  e.id desc");

			//$data = DB::table('elections')->orderBy('id', 'desc')->where('status',3)->get();
			return response()->json($data);
		}
		return view('election.live_election');
	}
	public function view_election_list()
	{
		$election_data = DB::table('elections')
		->where('elections.status', 3)->orderby('elections.id','desc')->get();
		return response()->json($election_data);	
	}

	public function send_remaining_voter_notification(Request $request)
	{
		$send_notification=DB::table('electionvotinguserdatas')->select('mobno')
		->where('parent_id',$request->election_id)->where('ans_status','=',NULL)->get();
		return response()->json($send_notification);
	}
	
}
