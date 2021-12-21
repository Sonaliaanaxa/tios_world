<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class SubscriptionPlan extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','buspart_id','plan_name','price','tax','vaild','status','created_at'];
}
