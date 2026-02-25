<?php

namespace App\Http\Controllers;

use App\Models\Ajuste;
use App\Models\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::check()) {
            $ajuste = Ajuste::first();
            $carritos = Carrito::where('usuario_id', Auth::user()->id)
                ->with('producto.imagenes')
                ->get();

            return view('web.carritos', compact('carritos', 'ajuste'));

        } else {

            return redirect()->route('web.login')->with('info', 'Iniciar Sesion Para Agregar Productos al Carrito');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! Auth::check()) {
            return redirect()->route('web.login')->with('info', 'Debes iniciar sesión para agregar productos al carrito.');
        }

        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);
        $carrito_existe = Carrito::where('usuario_id', Auth::user()->id)->where('producto_id', $request->producto_id)->first();
        if ($carrito_existe) {
            $carrito_existe->cantidad = $carrito_existe->cantidad + $request->cantidad;
            $carrito_existe->save();
        } else {
            $carrito = new Carrito;
            $carrito->usuario_id = Auth::user()->id;
            $carrito->producto_id = $request->producto_id;
            $carrito->cantidad = $request->cantidad;
            $carrito->save();
        }

        return redirect()->route('web.carrito.index')->with('success', 'Producto agregado al carrito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrito $carrito)
    {
        //
    }
}
