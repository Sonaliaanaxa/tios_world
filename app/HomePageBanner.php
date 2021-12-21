<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class HomePageBanner extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','sub_title','title','image','offers','created_at'];
}
