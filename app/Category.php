<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Category extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','name','created_at'];

    use HasFactory;
    protected $fillable = ['name', 'slug', 'parent_id'];

    public function subcategory()
    {
        return $this->hasMany(\App\Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(\App\Category::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }
}


