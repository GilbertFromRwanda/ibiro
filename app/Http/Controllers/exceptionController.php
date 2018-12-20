<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\abakozi;
use App\exception;
use App\district;
use App\sector;
use App\serviceModel;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class exceptionController extends Controller
{
 public function __construct()
    {
        $this->middleware('office');
    }

      public function index()
       {
    $data=$this->getofficeemployee();
   $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();

//return $data;
return view('office.office-emp-exception')->with('oname',$oname)->with('data',$data);
}
//validate exception date

public function validateException()
{
//check expired exxception
$ocode=$this->getcurrentoffice();
$h=date('H')+2;
$time=$h.date(':i:s');
$enddate=date('Y-m-d');
DB::table('exception_tb')->whereDate('exce_to','<',$enddate)->update(['exce_expire'=>'yes']);
//validate today
DB::table('exception_tb')->where('Office_code',$ocode)->whereDate('exce_to','=',$enddate)->whereTime('exce_to','<=',$time)->update(['exce_expire'=>'yes']);

$abadahari=DB::table('exception_tb')->where('Office_code',$ocode)->where('exce_expire','no')->pluck('emp_id');
return $abadahari;
}
//get all employee
    public function getofficeemployee()
    {
     $absence=$this->validateException();
     $abahari=DB::table("abakozi_tb")->whereNotIn('emp_id',$absence)->get();
     $abadahari=DB::table("abakozi_tb")->whereIn('emp_id',$absence)->get();
     $data = array('abahari' =>$abahari,'abadahari'=>$abadahari);
     return $data;
    //return DB::table("abakozi_tb")->get();
    }


    public function getcurrentoffice()
    {
    $ocode=Auth::guard('office')->user()->Office_code;

    return $ocode;

    }


//get employee unvailable on office

    public function viewexception()
    {
 $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();
 $ocode=$this->getcurrentoffice();
 $h=date('H')+2;
 $time=$h.date(':i:s');
 $enddate=date('Y-m-d');

//get specific hour
 $getEndedTime=DB::table('exception_tb')->where('Office_code',$ocode)->whereDate('exce_to',$enddate)->where('exce_expire','no')->orderBy('id','desc')->pluck('id');

if(count($getEndedTime)==0)
{
//DB::select("update exception_tb set exce_expire=? where exce_expire=?",['yes',$getEndedTime]);
DB::table('exception_tb')->whereIn('id',$getEndedTime)->update(['exce_expire'=>'yes']);
}

$getEndedTime=DB::table('exception_tb')->whereIn('id',$getEndedTime)->whereTime('exce_to','>',$time)->orderBy('id','desc')->distinct()->pluck('emp_id');
$getEndedDate=DB::table('exception_tb')->where('Office_code',$ocode)->where('exce_expire','no')->whereDate('exce_to','>',$enddate)->orderBy('id','desc')->distinct()->pluck('emp_id');

$specific_hour=DB::table('abakozi_tb')->whereIn('emp_id',$getEndedTime)->get();
$specific_date=DB::table('abakozi_tb')->whereIn('emp_id',$getEndedDate)->get();

$number=$specific_hour->count();
$number+=$specific_date->count();

return view("office.viewempexception")->with('oname',$oname)->with('report',$number)->with('unvhour',$specific_hour)->with('unvdate',$specific_date);

    }

public function changethere(Request $request)
{

 if($request->ajax())
 {

    exception::where('emp_id',$request->id)->orderBy('id','desc')->take(1)->update(['exce_expire' =>'yes']);

return Response('Ababagana bazi ko Umuyobozi ari kubiro');
 }

 return Response("Ntabwo bikunze");

}
//change employee status

    public function changestutas(Request $request)
    {
      $request->validate(
          [
         'empfrom' =>'required|max:20',
         'empto'   =>'bail|required|',
      ]);
      $report='';
      $ocode=$this->getcurrentoffice();
      $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();
      $empcode=$request->input('empcode');
      $from=(string)$request->input('empfrom');
      $to=(string)$request->input('empto');
      $replacer=$request->input('assista','ntawe');
      $from_t=(string)$request->input('empfrom_t');
      $to_t=(string)$request->input('empto_t');
      if($request->has('empcode') &&  strcasecmp($to, $from)>=0 && strcasecmp($to_t, $from_t)>=0)
      {
      $exc=new exception;
      $exc->emp_id=$empcode;
      $exc->exce_from=$from." ". $from_t;
      $exc->exce_to=$to." ". $to_t;
      $exc->exce_replacer=$replacer;
      $exc->Office_code=$ocode;
       $exc->save();
      //$data=$this->getofficeemployee();
       //$report=" byakunze!!";
      //  return view('office.office-emp-exception')->with('report',$report)->with('oname',$oname)->with('data',$data);
      return $this->showOfficeClients($empcode,$from,$to,$oname);
       }
       else
       {
        $data=$this->getofficeemployee();
        $report="nze reba neza ibyo wanditse";
        return view('office.office-emp-exception')->with('report',$report)->with('oname',$oname)->with('data',$data);
        }
       //return $abakozi->where('emp_id',2);
    }

public function showExceptionform($id)
{
  $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();
  $empname=abakozi::findorFail($id);
  $names=  $empname['emp_names'];
  $client=$this->getClients($id);
//  return $client;
  return view('office.setUnvailable',compact('client','names','id','oname'));
}
//to view all peolple booked the EditLeaderInfo
public function getClients($emp_id)
{
  $today=date('Y-m-d');

 $clients=DB::table('office_client_tb')->where('emp_id',$emp_id)->whereDate('appointement_date','>=',$today)->orderBy('appointement_date')->get();
  return $clients;

}

// method used for getting people who were booking office leader
public function showOfficeClients($id,$from_date,$to_date,$oname)
   {
  $client= DB::table('office_client_tb')->where('emp_id',$id)->whereDate('appointement_date','>=',$from_date)->whereDate('appointement_date','<=',$to_date)->get();
  if($client->count()==0)
  {
  return view('office/ViewAppointmentToLeader')->with('oname',$oname)->with('report','Ntarandevu Ihari Kumuyobozi');
  }
  else {
  return view('office/ViewAppointmentToLeader',compact('client','id','to_date','from_date'))->with('oname',$oname)->with('report','Urashaka Kumenyesha Abasabye Randevu?');
  }
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


//get office type

public function getofficetype($ocode)

{

    $type= district::find($ocode);

      if(empty($type))
      {
        return "sector";
      }
      else
      {
        return "district";
      }


}


//view customer comments

    public function viewcomments()

    {
  $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();
 $ocode= $this->getcurrentoffice();

 $type= $this->getofficetype($ocode);

if($type=='sector')
{

  $gushima=serviceModel::where('Office_code',$ocode)->where('comment_type',1)->orderBy('viewed','asc')->SimplePaginate(6);
  $kunenga=serviceModel::where('Office_code',$ocode)->where('comment_type',0)->orderBy('viewed','asc')->SimplePaginate(6);

 $amashimwe=serviceModel::where('Office_code',$ocode)->where('comment_type',1)->get()->count();
 $abanenga=serviceModel::where('Office_code',$ocode)->where('comment_type',0)->get()->count();


return view('office.office-readsectorComments',compact('gushima','kunenga','amashimwe','abanenga'))->with('oname',$oname);

}
else
{
//get amashimwe of district office

$dname=DB::table('district_tb')->where('district_code',$ocode)->pluck('district_name');
//get sectors belong to  district;

$allsector=DB::table('sector_tb')->where('district_name',$dname)->pluck('sector_code');

$amashimwed=serviceModel::where('Office_code',$ocode)->where('comment_type',1)->orderBy('id','desc')->paginate(6);

$amashimwe=serviceModel::where('Office_code',$ocode)->where('comment_type',1)->get()->count();
$abanenga=serviceModel::where('Office_code',$ocode)->where('comment_type',0)->get()->count();

//get kunenga kwibir0
$kunengad=serviceModel::where('Office_code',$ocode)->where('comment_type',0)->orderBy('id','desc')->paginate(6);

$commentcode = array();
$commentama= array();
$commentkune= array();
$officename= array();
$ic=0;
$ia=0;
$ik=0;
$io=0;
//$i=0;
foreach ($allsector as $sector)
 {

$commentesA=DB::table('commentonservice')->where('Office_code',$sector)->where('comment_type',1)->get()->count();


//echo "<br> amashimwe".$commentesA;
$commentesK=DB::table('commentonservice')->where('Office_code',$sector)->where('comment_type',0)->get()->count();
//echo "<br> kunenga".$commentesK;
$commentcode[$ic] = $sector;
$commentama [$ia]= $commentesA;
$commentkune[$ik]= $commentesK;
$officename[$io]=$this->getsectorname($sector);
$ic++;
$ia++;
$ik++;
$io++;
}
return view('office.office-aboutservice',compact('commentcode','commentama','commentkune','officename','amashimwed','kunengad','amashimwe','abanenga'))->with('oname',$oname);
}
}

  public function getsectorname($code)
  {

$name=sector::find($code);
$onamee='Umurenge wa '.$name['sector_name'];

return $onamee;
  }

//sec view all comments not viwed
public function readcomments($id)
{
  $type='';
$vcomments=serviceModel::findorFail($id);
$code=$this->getcurrentoffice();
$vcomments->viewed="1";
$vcomments->save();
$othercomments=serviceModel::where('Office_code',$code)->orderBy('viewed','asc')->get();

$leftcomment=$othercomments->count();

 $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();
return view('office.office-readComments',compact('leftcomment','oname','vcomments','othercomments'));
}

public function readSectorComments($code)
{
try {
   $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();
  $realcode=Crypt::decryptString($code);
  $sector=sector::findorFail($realcode);
  $sname=$sector->sector_name;
  $gushima=serviceModel::where('Office_code',$realcode)->where('comment_type',1)->orderBy('id','desc')->paginate(6);

$amashimwe=$gushima->count();

  $kunenga=serviceModel::where('Office_code',$realcode)->where('comment_type',0)->orderBy('id','desc')->paginate(6);

$abanenga=$kunenga->count();
return view('office.office-readsectorComments',compact('oname','sname','amashimwe','abanenga','gushima','kunenga')) ;
}
 catch (Exception $e)
  {
  return view('errors.404');
}

}


public function unreadMessage(Request $request)
{
if($request->ajax())
{
$code=$this->getcurrentoffice();

$data=serviceModel::where('Office_code',$code)->where('viewed',0)->get()->count();
return Response( $data);
}
}

//district want to read comments on sectort

public function commentswithdates(Request $request)
{
$request->validate(['txtfromdate' =>'required|date','txttodate' =>'required|date|after_or_equal:txtfromdate']);
$rfromdistrict=$request->input('rfromdistrict','none');

$oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();
 $startdate=$request->input('txtfromdate');
 $enddate=$request->input('txttodate');
if($rfromdistrict !='')
{
//district wnats to view all comments on sector
  $sector=sector::where('sector_name',$rfromdistrict)->take(1)->pluck("sector_code");
 $sname=$rfromdistrict;

 $gushima=serviceModel::where('Office_code',$sector)->where('comment_type',1)->whereDate('created_at',">=",$startdate)->whereDate('created_at','<=',$enddate)->orderBy('id','desc')->get();
 //return $gushima;

  $kunenga=serviceModel::where('Office_code',$sector)->where('comment_type',0)->whereDate('created_at',">=",$startdate)->whereDate('created_at','<=',$enddate)->orderBy('id','desc')->get();
  $amashimwe=$gushima->count();
  $abanenga=$kunenga->count();
  $type="sector";

return view('office.office-readsectorComments',compact('sname','oname','type','amashimwe','abanenga','gushima','kunenga'));
}
else
{
  // request from sector its self
  $sector=$this->getcurrentoffice();

   $gushima=serviceModel::where('Office_code',$sector)->where('comment_type',1)->whereDate('created_at',">=",$startdate)->whereDate('created_at','<=',$enddate)->orderBy('id','desc')->get();
  $kunenga=serviceModel::where('Office_code',$sector)->where('comment_type',0)->whereDate('created_at',">=",$startdate)->whereDate('created_at','<=',$enddate)->orderBy('id','desc')->get();
  $amashimwe=$gushima->count();
  $abanenga=$kunenga->count();
  $type="sector";
  return view('office.office-readsectorComments',compact('oname','type','amashimwe','abanenga','gushima','kunenga')) ;
}

}
public function readcommentsfromDistrict(Request $request)
{
  $request->validate(['txtfromdate' =>'required|date','txttodate' =>'required|date|after_or_equal:txtfromdate']);

 $startdate=$request->input('txtfromdate');
 $enddate=$request->input('txttodate');
$ocode=$this->getcurrentoffice();
$oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();

 $gushima=serviceModel::where('Office_code',$ocode)->where('comment_type',1)->whereDate('created_at',">=",$startdate)->whereDate('created_at','<=',$enddate)->orderBy('id','desc')->get();
 //return $gushima;

  $kunenga=serviceModel::where('Office_code',$ocode)->where('comment_type',0)->whereDate('created_at',">=",$startdate)->whereDate('created_at','<=',$enddate)->orderBy('id','desc')->get();
  $amashimwe=$gushima->count();
  $abanenga=$kunenga->count();

return view('office.office-aboutservice',compact('amashimwe','abanenga','gushima','kunenga'))->with('oname',$oname);
}

public function readsectorcommentsbyD($id)
{
  $who="district";
  $scomments=serviceModel::findorFail($id);
$ocode=$this->getcurrentoffice();
 //$scomments->viewed="1";
  //$scomments->save();
  if($scomments->Office_code==$ocode)
  {
    $who="sector";
   $scomments->viewed="1";
   $scomments->save();
    //return $scomments;

  }

   $sector=sector::findorFail($scomments->Office_code);
  $sname=$sector->sector_name;
  //$commenti=$id;
  $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();

$othercomments=serviceModel::where("Office_code",$scomments->Office_code)->orderBy('viewed',"asc")->take(30)->get();
return view("office.office-readmoresectorComments",compact('sname','oname','scomments','othercomments','who'));
}
}
