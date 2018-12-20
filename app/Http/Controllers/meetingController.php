<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inama;
use Illuminate\Support\Facades\Auth;
use DB;

class meetingController extends Controller
{


     public function __construct()
    {
        $this->middleware('office');
    }
    public function index()
    {

   $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();

   return view('office.office-inama')->with('oname',$oname);

    }


public function viewinama()
{
$ocode=$this->getcurrentoffice();
 $inamas=DB::table("inama_tb")->where('Office_code',$ocode)->orderby('id','desc')->get();
 $report=$inamas->count();

 $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();


return view('office.viewofficeinama')->with('oname',$oname)->with("report",$report)->with('inamas',$inamas);
}


 public function getcurrentoffice()
    {
    $ocode=Auth::guard('office')->user()->Office_code;

    return $ocode;
    }

    public function store(Request $request)
    {
        //
         $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();
$request->validate(['inama_title' =>'bail|required|max:180',
'inama_date' => 'bail|required|date|before:tomorrow',
'inama_body' =>'bail|required|string|max:10000',]);

$ocode=$this->getcurrentoffice();

$inama=new inama();
 $inama->inama_title=$request->inama_title;
 $inama->inama_body=$request->inama_body;
 $inama->inama_pubdate=$request->inama_date;
$inama->Office_code=$ocode;
 $inama->save();

//return $request->all();

 $inamas=DB::table("inama_tb")->where('Office_code',$ocode)->orderby('id','desc')->get();
 $report=$inamas->count();



return view('office.viewofficeinama')->with('oname',$oname)->with("report",$report)->with('inamas',$inamas);
    }


}
