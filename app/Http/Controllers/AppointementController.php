<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\abakozi;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;
use App\exception;
use App\office_client_tb;
class AppointementController extends Controller
{
//method used for getting wanted office's EmployeeRegistration
public function getEmployeList($code)
{
$numberC=app(\App\Http\Controllers\numbersController::class);
$ocode = Crypt::decryptString($code);
$number=$numberC->getNumbering($ocode);
$data=abakozi::where('Office_code',$ocode)->get();
return view('officeboard/chooseLeader',compact('data','number'));

}
//method used for getting selected leader_id

public function choosenLeader($empId)
{
  try {
$emp=abakozi::findOrFail($empId);
$schedule=DB::table('gahunda_tb')->where('emp_id',$empId)->get();
//return $schedule;
return view('officeboard/selectedLeader',compact('emp','schedule'));

} catch (Exception $e) {
 return redirect()->back();
}
}
//method used for setting appointement from client_tel
public function setAppointment(Request $request)
{
if($request->ajax())
{
$input= $this->validateClientInput($request->client_date,$request->client_tel);
$checkdate=$this->checkWantedDate($request->empId,$request->client_date);

if($input=='noIsp')
{
return 'Reba Neza ko nimero yatelefone yanditse neza Unarebe italiki yahisemo ko itarangiye';
}
elseif ( $checkdate=='noRandevu') {
  return 'Italiki Wasabyeho Randevu Ntabwo Ibashishe Kuboneka';
}
else {
return $this->CheckClient($input,$request->client_name,$request->empId,$request->client_date);
  //DB::select("insert into office_client_tb values('',$request->client_name,$request->client_tel)");
    //return "Gusaba Randevu Byagenze Neza ";
  }
}
}
// mettho used for ensuring client is first time or not;
 public function CheckClient($tel,$client,$empId,$date)
 {
//   $client=new office_client_tb;
  if(office_client_tb::where('client_tel',$tel)->count()==0)
  {
     DB::table('office_client_tb')->insert(
    ['client_tel' => $tel, 'client_name' => $client,'appointement_date' => $date,'emp_id' => $empId]
);
return "Gusaba Randevu Byagenze Neza";
  }
  else {
 office_client_tb::where('client_tel',$tel)->update(['appointement_date'=> $date]);
  return "Gusaba Randevu bundi bushya Byagenze Neza";
  }

}

// method used for making sure that  leader will available on selected datefmt_create
public function checkWantedDate($empId,$wantedDate)
{
$answer=exception::where('emp_id',$empId)->where('exce_expire','no')->whereDate('exce_to','>=',$wantedDate)->count();
//return $wantedDate;
if($answer==0)
{
return "okRandevu";//"Gusaba Randevu Byagenze Neza ";
}
else {
return "noRandevu";
}
}
// method used for validating input from client
public function validateClientInput($date,$tel)
{
//check if tel contains 078 or 073 or 073;
   // required ISP
   $isp=substr($tel,0,3);
   if(($isp=="078" || $isp=='073' || $isp=='072') && (strlen($tel)==10 && $date >= date('Y-m-d')))
    {
    return "+25".$tel;
    }
   else {
     return "noIsp";
   }
}
//get leader name and office namespace

//method used to get people who asked appointement to the leader
public function getContact($empID,$to,$from)
{
$oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();
$oname=str_replace("<h4>"," ",$oname);
$oname=str_replace("</h4>"," ",$oname);
$emp=abakozi::findorFail($empID);
$names=$emp['emp_names'];
$pos=$emp['emp_position'];
$msg="Kumenyesha ".$oname." Turakumenyeshako ".$pos." ".$names."\nRandevu Wari  wifuje kuwa\n";
//return $msg;
  $client= DB::table('office_client_tb')->where('emp_id',$empID)->whereDate('appointement_date','>=',$from)->whereDate('appointement_date','<=',$to)->get();
//$client=  office_client_tb::where('emp_id',$emp)->whereDate('appointement_date','>=',$from)->whereDate('appointement_date','<=',$to)->get();
$messages = array(array('to'=>'+250789047173', 'body'=>"ibiro"));
foreach ($client as $key => $value) {
  $messages[$key]['to']=$value->client_tel;
  $messages[$key]['body']=$msg." ".$value->appointement_date." Idakunze";
}
return json_encode($messages);
}
public function sendSms($empID,$to,$from){
// Your PHP installation needs cUrl support, which not all PHP installations
// include by default.
$username ='kayita2018'; //'GilbertApps';
$password = 'kibande2018';//'rwandaday1996';
$msg="umurenge wa kacyiru ukumenyesheje ko ushinze uburezi ataraboneka uyu munsi\nkubwimpamvu yakazi";
/*$messages = array(
array('to'=>'+250789047173', 'body'=>$msg),
array('to'=>'+1233454568', 'body'=>'Hello World!')
);*/
$result = $this->send_message( $this->getContact($empID,$to,$from), 'https://api.bulksms.com/v1/messages', $username, $password );
if ($result['http_status'] != 201) {
/*print "Error sending.  HTTP status " . $result['http_status'];
print " Response was " .$result['server_response']*/;
return redirect()->route('unvailable');
} else {
//  print "Response " . $result['server_response'];
return redirect()->route('unvailable');

// Use json_decode($result['server_response']) to work with the response further
}
}
public function send_message ( $post_body, $url, $username, $password) {
$ch = curl_init( );
$headers = array(
'Content-Type:application/json',
'Authorization:Basic '. base64_encode("$username:$password")
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt ( $ch, CURLOPT_URL, $url );
curl_setopt ( $ch, CURLOPT_POST, 1 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_body );
// Allow cUrl functions 20 seconds to execute
curl_setopt ( $ch, CURLOPT_TIMEOUT, 20 );
// Wait 10 seconds while trying to connect
curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
$output = array();
$output['server_response'] = curl_exec( $ch );
$curl_info = curl_getinfo( $ch );
$output['http_status'] = $curl_info[ 'http_code' ];
curl_close( $ch );
return $output;
}
}
