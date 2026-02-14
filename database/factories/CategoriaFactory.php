<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nombre = $this->faker->unique()->randomElement([
            'Ropa y Moda',
            'Electronica',
            'Hogar',
            'Deportes',
            'Bebes',
            'Salud y Bienestar',
            'Peliculas y Series',
            'Mascotas',
            'Juguetes',
            'Alimentos y Bebidas',
            'Oficina y Papeleria',
            'Jardin',
            'Gymnasio',
            'Belleza y Cuidado Personal',
            'Farmacia',
            'Automoviles',
            'Libros',
        ]);

        return [
            'nombre'=>$nombre,
            'slug'=> Str::slug($nombre),
            'descripcion'=>$this->faker->optional(0.7)->sentence(15) ,
            
        ];
    }
}
