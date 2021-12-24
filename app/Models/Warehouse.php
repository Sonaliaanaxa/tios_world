<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Warehouse extends Model
{
    use Sortable;
    use HasFactory;
    protected $guarded=[];

    public $sortable = ['id','name','created_at'];
}
