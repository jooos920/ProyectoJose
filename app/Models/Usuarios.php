<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $fillable = ['name', 'email', 'password', 'status', 'rol'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
