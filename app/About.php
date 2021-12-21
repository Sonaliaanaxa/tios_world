<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class About extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','title','details','created_at'];
}
