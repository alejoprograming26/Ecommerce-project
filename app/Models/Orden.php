<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordenes';
    protected $fillable = [
        'usuario_id',
        'total',
        'divisa',
        'estado_pago',
        'estado_orden',
        'transaccion_id',
        'direccion_envio',
    ];
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function detalles()
    {
        return $this->hasMany(DetalleOrden::class, 'orden_id');
    }
}
