<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Specialitie extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','name','created_at'];
}
