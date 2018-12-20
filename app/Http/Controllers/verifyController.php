<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class verifyController extends Controller
{
    //
//change profile pswd

	public function changeofficeprofile(Request $request)
	{
if($request->ajax())
{

if($request->cfrmpswd != $request->newpswd)
{

return Response("Office Password has not  changed !!!");
}
else
{
$code=$this->getcurrentoffice();

$pswd=DB::table('offices')->where('Office_code',$code)->get();
$wanted='';
$id='';

foreach ($pswd as  $value) {

$wanted=$value->password;
$id=$value->id;
}
  if (Hash::check($request->oldpswd, $wanted))
	   {
    $hidepswd=Hash::make($request->newpswd);
   DB::table('offices')->where('id',$id)->update(['password' => $hidepswd]);
      return Response("Password was changed !!");

        }
        else
        {
        return Response('Password not changed try Again');
        }

}
}
}


 public function getcurrentoffice()
    {
    $ocode=Auth::guard('office')->user()->Office_code;

    return $ocode;
    }



    public function verify()
    {

//check if registered office code;

 $registered=DB::table('offices')->orderby('id','desc')->take(1)->pluck('Office_code');

  $seco=DB::table('sector_tb')->where('sector_code',$registered)->get()->count();
  $diso=DB::table('district_tb')->where('district_code',$registered)->get()->count();

if($seco==1 && $diso==0)
{
return redirect('/office/home');
}
elseif ($seco==0 && $diso==1)
{
return redirect('/office/home');
}
else
{
	//here delete registered office
	$invalid="Invalid Office code";
DB::table('offices')->orderby('id','desc')->take(1)->delete();

return view('office/auth.register',compact('invalid'));
}
}
//get entry office
public function getstarted()
{
	$oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();

 return view('office.home')->with('oname',$oname);

}

}
