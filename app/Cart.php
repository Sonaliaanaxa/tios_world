<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\User;
use Kyslik\ColumnSortable\Sortable;
class Cart extends Model
{
    public function products()
    {
        return $this->belongsto(Product::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','user_id','product_id','quantity','price','tax','shipping_cost','created_at'];
}
