<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class HomeSlide extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','title','details','created_at'];
}
