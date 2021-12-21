<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Askquestion extends Model
{
    use Sortable;

    protected $guarded=[];

    public $sortable = ['id','email','phone','created_at'];
}
