<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Pincode extends Model
{
    // protected $fillable = ['name','email','mobile','city','state','subject','msg'];
    protected $table = "pincode";

    protected $guarded=[];
    use Sortable;

    public $sortable = ['id','name','link','bannerNo','created_at'];
}
