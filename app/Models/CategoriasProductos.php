<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriasProductos extends Model
{
    use HasFactory;
    protected $table='categorias_productos';
    protected $fillable=['name', 'status'];
    public $timestamps=true;
    protected $primarykey = 'id';
}
