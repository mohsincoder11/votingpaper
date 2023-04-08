<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use Mail;
use Session,Http;
class RegistrationController extends Controller
{
  public function registration()
  {
    return view('registration');
  }
  public function register(Request $request)
  {


   if($request->hasFile('businessproof')){
    $image1 = $request->file('businessproof');

    $businessproof = rand() . '.' . $image1->getClientOriginalExtension();
    $image1->move(public_path('images/registration/'), $businessproof);

    $image2 = $request->file('idproof');
    $idproof = rand() . '.' . $image2->getClientOriginalExtension();
    $image2->move(public_path('images/registration/'), $idproof);

    $image3 = $request->file('addressproof');
    $addressproof = rand() . '.' . $image3->getClientOriginalExtension();
    $image3->move(public_path('images/registration/'), $addressproof);
    $x=  Registration::create([
      'dateofreg' => date('Y/m/d',strtotime($request['dateofreg'])),
      'cbname' => $request['cbname'],
      'mobile1' => $request['mobile1'],
      'email1' => $request['email1'],
      'mobile2' => $request['mobile2'],
      'email2' => $request['email2'],
      'pername' => $request['pername'],
      'city' => $request['city'],
      'location' => $request['location'],
      'pincode' => $request['pincode'],
      'state' => $request['state'],
      'planname' => $request['planname'],
      'businessproof' => $businessproof,
      'idproof' => $idproof,
      'addressproof' => $addressproof,
      // 'totalcost' => $request['totalcost'],


    ]);
    $this->sendmail($request['cbname'],$request['email1']);
 $this->sendmail($request['pername'],$request['email2']);

    $successcode=1;


    $url='http://service.bulksmsnagpur.net/sendsms?uname=habitm1&pwd=habitm1&senderid=WMEDIA&to='.$request['mobile1'].','.$request['mobile2'].'&msg= You Have Successfully Registered &route=T';
   $sms=Http::get($url);
  // echo($sms->status()); sms status is 200
   
 return redirect('registration')->with('successcode',$successcode);


  }
  else
  {
   $successcode=0;
 }

 return redirect('registration')->with('successcode',$successcode);

}






}




