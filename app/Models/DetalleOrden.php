<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    protected $table = 'detalle_ordens';
    protected $fillable = [
        'orden_id',
        'producto_id',
        'cantidad',
        'precio',
    ];
    public function orden()
    {
        return $this->belongsTo(Orden::class, 'orden_id');
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
