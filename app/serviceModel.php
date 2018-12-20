<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serviceModel extends Model
{
    //
    //no casting to int
 //public $incrementing=false;

  //table name
  protected $table='commentonservice';
  //primary key
  public  $primaryKey='id';
//primary key is not integer
  //protected $keyType='string';
  
  public $fillable=['comment_type','details','Office_code'];
  public $timestamps=true;
}
