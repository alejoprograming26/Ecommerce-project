<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoImagen extends Model
{
    protected $fillable = [
        'producto_id',
        'imagen',
    ];
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
