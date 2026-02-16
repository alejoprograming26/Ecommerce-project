<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    /** @use HasFactory<\Database\Factories\ProductoFactory> */
    use HasFactory;
    protected $fillable = [
        'categoria_id',
        'nombre',
        'codigo',
        'descripcion_corta',
        'descripcion_larga',
        'precio_compra',
        'precio_venta',
        'stock',
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    
    public function imagenes()
    {
        return $this->hasMany(ProductoImagen::class);
    }
}
