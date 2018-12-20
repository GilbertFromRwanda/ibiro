<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gahunda;
use App\sector;
use App\district;
use App\abakozi;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use DB;
class gahundaController extends Controller
{

      public function getcurrentoffice()
    {
        try {
             $ocode=Auth::guard('office')->user()->Office_code;
    return $ocode;

        } catch (Exception $e) {
        }
    }

 public function __construct()
    {
        $this->middleware('office');
    }

    public function index()
    {

    $oname= $this->getofficename();
 $leader= $this->getLeader();
 return view('office.office-agenda',compact('leader'))->with('oname',$oname);
    }
//get list of employee
 public function getLeader()
 {
 $ocode=$this->getcurrentoffice();
$output='<select value="" name="emp_id" class="form-control empid" style="width:30%;border: 3px solid gray;">';
 $abakozi=abakozi::where('Office_code',$ocode)->get();
  foreach ($abakozi as  $emp) {
    $output.='<option value="'.$emp->emp_id.'">'. $emp->emp_names.'</option>';
  }
  $output.='</select>';
return $output;

 }
public function getofficename()
{
$ocode=$this->getcurrentoffice();
$office='';

$dis=district::find($ocode);
$sec=sector::find($ocode);
if(isset($dis))
{

$office.='<h4>Akarere Ka '.$dis['district_name'].'</h4>';
return $office;
}
if(isset($sec))
{
$office.='<h4>Akarere Ka '.$sec['district_name'].'</h4><h5>Umurenge Wa '.$sec['sector_name'].'</h5>';
return $office;
}
}

    public function store(Request $request)
    {

    $request->validate(['txtgahunda' =>'bail|required']);
    $emp_id=$request->emp_id;
    //return $emp_id;
     $ocode=$this->getcurrentoffice();
    $oname= $this->getofficename();

    $yes=DB::table('gahunda_tb')->where('emp_id',$emp_id)->get();
    $check=$yes->count();
// i need to register shedule for every leader

if($check>0)
{
//update agenda
$gahunda =$request->txtgahunda;
DB::select("update gahunda_tb set gahunda=? where emp_id=?",[$gahunda,$emp_id]);
//$data=DB::select('select * from gahunda_tb where Office_code=?',[$ocode]);
$data= DB::table('gahunda_tb')
->leftJoin('abakozi_tb', 'gahunda_tb.emp_id', '=', 'abakozi_tb.emp_id')
->select('gahunda_tb.*', 'abakozi_tb.emp_names')
 ->where('gahunda_tb.Office_code', '=', $ocode)
->get();
//return $data;
return view('office.viewofficegahunda')->with('oname',$oname)->with('data',$data);
}

else
{
    //  "make new aganda insert";s

        $ogahunda=new gahunda;

        $gahunda =$request->txtgahunda;

        $ogahunda->gahunda=$gahunda;

        $ogahunda->Office_code=$ocode;
        $ogahunda->emp_id=$emp_id;
        $ogahunda->save();
    //  $data=DB::select('select * from gahunda_tb where Office_code=?',[$ocode]);
    //  $data=DB::table('gahunda_tb')->leftjoin('abakozi_tb',)
      $data= DB::table('gahunda_tb')
      ->leftJoin('abakozi_tb', 'gahunda_tb.emp_id', '=', 'abakozi_tb.emp_id')
      ->select('gahunda_tb.*', 'abakozi_tb.emp_names')
       ->where('gahunda_tb.Office_code', '=', $ocode)
      ->get();

     //$data=DB::table('gahunda_tb')->where('Office_code',$ocode)->ord
   return view('office.viewofficegahunda')->with('oname',$oname)->with('data',$data);
}

}

    public function show($id)
    {
    $oname= $this->getofficename();
      //
    $changes= gahunda::find($id);

  return view('office.office-agenda')->with('oname',$oname)->with('edit',$changes['gahunda'])->with('emp_id',$changes['emp_id']);

    }

    public function getagenda()
    {
$oname= $this->getofficename();
$ocode=$this->getcurrentoffice();
$data= DB::table('gahunda_tb')
->leftJoin('abakozi_tb', 'gahunda_tb.emp_id', '=', 'abakozi_tb.emp_id')
->select('gahunda_tb.*', 'abakozi_tb.emp_names')
 ->where('gahunda_tb.Office_code', '=', $ocode)
->get();
 //$data=DB::select('select * from gahunda_tb where Office_code=?',[$ocode]);
return view('office.viewofficegahunda')->with('oname',$oname)->with('data',$data);

    }
}
