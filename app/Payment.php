<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use Sortable;

    protected $guarded=[];

   public $sortable = ['id','order_no','final_price','payment','created_at'];
}
 