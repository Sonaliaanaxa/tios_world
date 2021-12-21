<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Query extends Model
{
    protected $fillable = ['name','email','mobile'];
    use Sortable;

    public $sortable = ['id','name','email','mobile','created_at'];
}
