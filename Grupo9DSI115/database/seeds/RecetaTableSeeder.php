<?php

use App\Models\Receta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recetas')->insert([
            'descripcion' => 'Paroxetina Mylan  20 mg, Comprimidos recubiertos con pelicula EFG, Tomas 1 pastilla c/d.',
            'fecha' => '2021-08-16',
            'proximaCita' => '2021-08-23',
            'consulta_id' => '1'
        ]);

        DB::table('recetas')->insert([
            'descripcion' => 'Sertralina ALMUS , Comprimidos recubiertos con pelicula EFG, 25 mg los primeros 2 dias, luego 50 mg durante 5 dias.',
            'fecha' => '2021-08-16',
            'proximaCita' => '2021-08-23',
            'consulta_id' => '2'
        ]);

        DB::table('recetas')->insert([
            'descripcion' => 'Acetaminofen 500 mg , Comprimidos (MK) , Tomar 1 pastilla c/8h. Por 7 dias.',
            'fecha' => '2021-08-19',
            'proximaCita' => '2021-08-24',
            'consulta_id' => '3'
        ]);

        DB::table('recetas')->insert([
            'descripcion' => ' Gotas Ciprofloxacina oftálmica, aplicar c/4h. durante 14 dias.',
            'fecha' => '2021-08-19',
            'proximaCita' => '2021-08-25',
            'consulta_id' => '4'
        ]);

        DB::table('recetas')->insert([
            'descripcion' => ' Acetaminofen 500 mg , Comprimidos (MK) , Tomar 1 pastilla c/8h. Por 15 dias.',
            'fecha' => '2021-08-20',
            'proximaCita' => '2021-08-25',
            'consulta_id' => '5'
        ]);

        DB::table('recetas')->insert([
            'descripcion' => ' Dimenhidrinato De 50 a 100 mg (via oral) , 30-60 minutos antes de viajar, de ser necesario continuar con igual dosis cada 6-8 horas.',
            'fecha' => '2021-08-23',
            'proximaCita' => '2021-08-24',
            'consulta_id' => '6'
        ]);

        DB::table('recetas')->insert([
            'descripcion' => ' Meclizina De 25 a 100 mg (via oral), se puede repetir la dosis cada 24h sin exceder los 100 mg al dia.',
            'fecha' => '2021-08-23',
            'proximaCita' => '2021-08-24',
            'consulta_id' => '6'
        ]);



    }
}
