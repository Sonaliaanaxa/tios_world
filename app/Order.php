<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Order extends Model
{
    use Sortable;

   protected $guarded=[];
  //  protected $fillable=['name','mobile','address_line_1','city','state','country','zipcode','final_price','final_saving'];

  public $sortable = ['id','name','order_no','final_price','total_items','city','status','payment','created_at'];
}
