<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'=> 'Karen Peñate',
            'email'=>'karen.penate@ues.edu.sv',
            'password'=>bcrypt('karen123'),
            'rols_fk'=>'1',
        ]);

        DB::table('users')->insert([
            'name'=> 'Víctor Navarrete',
            'email'=>'victor@ues.edu.sv',
            'password'=>bcrypt('victor123'),
            'rols_fk'=>'1',
        ]);

        DB::table('users')->insert([
            'name'=> 'Edwin López',
            'email'=>'edwin@ues.edu.sv',
            'password'=>bcrypt('edwin123'),
            'rols_fk'=>'1',
        ]);

        DB::table('users')->insert([
            'name'=> 'Abraham Campos',
            'email'=>'abraham@ues.edu.sv',
            'password'=>bcrypt('abraham123'),
            'rols_fk'=>'2',
        ]);

        DB::table('users')->insert([
            'name'=> 'Carlos Cáceres',
            'email'=>'carlos@ues.edu.sv',
            'password'=>bcrypt('carlos123'),
            'rols_fk'=>'3',
        ]);

        DB::table('users')->insert([
            'name'=> 'Christian Hernández',
            'email'=>'christian@ues.edu.sv',
            'password'=> bcrypt('christian123'),
            'rols_fk'=>'4',
        ]);

        
    }
}
