<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ajuste;
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
}
