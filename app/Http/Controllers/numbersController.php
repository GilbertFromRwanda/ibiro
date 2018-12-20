<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\sector;
use App\district;
use App\abakozi;
use App\itangazo;
use App\exception;
class numbersController extends Controller
{
//get number of announcemnt of selected officeBoard
public function getNumberOfAnnouncement($code)
    {
  try {
  $totalA=DB::table('itangazo_tb')->where('Office_code',$code)->get()->count();
    return $totalA;
  } catch (Exception $e) {
  return view('errors.404');
  }
}
//get number of meeting occured of selected office
public function getNumberOfMeeting($code)
{
  try {
    $totalmeeting= DB::table("inama_tb")->where('Office_code',$code)->get()->count();
    return $totalmeeting;
  } catch (Exception $e) {
  return view('errors.404');
  }
}
//get number of leaders not available on officeBoard
public function  getUnavailable($code)
{
      try {
         $h=date('H')+2;
   $time=$h.date(':i:s');
   $enddate=date('Y-m-d');

       // echo $enddate;

   //$oname=$this->getofficename($code);
  //remove expired_date;
   $endbreak=exception::where('Office_code',$code)->whereDate('exce_to','<=',$enddate)->where('exce_expire','=','no')->pluck('id');

   if(count($endbreak)>0)
   {
     exception::whereIn('id',$endbreak)->update(['exce_expire'=> 'yes']);

   //  return exception::all();
  //remove unreachablle hour
   $endtime=exception::whereDate('exce_to',$enddate)->whereTime('exce_to','>',$time)->pluck('id');

    if(count($endtime)>0)
    {
      exception::whereIn('id',$endtime)->update(['exce_expire'=> 'no']);
      //DB::select("update abakozi_tb where abakozi_tb.emp_id=exception_tb.emp_id")
    }
   }
  //$abakozi=abakozi::where('status',0)->where('Office_code',$code)->get();
   $number=DB::table('exception_tb')->where('Office_code',$code)->where('exce_expire',"no")->get()->count();

  //$abadahari=DB::select("select * from abakozi_tb,exception_tb where abakozi_tb.emp_id=exception_tb.emp_id and exception_tb.exce_expire=? and exception_tb.Office_code=?",['no',$ocode] );
  //return view('officeboard.knowLeader',compact('oname','url','ocode','abadahari','number'));
    return $number;
  } catch (Exception $e) {

}
}
//get name of wanted office
public function getofficename($ocode)
 {
  try {
 $office='';
 $dis=district::find($ocode);
 $sec=sector::find($ocode);
if(isset($dis))
{
$office.='<h1 class="item">Akarere Ka '.$dis['district_name'].'<h1/>';
return $office;
}
if(isset($sec))
{
$office.='<h1 class="item">Akarere Ka '.$sec['district_name'].'</h1><h5 class="sector">Umurenge Wa '.$sec['sector_name'].'</h5>';
return $office;
}
}
catch (Exception $e) {
 return view('errors.404');
}
}
//gathering number of events
public function getNumbering($ocode)
      {
  try {
   $officeName=$this->getofficename($ocode);
   $nemployee=$this->getUnavailable($ocode);
   $nmeeting=$this->getNumberOfMeeting($ocode);
   $nannounce=$this->getNumberOfAnnouncement($ocode);
   $number= array('officeCode' =>$ocode,'officeName' =>$officeName,'employee' =>$nemployee,'nMeeting' =>$nmeeting,'nAnnouncement' =>$nannounce );
  return $number;
  } catch (Exception $e) {
  }
}
// display numbering of event
public function displayNumbering($code)
{
  try {
   $ocode = Crypt::decryptString($code);
  $number=$this->getNumbering($ocode);
  return view('board.officeBoard',compact('number'));
 } catch (Exception $e) {
 }
}

//get update of getNumbering using ajax
public function getNumberingUpdate(Request $request)
{
     $ocode=$request->data;
    $inama=$this->getNumberOfMeeting($ocode);
    $itangazo=$this->getNumberOfAnnouncement($ocode);
    $absence=$this->getUnavailable($ocode);
    return response(['inama' => $inama,'itangazo' => $itangazo,'absence' => $absence]);
}
}
