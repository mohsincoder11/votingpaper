<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usermanage;
use App\Notification;
use Hash, Session, DB;
use App\Election;
use App\Resolution;
use App\Entity;
use App\Survey;

class Admin extends Controller
{
	//
	public function dashboard()
	{
		$this->data=[
			'election'=>Election::count(),
			'ibc'=>Resolution::count(),
			'survey'=>Survey::count(),
			'entity'=>Entity::count(),
		];
		return view('dashboard',$this->data);
	}
	public function login()
	{
		return view('login');
	}
	public function checklogin(Request $request)
	{
		$userdata = Usermanage::where('username', $request->username)->first();
		if ($userdata && Hash::check($request->password, $userdata['password'])) {
			$request->session()->put('userdata', $userdata);
			echo json_encode(1);
		} else {
			echo json_encode(0);
		}
	}
	public function signout()
	{
		session()->forget('userdata');
		return redirect()->route('login');
	}
	public function usermanage()
	{
		return view('admin/usermanage');
	}
	public function checkusername(Request $request)
	{
		$data = Usermanage::where('username','=',$request->username)->orderBy('id','desc')->first();
		if ($data) {
			echo json_encode($data);
		} else {
			echo json_encode('0');
		}
	}
	public function addusermanage(Request $request)
	{
		$x = Usermanage::create([
			'username' => $request['username'],
			'email' => $request['email'],
			'password' => Hash::make($request['password']),
			'regnew' => $request['regnew'],
			'regedit' => $request['regedit'],
			'regview' => $request['regview'],
			'elecmake' => $request['elecmake'],
			'elecview' => $request['elecview'],
			'elecedit' => $request['elecedit'],
			'resmake' => $request['resmake'],
			'resedit' => $request['resedit'],
			'resview' => $request['resview'],
			'surmake' => $request['surmake'],
			'surview' => $request['surview'],
			'suredit' => $request['suredit'],
		]);

		echo json_encode(1);
	}
	public function updateusermanage(Request $request)
	{
		$x = Usermanage::where('id', $request->updateid)->update([
			'username' => $request['username'],
			'email' => $request['email'],
			'regnew' => $request['regnew'],
			'regedit' => $request['regedit'],
			'regview' => $request['regview'],
			'elecmake' => $request['elecmake'],
			'elecview' => $request['elecview'],
			'elecedit' => $request['elecedit'],
			'resmake' => $request['resmake'],
			'resedit' => $request['resedit'],
			'resview' => $request['resview'],
			'surmake' => $request['surmake'],
			'surview' => $request['surview'],
			'suredit' => $request['suredit'],
		]);

		echo json_encode(1);
	}
	public function getalluser()
	{
		$userdata = Usermanage::orderBy('id', 'desc')->get();
		echo json_encode($userdata);
	}
	public function editusermanage(Request $request)
	{
		$userdata = Usermanage::where('id', $request->id)->first();
		echo json_encode($userdata);
	}
	public function deleteusermanage(Request $request)
	{
		$userdata = Usermanage::where('id', $request->id)->delete();
		echo json_encode($userdata);
	}
	public function notification()
	{
		return view('admin.send_notification');
	}
	public function send_notification(Request $request)
	{
		if($request->inputmode=='insert')
		{


			$copyarray = array(array());
			$i = 0;
			if ($request['mobile_no'][0] == 'all') {
				$data = DB::table('electionvotinguserdatas')->select('mobno')->where('entityid',$request->entity_id)->get()->groupBy('mobno');
				foreach ($data as $userid) {
					$array = array(
						'entity_id'=>$request->entity_id,
						'mobile_no'=>$userid[$i]->mobno,
						'sender_id'=>$request->sender_id,
						'message'=>$request->message,
						'title'=>$request->title,
					);
					$copyarray[$i] = $array;
					$i++;
				}
				Notification::insert($copyarray);
			} else {
				foreach ($request['mobile_no'] as $userid) {
				//echo $userid;

					$array = array(
						'entity_id'=>$request->entity_id,
						'mobile_no'=>$userid,
						'sender_id'=>$request->sender_id,
						'message'=>$request->message,
						'title'=>$request->title,
					);
					$copyarray[$i] = $array;
					$i++;
				}
				Notification::insert($copyarray);
			}
			return 1;
		}
		else
		{

			$single=Notification::find($request->updateid);
			$x=  Notification::where('title',$single['title'])->update([
				'title' => $request['title'],
				'message' => $request['message'],
			]);	
			return 2;


		}

		
	}

	public function get_all_adminnotification()
	{
		$data=DB::table('notifications')->select('notifications.*',DB::raw('count(mobile_no) as noofuser'))->groupBy('title')->orderBy('id','desc')->get();
		return response()->json($data);
	}


	public function delete_notification(Request $request)
	{
		$single=Notification::where('id',$request->id)->first();
		Notification::where('title',$single['title'])->delete();
		return response()->json(1);
	}
	public function get_single_notification(Request $request)
	{
		$single=Notification::where('id',$request->id)->first();

		$data=DB::table('notifications')	
		->join('electionvotinguserdatas', function ($join) use ($single) {
			$join->on('electionvotinguserdatas.mobno', '=', 'notifications.mobile_no')
			->where('electionvotinguserdatas.entityid', '=', $single['entity_id']);
		})
		->select('notifications.*','electionvotinguserdatas.memname')->where('notifications.title',$single['title'])->distinct()->get();
		return response()->json($data);
	}

	public function delete_single_notification(Request $request)
	{
		Notification::where('id',$request->id)->delete();
		return response()->json(1);
	}
	public function edit_notification(Request $request)
	{

		return response()->json(Notification::where('id',$request->id)->first());
	}

	public function get_user_byentity(Request $request)
	{
		return response()->json(DB::table('electionvotinguserdatas')->select('memname', 'mobno')->where('entityid', $request->id)->get()->groupBy('mobno'));
	}

}
