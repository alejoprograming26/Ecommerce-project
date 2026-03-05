<?php

namespace App\Http\Controllers;

use App\Models\Ajuste;
use App\Models\ProductoFavorito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoFavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::check()) {
            $ajuste = Ajuste::first();
            $productoFavoritos = ProductoFavorito::where('usuario_id', Auth::user()->id)
                ->with('producto.imagenes')
                ->get();

            return view('web.favoritos', compact('productoFavoritos', 'ajuste'));

        } else {

            return redirect()->route('web.login')->with('info', 'Iniciar Sesion Para Agregar Productos a Favoritos');
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
            return redirect()->route('web.login')->with('info', 'Debe iniciar sesión para agregar a favoritos');
        }

        request()->validate([
            'producto_id' => 'required|exists:productos,id',
        ]);

        if ($productoFavorito = ProductoFavorito::where('usuario_id', Auth::user()->id)->where('producto_id', $request->producto_id)->first()) {
            $redirectUrl = $request->input('redirect_url', url()->previous());

            return redirect($redirectUrl)->with('info', 'El Producto ya está agregado a favoritos');
        }
        $productoFavorito = new ProductoFavorito;
        $productoFavorito->usuario_id = Auth::user()->id;
        $productoFavorito->producto_id = $request->producto_id;
        $productoFavorito->save();

        $redirectUrl = $request->input('redirect_url', url()->previous());

        return redirect($redirectUrl)->with('success', 'Producto agregado a favoritos');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductoFavorito $productoFavorito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductoFavorito $productoFavorito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductoFavorito $productoFavorito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productoFavorito = ProductoFavorito::findOrFail($id);

        if (! $productoFavorito) {
            return redirect()->route('web.favorito.index')->with('error', 'Producto no encontrado');
        }
        $productoFavorito->delete();

        return redirect()->route('web.favorito.index')->with('success', 'Producto eliminado de favoritos');
    }
}
