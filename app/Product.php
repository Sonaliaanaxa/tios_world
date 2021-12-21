<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Product extends Model
{
    use Sortable;

     protected $guarded=[];
   // protected $fillable=['name'];

    public $sortable = ['id','name','category_id','price','status','highlight','user_name','user_email', 'user_mobile','created_at'];
}
