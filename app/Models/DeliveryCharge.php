<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryCharge extends Model
{
    use HasFactory;
    protected $guarded=[];

    public $sortable = ['id','delivery_charges','status','created_at'];
}
