<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Collection extends Model
{
    use HasFactory;
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','name','img','created_at'];
}
