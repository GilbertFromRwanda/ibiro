<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sector;
use App\district;
use DB;
class SearchController extends Controller
{
  //get wanted sectorcomments
public function getSector($txt)
{
$sectors=sector::where("sector_name","like",$txt."%")->take(2)->get();
return $sectors;
}

//get wanted districts

public function getDistrict($txt)
{
$district=district::where("district_name","like",$txt."%")->take(2)->get();
  //$district=DB::table("district_tb")->where("district_name","like",$txt."%")->get();
  return $district;
}

//get highlight from main Search
public function getHighlight(Request $request)
{
  if($request->ajax())
  {
    $input=$request->data;
    $district=$this->getDistrict($input);
    $sectors=$this->getSector($input);

    return Response(['district' => $district,'sector'=>$sectors]);

  }

}

//show type of office second searching

public function SecondSearch($txt)
{
  $offices=$this->getRelatedOffice($txt);
$inputed=$txt;
  return view('after-search',compact('inputed','offices'));
}

//get related to searched offices
public function getRelatedOffice($txt)
{
$district=$district=district::where("district_name","like",$txt."%")->get();
$sector=$sectors=sector::where("sector_name","like",$txt."%")->get();
  $offices= array('district' => $district,'sector' => $sector);
  return $offices;
}
//get another office

public function secondinput(request $request)
{
$txt=$request->input('secondinput');
$offices=$this->getRelatedOffice($txt);
$inputed=$txt;
return view('after-search',compact('inputed','offices'));
}
//get all districts
public function getAlldistrict()
{
$district=DB::table("district_tb")->orderBy('district_name','asc')->get();
$inputed="uturere twose";
return view('after-search',compact('inputed','district'));
}
//get all $sectors
public function getAllSectors()
{
  $sector=DB::table("sector_tb")->orderBy('sector_name','asc')->get();
  $inputed="Imirenge yose";
  return view('after-search',compact('inputed','sector'));
}
//get more result
public function getMoreResult(Request $request)
{
  $txt=$request->input('mainsearch','ntazina Ry Ibiro');
  $offices=$this->getRelatedOffice($txt);
  $inputed=$txt;
  return view('after-search',compact('inputed','offices'));
}
}
