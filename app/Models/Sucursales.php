<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursales extends Model
{
    use HasFactory;
    protected $table = 'sucursales';

    protected $fillable = [
        'name', 
        'address', 
        'phone', 
        'email', 
        'manager', 
        'status', 
        'location'
    ];

    public $timestamps = true;
}
