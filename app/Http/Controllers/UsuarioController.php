<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $buscar = $request->get('buscar');
        $estado = $request->get('estado');
        $rol = $request->get('rol');

        $query = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'SUPER ADMIN');
        })->withTrashed();

        if ($buscar) {
            $query->where(function ($q) use ($buscar) {
                $q->where('name', 'like', '%' . $buscar . '%')
                  ->orWhere('email', 'like', '%' . $buscar . '%');
            });
        }

        if ($estado !== null && $estado !== '') {
            if ($estado == '1') {
                $query->whereNull('deleted_at');
            } elseif ($estado == '0') {
                $query->whereNotNull('deleted_at');
            }
        }

        if ($rol) {
            $query->whereHas('roles', function ($q) use ($rol) {
                $q->where('id', $rol);
            });
        }

        $usuarios = $query->paginate(10);
        $roles = Role::where('name', '!=', 'SUPER ADMIN')->get();
        
        return view('admin.usuarios.index', compact('usuarios', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return response()->json($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'rol' => 'required',
           
        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();

        $usuario->assignRole($request->rol);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = User::find($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        $roles = Role::all();
        return view('admin.usuarios.edit', compact('usuario', 'roles'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //return response()->json($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'rol' => 'required',
           
        ]);

        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        if($request->password){
            $usuario->password = bcrypt($request->password);
        }
        $usuario->save();
        $usuario->syncRoles($request->rol);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado exitosamente');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->estado = false;
        $usuario->save();
        $usuario->delete();

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario eliminado exitosamente');

        
    }

    public function restore($id)
    {
       $usuario = User::withTrashed()->find($id);
       $usuario->estado = true;
       $usuario->restore();
       $usuario->save();
    
       return redirect()->route('admin.usuarios.index')->with('success', 'Usuario restaurado exitosamente');
    }
}
