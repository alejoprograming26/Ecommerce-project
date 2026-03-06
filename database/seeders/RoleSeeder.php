<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
        'name'=>'CLIENTE',
       ]);

       // Módulo Admin
       Permission::create(['name'=>'Dashboard del Administrador']);

       // Módulo Ajustes
       Permission::create(['name'=>'Ajustes del Sistema']);
       Permission::create(['name'=>'Actualizar Ajustes']);

       // Módulo Roles
       Permission::create(['name'=>'Ver Listado de Roles']);
       Permission::create(['name'=>'Crear Rol']);
       Permission::create(['name'=>'Guardar Rol']);
       Permission::create(['name'=>'Ver Detalle de Rol']);
       Permission::create(['name'=>'Editar Rol']);
       Permission::create(['name'=>'Actualizar Rol']);
       Permission::create(['name'=>'Eliminar Rol']);
       Permission::create(['name'=>'Ver Permisos de Rol']);
       Permission::create(['name'=>'Actualizar Permisos de Rol']);

       // Módulo Usuarios
       Permission::create(['name'=>'Ver Listado de Usuarios']);
       Permission::create(['name'=>'Crear Usuario']);
       Permission::create(['name'=>'Guardar Usuario']);
       Permission::create(['name'=>'Ver Detalle de Usuario']);
       Permission::create(['name'=>'Editar Usuario']);
       Permission::create(['name'=>'Actualizar Usuario']);
       Permission::create(['name'=>'Eliminar Usuario']);
       Permission::create(['name'=>'Restaurar Usuario']);

       // Módulo Categorias
       Permission::create(['name'=>'Ver Listado de Categorias']);
       Permission::create(['name'=>'Crear Categoria']);
       Permission::create(['name'=>'Guardar Categoria']);
       Permission::create(['name'=>'Ver Detalle de Categoria']);
       Permission::create(['name'=>'Editar Categoria']);
       Permission::create(['name'=>'Actualizar Categoria']);
       Permission::create(['name'=>'Eliminar Categoria']);

       // Módulo Productos
       Permission::create(['name'=>'Ver Listado de Productos']);
       Permission::create(['name'=>'Crear Producto']);
       Permission::create(['name'=>'Guardar Producto']);
       Permission::create(['name'=>'Ver Detalle de Producto']);
       Permission::create(['name'=>'Editar Producto']);
       Permission::create(['name'=>'Actualizar Producto']);
       Permission::create(['name'=>'Eliminar Producto']);
       Permission::create(['name'=>'Ver Imagenes de Producto']);
       Permission::create(['name'=>'Subir Imagen de Producto']);
       Permission::create(['name'=>'Eliminar Imagen de Producto']);

       // Módulo Pedidos
       Permission::create(['name'=>'Ver Listado de Pedidos']);
       Permission::create(['name'=>'Crear Pedido']);
       Permission::create(['name'=>'Guardar Pedido']);

    }
}
