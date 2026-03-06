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
        $super_admin = Role::create(['name'=>'SUPER ADMIN',]);
        Role::create(['name'=>'ADMINISTRADOR',]);
        Role::create(['name'=>'VENDEDOR',]);
        Role::create(['name'=>'CONTABILIDAD',]);
        Role::create(['name'=>'CLIENTE',]);

       // Módulo Admin
       Permission::create(['name'=>'Dashboard del Administrador'])->syncRoles($super_admin);


       // Módulo Ajustes
       Permission::create(['name'=>'Ajustes del Sistema'])->syncRoles($super_admin);
       Permission::create(['name'=>'Actualizar Ajustes'])->syncRoles($super_admin);

       // Módulo Roles
       Permission::create(['name'=>'Ver Listado de Roles'])->syncRoles($super_admin);
       Permission::create(['name'=>'Crear Rol'])->syncRoles($super_admin);
       Permission::create(['name'=>'Guardar Rol'])->syncRoles($super_admin);
       Permission::create(['name'=>'Ver Detalle de Rol'])->syncRoles($super_admin);
       Permission::create(['name'=>'Editar Rol'])->syncRoles($super_admin);
       Permission::create(['name'=>'Actualizar Rol'])->syncRoles($super_admin);
       Permission::create(['name'=>'Eliminar Rol'])->syncRoles($super_admin);
       Permission::create(['name'=>'Ver Permisos de Rol'])->syncRoles($super_admin);
       Permission::create(['name'=>'Actualizar Permisos de Rol'])->syncRoles($super_admin);

       // Módulo Usuarios
       Permission::create(['name'=>'Ver Listado de Usuarios'])->syncRoles($super_admin);
       Permission::create(['name'=>'Crear Usuario'])->syncRoles($super_admin);
       Permission::create(['name'=>'Guardar Usuario'])->syncRoles($super_admin);
       Permission::create(['name'=>'Ver Detalle de Usuario'])->syncRoles($super_admin);
       Permission::create(['name'=>'Editar Usuario'])->syncRoles($super_admin);
       Permission::create(['name'=>'Actualizar Usuario'])->syncRoles($super_admin);
       Permission::create(['name'=>'Eliminar Usuario'])->syncRoles($super_admin);
       Permission::create(['name'=>'Restaurar Usuario'])->syncRoles($super_admin);

       // Módulo Categorias
       Permission::create(['name'=>'Ver Listado de Categorias'])->syncRoles($super_admin);
       Permission::create(['name'=>'Crear Categoria'])->syncRoles($super_admin);
       Permission::create(['name'=>'Guardar Categoria'])->syncRoles($super_admin);
       Permission::create(['name'=>'Ver Detalle de Categoria'])->syncRoles($super_admin);
       Permission::create(['name'=>'Editar Categoria'])->syncRoles($super_admin);
       Permission::create(['name'=>'Actualizar Categoria'])->syncRoles($super_admin);
       Permission::create(['name'=>'Eliminar Categoria'])->syncRoles($super_admin);

       // Módulo Productos
       Permission::create(['name'=>'Ver Listado de Productos'])->syncRoles($super_admin);
       Permission::create(['name'=>'Crear Producto'])->syncRoles($super_admin);
       Permission::create(['name'=>'Guardar Producto'])->syncRoles($super_admin);
       Permission::create(['name'=>'Ver Detalle de Producto'])->syncRoles($super_admin);
       Permission::create(['name'=>'Editar Producto'])->syncRoles($super_admin);
       Permission::create(['name'=>'Actualizar Producto'])->syncRoles($super_admin);
       Permission::create(['name'=>'Eliminar Producto'])->syncRoles($super_admin);
       Permission::create(['name'=>'Ver Imagenes de Producto'])->syncRoles($super_admin);
       Permission::create(['name'=>'Subir Imagen de Producto'])->syncRoles($super_admin);
       Permission::create(['name'=>'Eliminar Imagen de Producto'])->syncRoles($super_admin);

       // Módulo Pedidos
       Permission::create(['name'=>'Ver Listado de Pedidos'])->syncRoles($super_admin);
       Permission::create(['name'=>'Crear Pedido'])->syncRoles($super_admin);
       Permission::create(['name'=>'Guardar Pedido'])->syncRoles($super_admin);

    }
}
