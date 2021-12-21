<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Navbar extends Model
{
    // protected $fillable = ['name','email','mobile','city','state','subject','msg'];

    protected $guarded=[];
    use Sortable;

    public $sortable = ['id','name','link','bannerNo','created_at'];
}
