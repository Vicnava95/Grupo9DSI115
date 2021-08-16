<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Global_;

class ConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consultas')->insert([
            'descripcion'=> 'El paciente es hipocondriaco y al mismo tiempo pragmático, con una gran capacidad intelectual y de raciocinio y a la vez vital',
            'fecha'=>'2021-08-23',
            'paciente_id'=>'1',
            'persona_id'=>'1'
        ]);
        
        DB::table('consultas')->insert([
            'descripcion'=> 'El diagnóstico fue confirmado por biopsia. el paciente fue tratado con medios biológicos para estimular las defensas inmunológicas',
            'fecha'=>'2021-08-23',
            'paciente_id'=>'2',
            'persona_id'=>'2'
        ]);

        DB::table('consultas')->insert([
            'descripcion'=> 'Dolor de cabeza en la parte trasera de la cabeza',
            'fecha'=>'2021-08-24',
            'paciente_id'=>'3',
            'persona_id'=>'3'
        ]);
        
        DB::table('consultas')->insert([
            'descripcion'=> 'Problemas de vista, le cuesta ver objetivos medianamente pequeños',
            'fecha'=>'2021-08-25',
            'paciente_id'=>'4',
            'persona_id'=>'4'
        ]);

        DB::table('consultas')->insert([
            'descripcion'=> 'Quebradura de hueso en el brazo izquierdo',
            'fecha'=>'2021-08-25',
            'paciente_id'=>'5',
            'persona_id'=>'3'
        ]);
        
        DB::table('consultas')->insert([
            'descripcion'=> 'Nauceas y vertigo, nivel alto de azucar',
            'fecha'=>'2021-08-24',
            'paciente_id'=>'6',
            'persona_id'=>'4'
        ]);
    }
}
