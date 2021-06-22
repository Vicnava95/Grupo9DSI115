<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RolTableSeeder::class]);
        $this->call([UserTableSeeder::class]);
        $this->call([SexoTableSeeder::class]);
        $this->call([PacienteTableSeeder::class]);
    }
}
