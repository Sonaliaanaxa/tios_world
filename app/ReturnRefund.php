<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class ReturnRefund extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','title','details','status','created_at'];
}
