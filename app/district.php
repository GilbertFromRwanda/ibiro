<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
   //no casting happen
 public $incrementing=false;
    //table name
  protected $table='district_tb';
  //primary key
  public  $primaryKey='district_code';
  
  public $timestamps=true;

   protected $keyType='string';

//get district's sectors
  public function  sectors()
  {
  //return $this->hasMany('App\sector');
  }
}
