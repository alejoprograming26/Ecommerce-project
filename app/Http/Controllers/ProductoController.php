<?php

namespace App\Http\Controllers;

use App\Models\Ajuste;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\ProductoImagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ajuste = Ajuste::first();
        $buscar = $request->input('buscar');
        $query = Producto::query();

        if ($buscar) {
            $query->where(function ($q) use ($buscar) {
                $q->where('nombre', 'like', '%'.$buscar.'%')
                    ->orWhere('codigo', 'like', '%'.$buscar.'%')
                    ->orWhere('descripcion_corta', 'like', '%'.$buscar.'%')
                    ->orWhere('descripcion_larga', 'like', '%'.$buscar.'%');
            });
        }
        $productos = $query->paginate(10);

        return view('admin.productos.index', compact('productos', 'ajuste'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();

        return view('admin.productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:255|unique:productos',
            'descripcion_corta' => 'required|string|max:255',
            'descripcion_larga' => 'required|string',
            'precio_compra' => 'required|numeric|min:0',
            'precio_venta' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $producto = new Producto;
        $producto->categoria_id = $request->categoria_id;
        $producto->nombre = $request->nombre;
        $producto->codigo = $request->codigo;
        $producto->descripcion_corta = $request->descripcion_corta;
        $producto->descripcion_larga = $request->descripcion_larga;
        $producto->precio_compra = $request->precio_compra;
        $producto->precio_venta = $request->precio_venta;
        $producto->stock = $request->stock;
        $producto->save();

        return redirect()->route('admin.productos.index')->with('success', 'Producto creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);

        return view('admin.productos.show', compact('producto'));
    }

    public function imagenes($id)
    {
        $producto = Producto::findOrFail($id);

        return view('admin.productos.imagenes', compact('producto'));
    }

    public function upload_imagen(Request $request, $id)
    {

        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $producto = Producto::findOrFail($id);
        $imagenProducto = new ProductoImagen;
        $imagenProducto->producto_id = $producto->id;
        $imagenProducto->imagen = $request->file('imagen')->store('productos', 'public');
        $imagenProducto->save();

        return redirect()->route('admin.productos.imagenes', $producto->id)->with('success', 'Imagen subida exitosamente');
    }

    public function eliminar_imagen($id, $imagen_id)
    {
        $producto = Producto::findOrFail($id);
        $imagenProducto = ProductoImagen::findOrFail($imagen_id);
        if ($imagenProducto->imagen && Storage::disk('public')->exists($imagenProducto->imagen)) {
            Storage::disk('public')->delete($imagenProducto->imagen);
        }
        $imagenProducto->delete();

        return redirect()->route('admin.productos.imagenes', $producto->id)->with('success', 'Imagen eliminada exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();

        return view('admin.productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:255|unique:productos,codigo,'.$id,
            'descripcion_corta' => 'required|string|max:255',
            'descripcion_larga' => 'required|string',
            'precio_compra' => 'required|numeric|min:0',
            'precio_venta' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->categoria_id = $request->categoria_id;
        $producto->nombre = $request->nombre;
        $producto->codigo = $request->codigo;
        $producto->descripcion_corta = $request->descripcion_corta;
        $producto->descripcion_larga = $request->descripcion_larga;
        $producto->precio_compra = $request->precio_compra;
        $producto->precio_venta = $request->precio_venta;
        $producto->stock = $request->stock;
        $producto->save();

        return redirect()->route('admin.productos.index')->with('success', 'Producto actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        foreach ($producto->imagenes as $imagen) {
            if ($imagen->imagen && Storage::disk('public')->exists($imagen->imagen)) {
                Storage::disk('public')->delete($imagen->imagen);
            }
            $imagen->delete();
        }
        $producto->delete();

        return redirect()->route('admin.productos.index')->with('success', 'Producto eliminado exitosamente');
    }

    public function detalle_producto($id)
    {
        $ajuste = Ajuste::first();
        $producto = Producto::findOrFail($id);

        return view('layouts.web.detalle_producto', compact('producto', 'ajuste'));
    }
}
