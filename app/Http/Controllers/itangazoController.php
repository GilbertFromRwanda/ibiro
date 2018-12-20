<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Office;
use App\district;
use App\sector;
use App\itangazo;
use DB;

class itangazoController extends Controller
{


   // public $redirectTo = '/office/ffice.office-announce';

    public function loginOffice($code)
    {
 $discode= district::findOrFail($code);
 //$sector=sector::findOrFail($code);

 if(isset($discode))
 {
 return $discode;
 }
}

 public function __construct()
    {
        $this->middleware('office');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();

   return view('office.office-announce')->with('oname',$oname);
        }
    public function store(Request $request)
    {

        $itangazo= new itangazo;
 $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();

        $request->validate([
        'ita-body' => 'bail|required',
        'ita-title' =>'required',]);
        $today=date('Y-m-d');

if($today<$request->input('ita-enddate'))
{
$itangazo->Office_code=$request->input('office_id');
$itangazo->ita_title=$request->input('ita-title');
$itangazo->ita_body=$request->input('ita-body');
$itangazo->ita_expiredate=$request->input('ita-enddate');
 $itangazo->save();

 $data= $itangazo->where('Office_code',$request->input('office_id'))->orderBy('id','desc')->get();

$count=$data->count();

return view('office.viewannounce')->with('oname',$oname)->with('report','Itangazo Ryatanzwe')->with('angahe',$count)->with('announce',$data);

}
else
{
    //ita_title   ita_body    ita_expiredate  Office_code
$itangazo->Office_code=$request->input('office_id');
$itangazo->ita_title=$request->input('ita-title');
$itangazo->ita_body=$request->input('ita-body');
$itangazo->ita_expiredate="nodate";
    $itangazo->save();

    $data= $itangazo->where('Office_code',$request->input('office_id'))->orderBy('id','desc')->get();
  $count=$data->count();

return view('office.viewannounce')->with('oname',$oname)->with('report','Itangazo Ryatanzwe')->with('angahe',$count)->with('announce',$data);

    }

    }

    public function show($id)
    {

    $itangazo=itangazo::findOrFail($id);
    return view('office.office-editannounce',compact('itangazo'));
    }

    public function  updateannounce(Request $request)
    {
        $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();
      $id=$request->input('ita_id');
      //return $id;
      $itangazo=itangazo::findOrFail($id);
       $today=date('Y-m-d');
       $code=$this->getcurrentoffice();

if($today<$request->input('ita-enddate'))
{
     $itangazo->ita_title=$request->input('ita-title');
    $itangazo->ita_body=$request->input('ita-body');
      $itangazo->ita_expiredate=$request->input('ita-enddate');
      $itangazo->save();
    $data= $itangazo->where('Office_code',$code)->orderBy('updated_at','desc')->get();

$count=$data->count();

return view('office.viewannounce')->with('oname',$oname)->with('report','Itangazo Ryahindutse')->with('angahe',$count)->with('announce',$data);
}
else
{
 $itangazo->ita_title=$request->input('ita-title');
    $itangazo->ita_body=$request->input('ita-body');
      $itangazo->ita_expiredate='nodate';
      $itangazo->save();
          $data= $itangazo->where('Office_code',$code)->orderBy('updated_at','desc')->get();


$count=$data->count();

return view('office.viewannounce')->with('oname',$oname)->with('report','Itangazo Ryahindutse')->with('angahe',$count)->with('announce',$data);

}
    }

    public function getcurrentoffice()
    {
    $ocode=Auth::guard('office')->user()->Office_code;

    return $ocode;

    }
    public function destroy($id)
    {
        $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();
        DB::table('itangazo_tb')->where('id',$id)->delete();
        $ocode=$this->getcurrentoffice();

     $data= DB::table('itangazo_tb')->where('Office_code',$ocode)->orderBy('id','desc')->get();

      $count=$data->count();

    return view('office.viewannounce')->with('oname',$oname)->with('report','amatangazo Ari kuri board')->with('angahe',$count)->with('announce',$data);

    }
       public function amatangazo()
       {
        $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();
         $itangazo=new itangazo;
         $data= $itangazo->orderBy('id','desc')->get();

         return $data;
       }

    public function viewannounce()
    {
     $ocode=$this->getcurrentoffice();
         $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();
      $data= DB::table('itangazo_tb')->where('Office_code',$ocode)->orderBy('updated_at','desc')->get();
      $count=$data->count();


    return view('office.viewannounce')->with('oname',$oname)->with('report','amatangazo Ari kuri board')->with('angahe',$count)->with('announce',$data);

    //return view("office.viewannounce")->with('report','Wait am still work on it');
    }
}
