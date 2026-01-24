# 🛒 E-Commerce Laravel

Un sistema de comercio electrónico moderno construido con Laravel 12, que incluye gestión de roles y permisos, panel de administración y autenticación de usuarios.

![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

## 📋 Tabla de Contenidos

- [Características](#-características)
- [Requisitos](#-requisitos)
- [Instalación](#-instalación)
- [Configuración](#-configuración)
- [Uso](#-uso)
- [Estructura del Proyecto](#-estructura-del-proyecto)
- [Tecnologías Utilizadas](#-tecnologías-utilizadas)
- [Scripts Disponibles](#-scripts-disponibles)
- [Contribuir](#-contribuir)
- [Licencia](#-licencia)

## ✨ Características

- 🔐 **Sistema de Autenticación** - Registro, login y gestión de usuarios con Laravel UI
- 👥 **Gestión de Roles y Permisos** - Control de acceso basado en roles usando Spatie Permission
- 🎛️ **Panel de Administración** - Interfaz completa para gestionar el sistema
- ⚙️ **Configuración de Ajustes** - Sistema flexible de configuración de la aplicación
- 🎨 **Interfaz Moderna** - Diseño responsivo con Bootstrap 5 y Tailwind CSS
- 🚀 **Desarrollo Rápido** - Hot Module Replacement (HMR) con Vite
- 📦 **Base de Datos SQLite** - Configuración por defecto para desarrollo rápido

## 🔧 Requisitos

Antes de comenzar, asegúrate de tener instalado:

- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 18.x
- **NPM** >= 9.x
- **SQLite** (o MySQL/PostgreSQL si prefieres)

## 📥 Instalación

### Instalación Rápida

Clona el repositorio y ejecuta el script de configuración automática:

```bash
# Clonar el repositorio
git clone https://github.com/alejoprograming26/Ecommerce-project.git
cd ecommerce

# Instalar dependencias y configurar el proyecto
composer run setup
```

### Instalación Manual

Si prefieres instalar paso a paso:

```bash
# 1. Clonar el repositorio
git clone https://github.com/alejoprograming26/Ecommerce-project.git
cd ecommerce

# 2. Instalar dependencias de PHP
composer install

# 3. Copiar el archivo de configuración
copy .env.example .env

# 4. Generar la clave de aplicación
php artisan key:generate

# 5. Crear la base de datos SQLite (si no existe)
type nul > database\database.sqlite

# 6. Ejecutar las migraciones
php artisan migrate

# 7. Instalar dependencias de Node.js
npm install

# 8. Compilar los assets
npm run build
```

## ⚙️ Configuración

### Base de Datos

Por defecto, el proyecto usa SQLite. Si deseas usar MySQL o PostgreSQL, edita el archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

### Configuración de Roles

El proyecto utiliza [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission) para la gestión de roles. Después de migrar, puedes crear roles y permisos:

```bash
php artisan tinker
```

```php
// Crear roles
use Spatie\Permission\Models\Role;
Role::create(['name' => 'admin']);
Role::create(['name' => 'vendedor']);
Role::create(['name' => 'cliente']);

// Asignar rol a un usuario
$user = App\Models\User::find(1);
$user->assignRole('admin');
```

## 🚀 Uso

### Modo Desarrollo

Para iniciar el servidor de desarrollo con todas las herramientas necesarias:

```bash
# Inicia el servidor, queue, logs y Vite simultáneamente
composer run dev
```

Este comando ejecuta:
- ✅ Servidor Laravel en `http://localhost:8000`
- ✅ Queue listener para trabajos en segundo plano
- ✅ Pail para logs en tiempo real
- ✅ Vite dev server para HMR

### Comandos Individuales

Si prefieres ejecutar los servicios por separado:

```bash
# Servidor de desarrollo
php artisan serve

# Compilar assets en modo desarrollo
npm run dev

# Compilar assets para producción
npm run build

# Ejecutar tests
composer run test
# o
php artisan test
```

## 📁 Estructura del Proyecto

```
ecommerce/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AdminController.php
│   │       ├── AjusteController.php
│   │       ├── RoleController.php
│   │       └── HomeController.php
│   ├── Models/
│   │   ├── User.php
│   │   └── Ajuste.php
│   └── Providers/
├── database/
│   ├── migrations/
│   │   ├── create_users_table.php
│   │   ├── create_ajustes_table.php
│   │   └── create_permission_tables.php
│   └── database.sqlite
├── resources/
│   └── views/
│       ├── admin/
│       │   ├── ajustes/
│       │   └── roles/
│       ├── auth/
│       ├── layouts/
│       └── welcome.blade.php
├── routes/
│   └── web.php
└── public/
```

## 🛠️ Tecnologías Utilizadas

### Backend
- **[Laravel 12](https://laravel.com)** - Framework PHP moderno
- **[Laravel UI](https://github.com/laravel/ui)** - Scaffolding de autenticación
- **[Spatie Permission](https://spatie.be/docs/laravel-permission)** - Gestión de roles y permisos
- **[Laravel Tinker](https://github.com/laravel/tinker)** - REPL para Laravel

### Frontend
- **[Vite](https://vitejs.dev)** - Build tool y dev server
- **[Bootstrap 5](https://getbootstrap.com)** - Framework CSS
- **[Tailwind CSS 4](https://tailwindcss.com)** - Utility-first CSS
- **[Axios](https://axios-http.com)** - Cliente HTTP

### Desarrollo
- **[PHPUnit](https://phpunit.de)** - Testing framework
- **[Laravel Pint](https://laravel.com/docs/pint)** - Code style fixer
- **[Laravel Sail](https://laravel.com/docs/sail)** - Entorno Docker
- **[Concurrently](https://www.npmjs.com/package/concurrently)** - Ejecutar múltiples comandos

## 📜 Scripts Disponibles

### Composer Scripts

```bash
# Configuración inicial completa
composer run setup

# Modo desarrollo (servidor + queue + logs + vite)
composer run dev

# Ejecutar tests
composer run test
```

### NPM Scripts

```bash
# Compilar assets para desarrollo con HMR
npm run dev

# Compilar assets para producción
npm run build
```

## 🤝 Contribuir

Las contribuciones son bienvenidas. Para contribuir:

1. Haz un fork del proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📝 Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

---

## 📞 Soporte

Si tienes alguna pregunta o problema, por favor:

- Abre un [issue](https://github.com/alejoprograming26/Ecommerce-project/issues)
- Contacta al equipo de desarrollo

## 🙏 Agradecimientos

- [Laravel](https://laravel.com) - El framework PHP para artesanos web
- [Spatie](https://spatie.be) - Por el excelente paquete de permisos
- Todos los contribuidores que han ayudado a mejorar este proyecto

---

<p align="center">Hecho con ❤️ usando Laravel</p>
