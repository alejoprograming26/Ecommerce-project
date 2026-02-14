<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Categoria;

class AdminController extends Controller
{
    public function index()

    {
        $total_roles = Role::count();
        $total_usuarios = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'SUPER ADMIN');
        })->count();
        $total_categorias = Categoria::count();
        return view('admin.index', compact('total_roles', 'total_usuarios', 'total_categorias'));
    }
}
