<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Blog extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','blog_title','descriptions','created_at'];
}
