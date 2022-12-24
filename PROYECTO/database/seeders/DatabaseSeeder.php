<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Vendedor::factory(5)->create()->each(function ($empleado){
            $arrNombres = (explode(' ',$empleado->nombres));
            $arrApellidos = (explode(' ', $empleado->apellidos));
            $username = $arrNombres[0].sizeof($arrNombres).substr($arrNombres[1],0,1).$arrApellidos[0];
            $email = $arrNombres[0]."_".$empleado->dni;
            User::factory()->create([
                'username' => $username,
                'email' => $email."@gmail.com",
                'email_verified_at' => now(),
                'password' => Hash::make('123456'), // 123456
                'remember_token' => Str::random(10),
            ]);
        });
        $this->call(TipoPlatoSeeder::class);
        $this->call(PlatoSeeder::class);
    }
}
