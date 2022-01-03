<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Variation extends Model
{
    use HasFactory;
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','name','created_at'];
}
