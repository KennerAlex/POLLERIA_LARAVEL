<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // TIPOUSUARIO
        DB::table('tipousuario')->insert([
            [
            'tipo' => 'ADMINISTRADOR',
            'activo' => 1,
            'eliminado' => 0,
          ],
          [
            'tipo' => 'MESERO',
            'activo' => 1,
            'eliminado' => 0,
          ],
          [
            'tipo' => 'CLIENTE',
            'activo' => 1,
            'eliminado' => 0,
          ],
          [
            'tipo' => 'CHEF',
            'activo' => 1,
            'eliminado' => 0,
          ],
          [
            'tipo' => 'AYUDANTES',
            'activo' => 1,
            'eliminado' => 0,
          ],
          [
            'tipo' => 'COCINEROS',
            'activo' => 1,
            'eliminado' => 0,
          ],
        
        ]);

        //USERS
        DB::table('users')->insert([
            [
            'username' => 'admin',
            'email' => 'kframi@example.org',
            'email_verified_at' =>'2021-08-14 19:15:38',
            'password' => Hash::make('123456'),
            'remember_token' => 'uodt9o2WKFbr0U3rR5FSThJ16HLXZQhnm6IfJDcsU1MHhmpQlyeXkzgFTsdi',
            'created_at' => '2021-08-14 19:15:38',
            'updated_at' => '2021-08-14 19:15:38',
            'idtipousuario' => '1',
            'activo' => 1,
            'eliminado' => 0,
            ],
            [
            'username' => 'evellyn',
            'email' => 'evellyn@example.org',
            'email_verified_at' =>'2021-08-14 19:15:38',
            'password' => Hash::make('123456'),
            'remember_token' => 'uodt9o2WKFbr0U3rR5FSThJ16HLXZQhnm6IfJDcsU1MHhmpQlyeXkzgFTsdi',
            'created_at' => '2021-08-14 19:15:38',
            'updated_at' => '2021-08-14 19:15:38',
            'idtipousuario' => '2',
            'activo' => 1,
            'eliminado' => 0,
            ],
        ]);

        Vendedor::factory(5)->create()->each(function ($empleado){
            $arrNombres = (explode(' ',$empleado->nombres));
            $arrApellidos = (explode(' ', $empleado->apellidos));
            $username = $arrNombres[0].sizeof($arrNombres).substr($arrNombres[1],0,1).$arrApellidos[0];
            $email = $arrNombres[0]."_".$empleado->dni;
            // User::factory()->create([
            //     'username' => $username,
            //     'email' => $email."@gmail.com",
            //     'email_verified_at' => now(),
            //     'password' => Hash::make('123456'), // 123456
            //     'remember_token' => Str::random(10),
            // ]);
        });
        $this->call(TipoPlatoSeeder::class);
        $this->call(PlatoSeeder::class);
        // \App\Models\User::factory(10)->create();

        
    }
}
