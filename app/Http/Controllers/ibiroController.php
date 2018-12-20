<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\sector;
use App\district;
use App\abakozi;
use App\itangazo;
use App\exception;
use App\gahunda;
use App\inama;
use DB;
class ibiroController extends Controller
{

	public function __construct()
	{
	//	$this->middleware('auth');
	}
	public function getEmployeeUpdatee(request $request)
	    {
		if( $request->ajax())
         {
      $h=date('H')+2;
 $time=$h.date(':i:s');
 $enddate=date('Y-m-d');
 $ocode=$request->data;
$endbreak=exception::where('Office_code',$ocode)->whereDate('exce_to','<=',$enddate)->where('exce_expire','=','no')->pluck('id');
 if(count($endbreak)>0)
 {
   exception::whereIn('id',$endbreak)->update(['exce_expire'=> 'yes']);
$expireDate=exception::where('Office_code',$ocode)->whereDate('exce_to','<=',$enddate)->where('exce_expire','=','no')->pluck('emp_id');
	   abakozi::whereIn('emp_id',$expireDate)->update(['status'=>'1']);
//remove unreachablle hour
 $endtime=exception::whereDate('exce_to',$enddate)->whereTime('exce_to','>',$time)->pluck('id');
  if(count($endtime)>0)
  {
    exception::whereIn('id',$endtime)->update(['exce_expire'=> 'no']);
  }
 }

//$abakozi=abakozi::where('status',0)->where('Office_code',$ocode)->get();

$abadahari=DB::select("select * from abakozi_tb,exception_tb where abakozi_tb.emp_id=exception_tb.emp_id and exception_tb.exce_expire=? and exception_tb.Office_code=?",['no',$ocode] );

       return Response($abadahari);
       }
	}
	public function getofficecode(Request $request)
{
$whois= Auth::guard('getinfo');
$q=$request->input('txtgetcode');
$sector=sector::where('sector_name','like',$q."%")->get();
$district=district::where("district_name","like",$q."%")->get();

return view("getinfo.supervisor",compact('q','whois','sector','district'));
}
//method used for gettinf sector belong to districts
public function getChildOffices($dcode)
{
//$dname=district::find($dcode);
//$sector=DB::table('sector_tb')->join('district','')
$sectors= DB::table('sector_tb')
->leftJoin('district_tb', 'sector_tb.district_name', '=', 'district_tb.district_name')
->select('sector_tb.*', 'district_tb.district_name')
 ->where('district_tb.district_code', '=', $dcode)
->get();
return view("getinfo.supervisor",compact('sectors'))->with('q',$dcode);
}
}
