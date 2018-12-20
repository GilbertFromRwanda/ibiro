<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;
use App\abakozi;
use Image;
use App\sector;
use App\district;
use Illuminate\Support\Facades\View;
class empController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('office');
    }
    public function store(Request $request)
    {
        //  emp_names   emp_email   emp_tel emp-position   c   emp-image   Office_code
        //empname emptel emppos emp_email empphoto

        $abakozi=new abakozi;

        $request->validate(['empname' =>'required|max:130',
           'empphoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'emp_email' =>'required|max:80|unique:abakozi_tb',
           'emp_tel'   =>'bail|required|max:13|unique:abakozi_tb',
           'emppos'   =>'required|max:100',
        ]);
        //
        if($request->hasFile('empphoto'))
        {

       $image= $request->file('empphoto');
       //$imagename=$image->getClientOriginalName();
       $imagename=time().'.'.$image->extension();

       Image::make($image)->resize(300,300)->save(public_path('/officeImages/'.$imagename));

     // $image->move(public_path('officeImages'),$imagename);

///save emp info

       $ocode=$this->getcurrentoffice();

      $abakozi->emp_names=$request->input('empname');
      $abakozi->emp_email =$request->emp_email;
      $abakozi->emp_tel=$request->emp_tel;
      $abakozi->emp_position =$request->emppos;
      $abakozi->emp_image=$imagename;
      $abakozi->Office_code =$ocode;
      $abakozi->emp_respo=$request->input('emprespo');

      $abakozi->save();
   return $this->viewemployee()->with('msg','Kwandika Umukozi byagenze neza');
      }
    }

  public function viewemployee()
  {
     $ocode=$this->getcurrentoffice();
  //return app(\App\Http\Controllers\gahundaController::class)->getofficename();

 $data= DB::table('abakozi_tb')->where('Office_code',$ocode)->orderBy('emp_id','desc')->get();
 $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();


 return view("office.office-staff")->with('oname',$oname)->with('data',$data);
  }
public function makeRegistration()
{
  $oname=app(\App\Http\Controllers\gahundaController::class)->getofficename();

  return view('office.registerEmployee',compact('oname'));
}

    public function getcurrentoffice()
    {
    $ocode=Auth::guard('office')->user()->Office_code;

    return $ocode;

    }


    public function destroyleader(Request $request)
    {
        //remove employee from office list
if($request->ajax())
{
$abakozi=abakozi::find($request->id);
$imagename=$abakozi->emp_image;
  //remove his image from folder
   unlink('officeImages/' . $imagename);
    //File::delete('officeImages/' . '1522669780.png');
   $abakozi->delete();
  //*/
   return Response("Umukozi avuye kuri board y'ibiro");
    }
  }



   public function getleaderinfo(Request $request)
    {
        //edit employee information

  if($request->ajax())
    {

  $emp=abakozi::findOrFail($request->id);
  return   Response($emp);
    }
  }

  //change employee infromation


  public function EditLeaderInfo(Request $request)
  {

   //$id=$request->input('emp_id')"empid":"16","empname":"niyonsaba gilbert","emp_tel":"0788884342","emp_email":"d@gmail.com","emppos":"SEC","emprespo":"GOOD BEHAVIOR"}
   $abakozi=abakozi::findOrFail($request->input('empid'));
   $abakozi->emp_tel=$request->input("emp_tel");
 $abakozi->emp_email=$request->input("emp_email");
  $abakozi->emp_respo=$request->input("emprespo");
   $abakozi->emp_position=$request->input("emppos");
    $abakozi->emp_names=$request->input("empname");
    $abakozi->save();
    return  $this->viewemployee()->with('msg',"impunduka yabaye");
  }
}
