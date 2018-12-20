<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\exception;

class abakozi extends Model
{
    //
      //specify table name

    protected $table='abakozi_tb';

    //specify primary key

  public  $primaryKey='emp_id';

  public $timestamps=true;

public function exceptions()
{
return $this->hasMany('App\exception','id');
}

}
