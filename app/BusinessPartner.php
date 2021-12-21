<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class BusinessPartner extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','name','created_at'];
}
