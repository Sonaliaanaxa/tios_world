<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use Notifiable;
    use Sortable;
 
   
    // protected $fillable = ['name', 'email', 'password','mobile','address','country','user_type'];

    protected $guarded=[];
     
    protected $hidden = [
        'password', 'remember_token',
    ];

    


    public $sortable = ['id','name','email','city','status','mobile','country','created_at'];
    
    
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
