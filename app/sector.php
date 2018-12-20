<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sector extends Model
{

 //no casting to int
 //public $incrementing=false;

  //table name
  protected $table='sector_tb';
  //primary key
  public  $primaryKey='sector_code';
//primary key is not integer
  protected $keyType='string';
  
  public $timestamps=true;


  public function district()
  {

//return $this->belongsTo('App\district');
  }
}
