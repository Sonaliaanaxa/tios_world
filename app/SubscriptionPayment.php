<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class SubscriptionPayment extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','plan_name','p_price','p_tax','p_total_price','vaild','u_address','partner','payment_status','created_at'];
}
