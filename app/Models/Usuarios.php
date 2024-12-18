<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $fillable = ['name', 'email', 'password', 'status', 'rol'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
