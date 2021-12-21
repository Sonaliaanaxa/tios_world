<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class OrderDetail extends Model
{
    use Sortable;

   protected $guarded=[];

  public $sortable = ['id','order_id','product_id','price','quantity','delivery_status','created_at'];
}
