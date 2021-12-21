<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Message extends Model
{
    // protected $fillable = ['name','email','mobile','city','state','subject','msg'];

    protected $guarded=[];
    use Sortable;

    public $sortable = ['id','name','city','created_at'];
}
