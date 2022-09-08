<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table='category';
    public $timestamps=false;
    protected $fillable=[
        'id','description',
    ];
    protected $primaryKey = 'id';
}
