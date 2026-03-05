<?php

namespace App\Http\Controllers;

use App\Models\Ajuste;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orden;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $ajuste = Ajuste::first();
            $total_pedidos = Orden::where('usuario_id', Auth::id())->count();
            $pedidos = Orden::with('usuario', 'detalles')->where('usuario_id', Auth::id())->latest()->paginate(3);
            return view('web.dashboard', compact('ajuste', 'total_pedidos', 'pedidos'));
        } else {
            return redirect()->route('web.login')->with('info', 'Debe iniciar sesión para entrar a su cuenta.');
        }

    }

    public function carrito()
    {
        if (Auth::check()) {
            $ajuste = Ajuste::first();

            return view('web.carritos', compact('ajuste'));
        } else {
            return redirect()->route('web.login');
        }

    }

    public function login()
    {
        $ajuste = Ajuste::first();

        return view('web.login', compact('ajuste'));
    }

    public function autenticacion(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('/dashboard');
        } else {
            return redirect('/web/login')->withErrors(['login_error' => 'Credenciales inválidas']);
        }
    }

    public function registro()
    {
        $ajuste = Ajuste::first();

        return view('web.registro', compact('ajuste'));
    }

    public function crear_cuenta(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $user->assignRole('CLIENTE');
        Auth::login($user);

        return redirect('/dashboard');
    }

    public function ajustes()
    {
        if (Auth::check()) {
            $ajuste = Ajuste::first();
            $total_pedidos = Orden::where('usuario_id', Auth::id())->count();
            $pedidos = Orden::with('usuario', 'detalles')->where('usuario_id', Auth::id())->latest()->paginate(3);

            return view('web.ajustes', compact('ajuste', 'total_pedidos', 'pedidos'));
        } else {
            return redirect()->route('web.login')->with('info', 'Debe iniciar sesión para entrar a su cuenta.');
        }

    }

    public function informacion_personal(Request $request)
    {
      //return response()->json($request->all());
      $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.Auth::user()->id,
      ]);
      $user = User::find(Auth::id());
      $user->name = $request->name;
      $user->email = $request->email;
      $user->save();

      return redirect()->route('web.ajustes.index')->with('success', 'Información personal actualizada correctamente.');

    }

    public function seguridad(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return redirect()->route('web.ajustes.index')->with('error', 'La contraseña actual es incorrecta.');
        }

        $user = User::find(Auth::id());
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('web.ajustes.index')->with('success', 'Contraseña actualizada correctamente.');
    }
}
