<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Homenotification extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','title','created_at'];
}
