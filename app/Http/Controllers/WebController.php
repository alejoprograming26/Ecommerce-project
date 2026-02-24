<?php

namespace App\Http\Controllers;

use App\Models\Ajuste;
use App\Models\Producto;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $ajuste = Ajuste::first();
        $productos = Producto::paginate(8);

        return view('web.index', compact('ajuste', 'productos'));
    }

    public function buscar_producto(Request $request)
    {
        $ajuste = Ajuste::first();
        $query = $request->input('producto');
        $productos = Producto::where('nombre', 'LIKE', "%$query%")
            ->orWhere('descripcion_corta', 'LIKE', '%'.$query.'%')
            ->orderby('nombre', 'asc')
            ->paginate(8);

        return view('web.buscar', compact('productos', 'query', 'ajuste'));
    }
}
