<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exception extends Model
{
    //
      //specify table name
  protected $table='exception_tb';

 //specify primary key

   public  $primaryKey='id';
  
  public $timestamps=true;

  public function abakozi()
  {

  	return $this->belongsTo("App\abakozi",'emp_id');
  }

}
