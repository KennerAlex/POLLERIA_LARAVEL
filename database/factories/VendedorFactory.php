<?php

namespace Database\Factories;

use App\Models\Vendedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vendedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dni'=>$this->faker->unique()->dni(),
            'nombres'=>$this->faker->firstName()." ".$this->faker->firstName(),
            'apellidos'=>$this->faker->lastName()."  ".$this->faker->lastName(),
            'sexo'=>$this->faker->randomElement(['M','F'])
        ];
    }
}
