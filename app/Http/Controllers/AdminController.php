<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Orden;
use App\Models\DetalleOrden;

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

        // Datos para el gráfico de los últimos 6 meses
        $meses = [];
        $totales = [];
        $totalesProductos = [];
        $nombresMeses = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];

        for ($i = 5; $i >= 0; $i--) {
            $fecha = now()->subMonths($i);
            $meses[] = $nombresMeses[$fecha->month - 1] . ' ' . $fecha->year;
            $totales[] = Orden::whereYear('created_at', $fecha->year)
                            ->whereMonth('created_at', $fecha->month)
                            ->count();
                            
            $totalesProductos[] = DetalleOrden::whereHas('orden', function($q) use ($fecha) {
                $q->whereYear('created_at', $fecha->year)
                  ->whereMonth('created_at', $fecha->month);
            })->sum('cantidad');
        }

        // Datos para el gráfico de Ingresos Totales (Enero a Diciembre del Año Actual)
        $mesesIngresos = [];
        $totalesIngresos = [];
        $ingresoTotalAnual = 0;
        $anioActual = now()->year;

        for ($mes = 1; $mes <= 12; $mes++) {
            $mesesIngresos[] = $nombresMeses[$mes - 1] . ' ' . $anioActual;
            
            // Sumar el campo 'total' de todas las órdenes de ese mes en el año actual
            $ingresoDelMes = Orden::whereYear('created_at', $anioActual)
                                 ->whereMonth('created_at', $mes)
                                 ->sum('total');
                                 
            $totalesIngresos[] = $ingresoDelMes;
            $ingresoTotalAnual += $ingresoDelMes;
        }

        return view('admin.index', compact('total_roles', 'total_usuarios', 'total_categorias', 
        'total_productos', 'total_pedidos_nuevo', 'total_pedidos_enviados', 'total_pedidos_entregados', 'total_pedidos', 'meses', 'totales', 'totalesProductos', 'mesesIngresos', 'totalesIngresos', 'ingresoTotalAnual'));
    }
}
