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
use Auth;

class VendorController extends Controller
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
	
    //
}
