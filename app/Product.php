<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Cart;
use App\Order;
use App\User;

class Product extends Model
{
  public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use Sortable;

     protected $guarded=[];
   // protected $fillable=['name'];

    public $sortable = ['id','name','category_id','price','status','highlight','user_name','user_email', 'user_mobile','created_at'];
}
