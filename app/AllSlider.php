<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class AllSlider extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','banner','created_at'];
}
