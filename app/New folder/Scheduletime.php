<?php

namespace App;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Scheduletime extends Model
{
    use Notifiable;
    use Sortable;
 
    protected $guarded=[];
    
    public $sortable = ['id','weekday','start_time','end_time','created_at'];

}