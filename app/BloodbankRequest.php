<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class BloodbankRequest extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','name','email','city','user_type','created_at'];
}
