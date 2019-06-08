<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

         factory(\App\Model\Clientes::class, 2)->create();
         factory(\App\Model\Telefones::class, 2)->create();
         factory(\App\Model\Enderecos::class, 2)->create();
         factory(\App\Model\Marca::class, 2)->create();
         factory(\App\Model\Produtos::class, 8)->create();
         factory(\App\Model\Estoque::class, 2)->create();
    }
}
