<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table='customer';
    public $timestamps=false;
    protected $fillable=[
        'id','name','addres','phone_number','category_id',
    ];
    protected $primaryKey = 'id';
}
