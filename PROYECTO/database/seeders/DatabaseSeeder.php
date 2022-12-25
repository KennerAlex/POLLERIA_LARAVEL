<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        // \App\Models\User::factory(10)->create();

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
            'name' => 'admin',
            'email' => 'kframi@example.org',
            'email_verified_at' =>'2021-08-14 19:15:38',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => 'uodt9o2WKFbr0U3rR5FSThJ16HLXZQhnm6IfJDcsU1MHhmpQlyeXkzgFTsdi',
            'created_at' => '2021-08-14 19:15:38',
            'updated_at' => '2021-08-14 19:15:38',
            'idtipousuario' => '1',
            'activo' => 1,
            'eliminado' => 0,
            ],
            [
            'name' => 'evellyn',
            'email' => 'evellyn@example.org',
            'email_verified_at' =>'2021-08-14 19:15:38',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => 'uodt9o2WKFbr0U3rR5FSThJ16HLXZQhnm6IfJDcsU1MHhmpQlyeXkzgFTsdi',
            'created_at' => '2021-08-14 19:15:38',
            'updated_at' => '2021-08-14 19:15:38',
            'idtipousuario' => '2',
            'activo' => 1,
            'eliminado' => 0,
            ],
        ]);
    }
}
