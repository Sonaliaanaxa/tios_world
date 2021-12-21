<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Policy extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','title','details','created_at'];
}
