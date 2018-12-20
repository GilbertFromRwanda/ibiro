<?php

namespace App;

use App\Notifications\OfficeResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Office extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Office_code', 'password',
    ];
     protected $table='offices';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
      public  $primaryKey='id';


    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new OfficeResetPassword($token));
    }
}
