<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class SideSlider extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','home_slides_id','img','status','created_at'];
}
