<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ajuste;
use App\Models\User;
class DashboardController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $ajuste= Ajuste::first();
            return view('web.dashboard', compact('ajuste'));
        }else{
            return redirect()->route('web.login');
        }

    }
    public function carrito()
    {
         if (Auth::check()) {
            $ajuste= Ajuste::first();
            return view('web.carrito', compact('ajuste'));
        }else{
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
         //return response()->json($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $user->assignRole('CLIENTE');
        Auth::login($user);
        return redirect('/dashboard');
    }
}
