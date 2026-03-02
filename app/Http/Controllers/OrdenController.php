<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Ajuste;
class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Orden::with('detalles')->orderBy('id', 'desc')->paginate(5);
        //return response()->json($ordenes);
        return view('admin.pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $pedido = Orden::find($id);
        return view('admin.pedidos.create', compact('pedido'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return response()->json($request->all());
        $orden = Orden::findOrFail($request->id);
        $ajuste = Ajuste::first();
        $request->validate([
            'nota'=> 'required|string',
        ]);

        $orden->nota = $request->input('nota');
         $orden->estado_orden = 'Enviado';
        $orden->save();

        Mail::to($orden->usuario->email)->send(new \App\Mail\PedidoEnviadoMail($orden, $ajuste));

        return redirect()->route('admin.pedidos.index')->with('success', 'Nota agregada al pedido exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orden $orden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orden $orden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orden $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orden $orden)
    {
        //
    }
}
