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
use App\gahunda;
use Carbon\Carbon;
use App\inama;
use App\serviceModel;
class boarddistrictController extends Controller
{
    public function index($code)
    {

}

//get office announcemnt
public function readitangazo($id)
{
try
{
  $numberC=app(\App\Http\Controllers\numbersController::class);
  $itangazo=itangazo::findorFail($id);
  $ocode=$itangazo['Office_code'];
  $number=$numberC->getNumbering($ocode);

$moreAmata=DB::table('itangazo_tb')->where('Office_code',$itangazo['Office_code'])->where('id','<>',$itangazo['id'])->orderby('id','desc')->paginate(4);
return view('officeboard.readItangazo',compact('itangazo','number','moreAmata'));
}
catch (Exception $e) {
   return view('errors.404');
}
}

//read summary of meeting
    public function readinama($id)
    {
    try
     {
$inama=inama::findorFail($id);
$ocode=$inama['Office_code'];
  $numberC=app(\App\Http\Controllers\numbersController::class);
  $number=$numberC->getNumbering($ocode);

$moreinama=DB::table('inama_tb')->where('Office_code',$inama['Office_code'])->where('id','<>',$inama['id'])->orderby('id','desc')->paginate(4);


return view('officeboard.readInama',compact('inama','number','moreinama'));
}
catch (Exception $e) {
   return view('errors.404');
}
}
//get service page
    public function viewservicepage($code)
    {
    $numberC=app(\App\Http\Controllers\numbersController::class);
   $ocode = Crypt::decryptString($code);
   $number=$numberC->getNumbering($ocode);
   //return $number;
     return view('board.suggestionbox',compact('number'));
    }
    public function storeservicecomment(Request $request)
    {

      if($request->ajax())
      {
   $resp='';
  $type=$request->msgtype;
   $details=$request->data;
   $code= Crypt::decryptString($request->code);
if($request->msgtype==1)
   {
 $resp='Murakoze Gushimira';
   }
  else
  {
 $resp="Murakoze kuvuga ibitagenda neza Tukwijeje ko bizasuzumwa";
   }
$reportOnBadWord='Vuga Icyibazo Ufite neza';
$badword= array('igicucu'
  ,'icyigoryi','cyumuyobozi','amaheru','icyirimarima','umu swera','gaswera','fuck','bitch','ntabwenge','nyina','amabyi','icyintu','cyitazi','icyintazi','urugoryi','ikigoryi','rwumuyobozi','muswera','uruhoni','igihoni','stupid','gicucu','umupfu','icyo ntazi','uryo ntazi','yo gapfa','icyo ntazi','umukaritasi','inkaritasi');
 // $finder=str_replace($badword, "(....)", $txt);
  $ckbadword=0;

foreach ($badword as $key => $value)
    {
  if($contains = str_contains($details, $value))
   {
    $ckbadword=1;

    $reportOnBadWord.="(";
    $reportOnBadWord.=$value;
    $reportOnBadWord.=")";
    }

}
if($ckbadword==0)
{
  $comment=new serviceModel;
$comment->comment_type=$type;
$comment->details=$details;
$comment->Office_code=$code;
$comment->save();
 return Response ($resp);
}
else
{
 $reportOnBadWord.=" Ntabwo Igitekerezo Cyawe Cyacyiriwe Wishe Amategeko Agenga Agasandugu";
return Response ($reportOnBadWord);
}
}
}

}
