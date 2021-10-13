<?php

use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Global_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fecha = Carbon::yesterday('America/El_Salvador')->format('Y-m-d');

        DB::table('consultas')->insert([
            'descripcion'=> 'El paciente es hipocondriaco y al mismo tiempo pragmático, con una gran capacidad intelectual y de raciocinio y a la vez vital',
            'fecha' => $fecha,
            'peso'=>'65 Kg',
            'presion'=>'120 mm Hg',
            'temperatura'=>'36.6 ºC',
            'frecuencia_cardiaca'=>'60 latidos/minuto',
            'frecuencia_respiratoria'=>'18 respiraciones/minuto',
            'paciente_id'=>'1',
            'persona_id'=>'2'



        ]);

        DB::table('consultas')->insert([
            'descripcion'=> 'El diagnóstico fue confirmado por biopsia. el paciente fue tratado con medios biológicos para estimular las defensas inmunológicas',
            'fecha' => $fecha,
            'peso' => '65 Kg',
            'presion' => '120 mm Hg',
            'temperatura' => '36.6 ºC',
            'frecuencia_cardiaca' => '60 latidos/minuto',
            'frecuencia_respiratoria' => '18 respiraciones/minuto',
            'paciente_id'=>'2',
            'persona_id'=>'2'
        ]);

        DB::table('consultas')->insert([
            'descripcion'=> 'Dolor de cabeza en la parte trasera de la cabeza',
            'fecha' => $fecha,
            'peso' => '65 Kg',
            'presion' => '120 mm Hg',
            'temperatura' => '36.6 ºC',
            'frecuencia_cardiaca' => '60 latidos/minuto',
            'frecuencia_respiratoria' => '18 respiraciones/minuto',
            'paciente_id'=>'3',
            'persona_id'=>'3'
        ]);

        DB::table('consultas')->insert([
            'descripcion'=> 'Problemas de vista, le cuesta ver objetivos medianamente pequeños',
            'fecha' => $fecha,
            'peso' => '65 Kg',
            'presion' => '120 mm Hg',
            'temperatura' => '36.6 ºC',
            'frecuencia_cardiaca' => '60 latidos/minuto',
            'frecuencia_respiratoria' => '18 respiraciones/minuto',
            'paciente_id'=>'4',
            'persona_id'=>'3'
        ]);

        DB::table('consultas')->insert([
            'descripcion'=> 'Quebradura de hueso en el brazo izquierdo',
            'fecha' => $fecha,
            'peso' => '65 Kg',
            'presion' => '120 mm Hg',
            'temperatura' => '36.6 ºC',
            'frecuencia_cardiaca' => '60 latidos/minuto',
            'frecuencia_respiratoria' => '18 respiraciones/minuto',
            'paciente_id'=>'5',
            'persona_id'=>'3'
        ]);

        DB::table('consultas')->insert([
            'descripcion'=> 'Nauceas y vertigo, nivel alto de azucar',
            'fecha' => $fecha,
            'peso' => '65 Kg',
            'presion' => '120 mm Hg',
            'temperatura' => '36.6 ºC',
            'frecuencia_cardiaca' => '60 latidos/minuto',
            'frecuencia_respiratoria' => '18 respiraciones/minuto',
            'paciente_id'=>'6',
            'persona_id'=>'2'
        ]);
    }
}
