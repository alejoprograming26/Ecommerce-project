<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ajuste;
use Spatie\Permission\Models\Role;
use App\Models\Categoria;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Role::create([
        'name'=>'SUPER ADMIN',
       ]);
       Role::create([
        'name'=>'ADMINISTRADOR',

       ]);
       Role::create([
        'name'=>'VENDEDOR',
       ]);
       Role::create([
        'name'=>'CONTABILIDAD',
       ]);
       Role::create([
        'name'=>'OPERADOR',
       ]);
       Role::create([
        'name'=>'CLIENTE',
       ]);

       User::create([
        'name'=>'Alejandro Alvarez',
        'email' =>'joseale260403@gmail.com',
        'password' => bcrypt('12345678'),
       ])->assignRole('SUPER ADMIN');
       
       Ajuste::create([
        'nombre'=>'Ecommerce',
        'descripcion'=>'La mejor Empresa Online',
        'sucursal'=>'Principal',
        'direccion' =>'Cabudare, Lara',  
        'telefonos' =>'573123456789',
        'email' =>'empresa@gmail.com',
        'divisa' =>'Bs',
        'pagina_web' =>'https://www.google.com',
        'logo' =>'logos/lg.png',
        'imagen_login' =>'imagenes_login/login.jpg',
       ]);
       Categoria::factory(17)->create();
       
       
    }
}
