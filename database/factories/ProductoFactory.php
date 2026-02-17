<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $precioCompra = $this->faker->randomFloat(2, 1, 500);
        $margenGanancia = $this->faker->randomFloat(2, 0.1, 0.2,0.3, 0.5,);
        $precioVenta = $precioCompra * (1 + $margenGanancia);
        $codigo ="PROD". $this->faker->unique()->numberBetween(1000, 9999);

        //nombres de productos realistas por categorias
        $nombresElectronicos = ['Smartphone', 'Laptop', 'Tablet', 'Smartwatch', 'Auriculares', 'Cámara', 'Televisor', 'Consola de videojuegos', 'Altavoz Bluetooth', 'Monitor'];
        $nombresRopa = ['Camiseta', 'Pantalón', 'Vestido', 'Chaqueta', 'Zapatos', 'Gorra', 'Bufanda', 'Guntes', 'Falda', 'Suéter'];
        $nombresAlimentos = ['Manzana', 'Pan', 'Leche', 'Carne', 'Arroz', 'Pasta', 'Queso', 'Huevos', 'Café', 'Té'];
        $nombresHogar = ['Sofá', 'Mesa', 'Silla', 'Cama', 'Armario', 'Lámpara', 'Espejo', 'Alfombra', 'Cortina', 'Estantería'];
        $nombresDeportes = ['Balón de fútbol', 'Raqueta de tenis', 'Bicicleta', 'Zapatillas deportivas', 'Gimnasio en casa', 'Ropa deportiva', 'Protección deportiva', 'Accesorios de yoga', 'Equipo de camping', 'Pesas'];
        $nombresFarmacia = ['Medicamento A', 'Medicamento B', 'Suplemento C', 'Suplemento D', 'Producto de cuidado personal E', 'Producto de cuidado personal F', 'Equipo médico G', 'Equipo médico H', 'Producto de higiene I', 'Producto de higiene J'];

        $todosNombres =array_merge (
            $nombresRopa,
            $nombresAlimentos,
            $nombresHogar,
            $nombresDeportes,
            $nombresFarmacia,
        );

        $nombre = $this->faker->randomElement($todosNombres).' '.
                 $this->faker->randomElement(['Pro', 'Max', 'Plus', 'Ultra', 'Elite', 'Premiun', 'Standard']);




return [
    'categoria_id' => Categoria::inRandomOrder()->first()->id ?? Categoria::factory()->create()->id,
    'nombre' => $nombre,
    'codigo' => $codigo,
    'descripcion_corta' => $this->faker->sentence(8),
    'descripcion_larga' => $this->faker->paragraphs(3, true),
    'precio_compra' => $precioCompra,
    'precio_venta' => round($precioVenta, 2),
    'stock' => $this->faker->numberBetween(0, 100),
];
    }
}
