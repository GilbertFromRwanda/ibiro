<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;
use DB;
use App\inama;
use App\abakozi;
use App\itangazo;
use App\exception;
use App\gahunda;
class viewController extends Controller
{
// get announcement of selected office
public function getannouncement($code)
{
  try {
    $numberC=app(\App\Http\Controllers\numbersController::class);
   $ocode = Crypt::decryptString($code);
   $number=$numberC->getNumbering($ocode);
   $amatangazo=DB::table('itangazo_tb')->where('Office_code',$ocode)->orderby('updated_at','desc')->paginate(4);
  return view('board.highlight',compact('amatangazo','number'));
} catch (Exception $e) {
}
}
//get meedting occured on selected office

public function getMeetings($code)
{
  try {
    $numberC=app(\App\Http\Controllers\numbersController::class);
   $ocode = Crypt::decryptString($code);
   $number=$numberC->getNumbering($ocode);
    $amanama=inama::where('Office_code',$ocode)->orderby('id','desc')->paginate(4);
  return view('board.highlight',compact('amanama','number'));
} catch (Exception $e) {
}
}
//get unvailable employee on selected officeName

public function getUnavailableEmployee($code)
{
  try {
    $numberC=app(\App\Http\Controllers\numbersController::class);
   $ocode = Crypt::decryptString($code);
   $number=$numberC->getNumbering($ocode);
$h=date('H')+2;
$time=$h.date(':i:s');
$enddate=date('Y-m-d');

//remove expired_date;
$endbreak=exception::where('Office_code',$ocode)->whereDate('exce_to','<=',$enddate)->where('exce_expire','=','no')->pluck('id');

if(count($endbreak)>0)
{
 exception::whereIn('id',$endbreak)->update(['exce_expire'=> 'yes']);

//remove unreachablle hour
$endtime=exception::whereDate('exce_to',$enddate)->whereTime('exce_to','>',$time)->pluck('id');

if(count($endtime)>0)
{
  exception::whereIn('id',$endtime)->update(['exce_expire'=> 'no']);
}
}
//$abakozi=abakozi::where('status',0)->where('Office_code',$ocode)->get();

$abadahari=DB::select("select * from abakozi_tb,exception_tb where abakozi_tb.emp_id=exception_tb.emp_id and exception_tb.exce_expire=? and exception_tb.Office_code=?",['no',$ocode] );

//return view('officeboard.knowLeader',compact('oname','url','ocode','abadahari','number'));
  return view('board.abadahari',compact('abadahari','number'));

  } catch (Exception $e) {

}
}
//get schedule of selected officeName
public function getSchedule($code)
{
  try
   {
     $numberC=app(\App\Http\Controllers\numbersController::class);
    $ocode = Crypt::decryptString($code);
    $number=$numberC->getNumbering($ocode);
    $gahunda= DB::table('gahunda_tb')
    ->leftJoin('abakozi_tb', 'gahunda_tb.emp_id', '=', 'abakozi_tb.emp_id')
    ->select('gahunda_tb.*', 'abakozi_tb.emp_names','abakozi_tb.emp_respo')
     ->where('gahunda_tb.Office_code', '=', $ocode)
    ->get();
 return view('board.highlight',compact('gahunda','number'));
}
catch (Exception $e)
{
return view('errors.404');
}
}
}
