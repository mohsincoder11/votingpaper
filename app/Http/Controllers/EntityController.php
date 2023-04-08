<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity;
use Session;
use File,PDF,DB;
use Mail;

class EntityController extends Controller
{
    //

    public function addentity(Request $request)
    {     // return env('MAIL_FROM_ADDRESS');
        if($request->ajax())
        {
            $data=([
                'states'=>DB::table('states')->get(),
                'cities'=>DB::table('cities')->where('state_id',1)->get(),
           ]);
                    return response()->json($data);

        }
        return view('entity/add_entity');
    }
    public function addedentity()
    {
     return view('entity.added_entity');

 }
 public function ibcentityinfo(Request $request)
 {
    $oldentityid=Entity::select('entityid')->orderBy('id','desc')->first();
    $newentityid='UEI001';
    if($oldentityid)
    {
        $newentityid=substr($oldentityid['entityid'],3)+1;
    $newentityid=str_pad($newentityid, 3, '0', STR_PAD_LEFT);
    $newentityid='UEI'.$newentityid;
    }
    
    $data=Entity::create([
        'entityid'=>$newentityid,
        'entityname'=>ucfirst($request['entityname']),
        'regno'=>$request['regno'],
        'entitytype'=>$request['entitytype'],
        'dateofreg'=>$request['dateofreg'],
        'panno'=>$request['panno'],
        'gst_no'=>$request['gst_no'],
        'status'=>1,
    ]);
    return response()->json($data);
} 
public function ibcentityinfoupdate(Request $request)
{


    $data=Entity::where('id',$request->entityinfoupdateid)->update([
        'entityname'=>$request['entityname'],
        'regno'=>$request['regno'],
        'entitytype'=>$request['entitytype'],
        'dateofreg'=>$request['dateofreg'],
        'panno'=>$request['panno'],
        'gst_no'=>$request['gst_no'],
    ]);
    $data=Entity::orderBy('id','desc')->first();

    return response()->json($data['id']);
}
    //----------------------------------------
public function ibcentityaddress(Request $request)
{
    $data=Entity::where('id',$request->entityinfoid)->update([
        'streeta1'=>$request['streeta1'],
        'streeta2'=>$request['streeta2'],
        'landmark1'=>$request['landmark1'],
        'city1'=>ucfirst($request['city1']),
        'pincode1'=>$request['pincode1'],
        'state1'=>ucfirst($request['state1']),
        'country1'=>ucfirst($request['country1']),
        'streetb1'=>$request['streetb1'],
        'streetb2'=>$request['streetb2'],
        'landmark2'=>$request['landmark2'],
        'city2'=>ucfirst($request['city2']),
        'pincode2'=>$request['pincode2'],
        'state2'=>ucfirst($request['state2']),
        'country2'=>ucfirst($request['country2']),
        'status'=>2,
    ]);
    $data=Entity::orderBy('id','desc')->first();
    return response()->json($data['id']);
}
public function ibcentityauthperson(Request $request)
{
    $data=Entity::where('id',$request->entityaddressid)->update([
        'pername'=>ucwords($request['pername']),
        'designation'=>$request['designation'],
        'email'=>$request['email'],
        'altemail'=>$request['altemail'],
        'mobno'=>$request['mobno'],
        'altmobno'=>$request['altmobno'],
        'status'=>3,
    ]);
    $data=Entity::orderBy('id','desc')->first();
    return response()->json($data['id']);   
}

public function ibcentitykyc(Request $request)
{

    $idproof = $request->file('idproof');
    $new_name1 = rand() . '.' . $idproof->getClientOriginalExtension();
    $idproof->move(public_path('entity/idproof'), $new_name1);

    $businessproof = $request->file('businessproof');
    $new_name2 = rand() . '.' . $businessproof->getClientOriginalExtension();
    $businessproof->move(public_path('entity/businessproof'), $new_name2);

    $addressproof = $request->file('addressproof');
    $new_name3 = rand() . '.' . $addressproof->getClientOriginalExtension();
    $addressproof->move(public_path('entity/addressproof'), $new_name3);

    $data=Entity::where('id',$request->entityauthpersonid)->update([
        'idproof'=>$new_name1,
        'businessproof'=>$new_name2,
        'addressproof'=>$new_name3,
        'status'=>4,

    ]);

    return response()->json(1);
}
public function ibcentitykycupdate(Request $request)
{
//111

    if($request->hasFile('idproof') && $request->hasFile('addressproof') && $request->hasFile('businessproof'))
    {
        $idproof = $request->file('idproof');
        $new_name1 = rand() . '.' . $idproof->getClientOriginalExtension();

        $businessproof = $request->file('businessproof');
        $new_name2 = rand() . '.' . $businessproof->getClientOriginalExtension();

        $addressproof = $request->file('addressproof');
        $new_name3 = rand() . '.' . $addressproof->getClientOriginalExtension();

        $idproof->move(public_path('images/entity/idproof'), $new_name1);
        $businessproof->move(public_path('images/entity/businessproof'), $new_name2);
        $addressproof->move(public_path('images/entity/addressproof'), $new_name3);
        $data=Entity::where('id',$request->kycupdateid)->update([
            'idproof'=>$new_name1,
            'businessproof'=>$new_name2,
            'addressproof'=>$new_name3,
            'status'=>4,

        ]);
    }
//110
    if($request->hasFile('idproof') && $request->hasFile('businessproof') && $request->addressproof=='')
    {
        $idproof = $request->file('idproof');
        $new_name1 = rand() . '.' . $idproof->getClientOriginalExtension();

        $businessproof = $request->file('businessproof');
        $new_name2 = rand() . '.' . $businessproof->getClientOriginalExtension();

        $idproof->move(public_path('images/entity/idproof'), $new_name1);
        $businessproof->move(public_path('images/entity/businessproof'), $new_name2);
        $data=Entity::where('id',$request->kycupdateid)->update([
            'idproof'=>$new_name1,
            'businessproof'=>$new_name2,
            'status'=>4,


        ]);
    }
        //101
    if($request->hasFile('idproof') && $request->hasFile('addressproof') && $request->businessproof=='')
    {
        $idproof = $request->file('idproof');
        $new_name1 = rand() . '.' . $idproof->getClientOriginalExtension();

        $addressproof = $request->file('addressproof');
        $new_name3 = rand() . '.' . $addressproof->getClientOriginalExtension();

        $idproof->move(public_path('images/entity/idproof'), $new_name1);
        $addressproof->move(public_path('images/entity/addressproof'), $new_name3);
        $data=Entity::where('id',$request->kycupdateid)->update([
            'idproof'=>$new_name1,
            'addressproof'=>$new_name3,
            'status'=>4,


        ]);
    }
        //100
    if($request->hasFile('idproof') && $request->addressproof=='' && $request->businessproof=='')
    {
        echo 'inside 4th';
        $idproof = $request->file('idproof');
        $new_name1 = rand() . '.' . $idproof->getClientOriginalExtension();
        $idproof->move(public_path('images/entity/idproof'), $new_name1);
        $data=Entity::where('id',$request->kycupdateid)->update([
            'idproof'=>$new_name1,
            'status'=>4,


        ]);
        
    }
       //011
    if($request->hasFile('addressproof') && $request->hasFile('businessproof') && $request->idproof=='')
    {
       $businessproof = $request->file('businessproof');
       $new_name2 = rand() . '.' . $businessproof->getClientOriginalExtension();
       $businessproof->move(public_path('images/entity/businessproof'), $new_name2);
       $addressproof = $request->file('addressproof');
       $new_name3 = rand() . '.' . $addressproof->getClientOriginalExtension();
       $addressproof->move(public_path('images/entity/addressproof'), $new_name3);
       $data=Entity::where('id',$request->kycupdateid)->update([
        'addressproof'=>$new_name3,
        'businessproof'=>$new_name2,
        'status'=>4,

    ]);
   }
     //010
   if($request->hasFile('businessproof') && $request->addressproof=='' && $request->idproof=='')
   {
       $businessproof = $request->file('businessproof');
       $new_name2 = rand() . '.' . $businessproof->getClientOriginalExtension();
       $businessproof->move(public_path('images/entity/businessproof'), $new_name2);
       $data=Entity::where('id',$request->kycupdateid)->update([
        'businessproof'=>$new_name2,
        'status'=>4,

    ]);
   }
     //001
   if($request->hasFile('addressproof') && $request->idproof=='' && $request->businessproof=='')
   {
       $addressproof = $request->file('addressproof');
       $new_name3 = rand() . '.' . $addressproof->getClientOriginalExtension();
       $addressproof->move(public_path('images/entity/addressproof'), $new_name3);
       $data=Entity::where('id',$request->kycupdateid)->update([
        'addressproof'=>$new_name3,
        'status'=>4,

    ]);
   }
   else
   {
    if($request->addressproofedit!=null)
    {
        $data=Entity::where('id',$request->kycupdateid)->update([
            'addressproof'=>$request->addressproofedit,
            'businessproof'=>$request->businessproofedit,
            'idproof'=>$request->idproofedit,
            'status'=>4,
        ]);
    }


}
$successcode=2;
return redirect()->route('addedentity')->with('successcode',$successcode);
}
public function getallentity()
{
    $data=DB::table('entities')->orderBy('id','desc')->get();
    return response()->json($data);
}
public function getentitylist()
{
    $data=Entity::select('entityname','id')->orderBy('id','desc')->where('status','>',3)->get();
    return response()->json($data);
}
public function deleteentity(Request $request)
{
    $getdata=Entity::where('id',$request->id)->first();        
    File::delete(public_path('entity/addressproof/'.$getdata['addressproof']));
    File::delete(public_path('entity/idproof/'.$getdata['idproof']));
    File::delete(public_path('entity/businessproof/'.$getdata['businessproof']));        
    $data=Entity::where('id', $request->id)->delete();
    return response()->json('success');
}
public function editentity(Request $request)
{
    $this->data['singledata']=DB::table('entities')->leftjoin('states as s1','entities.state1','=','s1.id')->leftjoin('states as s2','entities.state2','=','s2.id')->where('entities.id',$request->id)->select('entities.*','s1.name as statename1','s2.name as statename2')->first();
    //return response()->json($this->data['singledata']);
    return view('entity/editentity',$this->data);
}
public function getsingleentity(Request $request)
{
    $this->data['singledata']=Entity::where('id',$request->id)->first();
    return response()->json($this->data['singledata']);

}
public function printentityview(Request $request)
{
    $this->data['singledata']=Entity::where('id',$request->id)->first();
    // return response()->json($this->data['singledata']);
    // exit();
    $pdf = PDF::loadView('pdf/entityview',$this->data);
    return $pdf->download('entityreport.pdf');

}
public function get_city(Request $request)
{
    return response()->json(DB::table('cities')->where('state_id',$request->state_id)->get());
}

public function send_email_mob_otp(Request $request)
{
    $otp1=rand(1000,9999);
        // $name='Sir/Mam';
        // $msg='Dear '.$name.', Your OTP is '.$otp1.'. Send by WEBMEDIA';
        // $msg=urlencode($msg);
        // $data="uname=habitm1&pwd=habitm1&senderid=WMEDIA&to=".$request->mobno."&msg=".$msg."&route=T&peid=1701159196421355379&tempid=1707161527969328476";
        // $ch = curl_init('http://bulksms.webmediaindia.com/sendsms?');
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $result = curl_exec($ch);
        // curl_close($ch);

  $otp2=rand(1000,9999);
  //       $to_name=$request->pername;
  // $to_email=$request->email;
  //   $this->data['info']=   array('name'=>$request->pername,'otp'=>$otp2);

  // Mail::send('mail',$this->data, function($message) use ($to_name, $to_email) {
  //   $message->to($to_email, $to_name)
  //   ->subject('VotingPaper Email Verification');
  //   $message->from('mohsin@gmail.com','VotingPaper');
  // });

  $data=array('mob_otp'=>$otp1,'email_otp'=>$otp2);
  return $data;
}


}
