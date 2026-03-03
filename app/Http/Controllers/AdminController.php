<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Orden;

class AdminController extends Controller
{
    public function index()

    {
        $total_roles = Role::count();
        $total_usuarios = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'SUPER ADMIN');
        })->count();
        $total_categorias = Categoria::count();
        $total_productos = Producto::count();
        $total_pedidos_nuevo = Orden::where('estado_orden', 'Procesando')->count();
        $total_pedidos_enviados = Orden::where('estado_orden', 'Enviado')->count();
        $total_pedidos_entregados = Orden::where('estado_orden', 'Entregado')->count();
        $total_pedidos = Orden::count();
        return view('admin.index', compact('total_roles', 'total_usuarios', 'total_categorias', 
        'total_productos', 'total_pedidos_nuevo', 'total_pedidos_enviados', 'total_pedidos_entregados', 'total_pedidos'));
    }
}
