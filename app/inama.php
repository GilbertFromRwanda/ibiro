<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inama extends Model
{
    //
      //specify table name

    protected $table='inama_tb';

    //specify primary key

  public  $primaryKey='id';
  
  public $timestamps=true;
}
