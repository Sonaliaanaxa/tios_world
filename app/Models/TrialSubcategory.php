<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class TrialSubcategory extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','name','category_id','created_at'];

    public function category()
    {
        return $this->belongsTo('App\Models\TrialCategory', 'category_id');
    }
}


