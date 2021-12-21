<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Product;

class Order extends Model
{
  public function products()
    {
        return $this->belongsto(Product::class);
    }
    use Sortable;

   protected $guarded=[];
  

  public $sortable = ['id','name','order_no','final_price','total_items','city','status','payment','created_at'];
}
