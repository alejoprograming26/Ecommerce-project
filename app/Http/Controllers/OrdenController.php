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
    public function index(Request $request)
    {
        $buscar = $request->buscar;
        $estado = $request->estado;

        $query = Orden::with(['detalles', 'usuario'])->orderBy('id', 'desc');

        if ($buscar) {
            $query->where(function($q) use ($buscar) {
                // Buscar por cliente (nombre o email)
                $q->whereHas('usuario', function($q2) use ($buscar) {
                    $q2->where('name', 'LIKE', "%{$buscar}%")
                      ->orWhere('email', 'LIKE', "%{$buscar}%");
                })
                // O buscar por nombre de producto en los detalles
                ->orWhereHas('detalles.producto', function($q2) use ($buscar) {
                    $q2->where('nombre', 'LIKE', "%{$buscar}%");
                });
            });
        }

        if ($estado) {
            $query->where('estado_orden', $estado);
        }

        $pedidos = $query->paginate(5)->appends($request->query());
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
