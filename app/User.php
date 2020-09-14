<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $fillable = [
        'name', 'email', 'password','is_admin','access_token','oauth_token'
    ];

   function notes()
   {
       return $this->hasMany('\App\Note');
   }
    protected $hidden = [
        'password'
    ];

   
}
