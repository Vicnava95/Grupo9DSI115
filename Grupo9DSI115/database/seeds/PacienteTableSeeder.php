<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Global_;

class PacienteTableSeeder extends Seeder
{
    /*static $nombre_pacientes="Jose";
    static $nombre_pacientes=[
        'Julio Ernesto',
        'Nelson Ezequiel',
        'Ramiro Jose',
        'Julian Marcelo',
        'Maria Sonia'
    ];

    static $apellido_pacientes=[
        'Varillas Sosa',
        'Ochoa Lemus',
        'Campos Vazquez',
        'Perez Cañal',
        'Sosa Valse'
    ];
    static $dui_pacientes=[
        '05737318-4',
        '',
        '05789545-4',
        '',
        '06897415-4'
    ];
    static $telefono_casa_pacientes=[
        '2279-0134',
        '2250-7894',
        '2278-9654',
        '2264-8978',
        '2298-5478'
    ];

    static $telefono_celular_pacientes=[
        '7789-9878',
        '7689-5478',
        '6001-4578',
        '',
        '7410-0649'
    ];
    static $fecha_nacimiento_pacientes=[
        '1984-06-21',
        '2009-01-07',
        '1999-01-02',
        '2010-05-12',
        '1951-12-12',
    ];
    static $direccion_pacientes=[
        '3 AV. SUR, No. 12B, SAN JOSE ZACATECOLUCA, LA PAZ',
        'CALLE PPAL. Y 4 CALLE PONIENTE Bo. CONCEPCION, MUNICIPIO DE SAN JUAN NONUALCO, LA PAZ',
        'KM. 46 1/2 C. ZACATECOLUCA , DESVIO ROSARIO DE LA PAZ',
        'KM. 40 CARRETERA A COMALAPA , SAN LUIS TALPA, LA PAZ',
        'AV. NABLUES, No.66, COL.. VILLA PALESTINA, CTON. LAS FLORES, SAN PEDRO MASAHUAT, LA PAZ'
    ];
    static $referencia_personal_pacientes=[
        'Jose Baudilio Perez Celedon',
        'Rosa Elva Marquez Perez',
        '',
        'Maria de los Angeles Estevez Gonazales',
        ''
    ];
    static $tel_refe_pacientes=[
        '2222-4878',
        '2298-7895',
        '7798-2564',
        '7412-4569',
        '7985-1265'
    ];
    static $ocupacion_pacientes=[
        "Profesor",
        "Estudiante Universitario",
        "Comerciante",
        "",
        ""
    ];
    static $correo_pacientes=[
        'JN@gmail.com',
        '',
        'Nelson_ezequiel23@outlook.com',
        'Ramiro_1999@hotmail.com',
        ''
    ];
    static $sexos_pacientes=[
        '1',
        '1',
        '1',
        '1',
        '2'
    ];*/





    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    //public function run($nombre_pacientes)
    {
        /*global $nombre_pacientes,$apellido_pacientes,$dui_pacientes,$telefono_casa_pacientes,$telefono_celular_pacientes,$fecha_nacimiento_pacientes;
        global $direccion_pacientes,$referencia_personal_pacientes,$tel_refe_pacientes,$ocupacion_pacientes,$correo_pacientes,$sexos_pacientes;
        for($i=0;$i<5;$i++){
            DB::table('pacientes')->insert([
            'nombres'=> $nombre_pacientes[$i],
            'apellidos'=>'Varillas Sosa',
            'dui'=>'05737318-9',
            'telefonoCasa'=>'2279-0134',
            'telefonoCelular'=>'7789-9878',
            'fechaDeNacimiento'=>'1984-06-21',
            'direccion'=>'3 AV. SUR, No. 12B, SAN JOSE ZACATECOLUCA, LA PAZ',
            'referenciaPersonal'=>'Jose Baudilio Perez Celedon',
            'telReferenciaPersonal'=>'2222-4878',
            'ocupacion'=>'Profesor',
            'correoElectronico'=>'JN@gmail.com',
            'sexo_id'=>'1'
            ]);
        } */


        DB::table('pacientes')->insert([
            'nombres'=> 'Julio Mario',
            'apellidos'=>'Varillas Sosa',
            'dui'=>'05657318-9',
            'telefonoCasa'=>'2298-0134',
            'telefonoCelular'=>'6089-9878',
            'fechaDeNacimiento'=>'1974-01-01',
            'direccion'=>'4 AV. SUR, No. 14B, SAN JOSE ZACATECOLUCA, LA PAZ',
            'referenciaPersonal'=>'Jose Mario Leiva Celedon',
            'telReferenciaPersonal'=>'2222-4878',
            'ocupacion'=>'Ingeniero Civil',
            'correoElectronico'=>'JN@gmail.com',
            'sexo_id'=>'1'
            ]);

        DB::table('pacientes')->insert([
            'nombres'=> 'Julio Ernesto',
            'apellidos'=>'Cesar Ramirez',
            'dui'=>'05737318-9',
            'telefonoCasa'=>'2279-0134',
            'telefonoCelular'=>'7789-9878',
            'fechaDeNacimiento'=>'1984-06-21',
            'direccion'=>'3 AV. SUR, No. 12B, SAN JOSE ZACATECOLUCA, LA PAZ',
            'referenciaPersonal'=>'Jose Baudilio Perez Celedon',
            'telReferenciaPersonal'=>'2222-4878',
            'ocupacion'=>'Profesor',
            'correoElectronico'=>'JulioCesar@gmail.com',
            'sexo_id'=>'1'
        ]);

        DB::table('pacientes')->insert([
            'nombres'=> 'Mario Alfonso',
            'apellidos'=>'Peñate Sosa',
            'dui'=>'05649872-4',
            'telefonoCasa'=>'2278-0945',
            'telefonoCelular'=>'7698-4521',
            'fechaDeNacimiento'=>'1996-05-23',
            'direccion'=>'CALLE PPAL. Y 4 CALLE PONIENTE Bo. CONCEPCION, MUNICIPIO DE SAN JUAN NONUALCO, LA PAZ',
            'referenciaPersonal'=>'',
            'telReferenciaPersonal'=>'',
            'ocupacion'=>'Estudiante Universitario',
            'correoElectronico'=>'MarioSosa1996@gmail.com',
            'sexo_id'=>'1'
        ]);

        DB::table('pacientes')->insert([
            'nombres'=> 'Mario Alfonso',
            'apellidos'=>'Peñate Sosa',
            'dui'=>'05649872-4',
            'telefonoCasa'=>'2278-0945',
            'telefonoCelular'=>'7698-4521',
            'fechaDeNacimiento'=>'1996-05-23',
            'direccion'=>'CALLE PPAL. Y 4 CALLE PONIENTE Bo. CONCEPCION, MUNICIPIO DE SAN JUAN NONUALCO, LA PAZ',
            'referenciaPersonal'=>'',
            'telReferenciaPersonal'=>'',
            'ocupacion'=>'Estudiante Universitario',
            'correoElectronico'=>'MarioSosa1996@gmail.com',
            'sexo_id'=>'1'
        ]);

        DB::table('pacientes')->insert([
            'nombres'=> 'Maria Eugenia',
            'apellidos'=>'Leiva Peña',
            'dui'=>'05631247-4',
            'telefonoCasa'=>'2298-5647',
            'telefonoCelular'=>'7698-9874',
            'fechaDeNacimiento'=>'1950-05-05',
            'direccion'=>'KM. 46 1/2 C. ZACATECOLUCA , DESVIO ROSARIO DE LA PAZ',
            'referenciaPersonal'=>'Maria de los Angeles Leiva',
            'telReferenciaPersonal'=>'2278-6987',
            'ocupacion'=>'',
            'correoElectronico'=>'',
            'sexo_id'=>'2'
        ]);

        DB::table('pacientes')->insert([
            'nombres'=> 'Mirna Leticia',
            'apellidos'=>'Rodriguez Sosa',
            'dui'=>'05632498-4',
            'telefonoCasa'=>'2245-5647',
            'telefonoCelular'=>'6098-9874',
            'fechaDeNacimiento'=>'1953-04-23',
            'direccion'=>'KM. 46 1/2 C. ZACATECOLUCA , DESVIO ROSARIO DE LA PAZ',
            'referenciaPersonal'=>'Maria Rodriguez Sosa',
            'telReferenciaPersonal'=>'2278-6998',
            'ocupacion'=>'Ama de Casa',
            'correoElectronico'=>'MirnaSosa@outlook.com',
            'sexo_id'=>'2'
        ]);

        DB::table('pacientes')->insert([
            'nombres'=> 'Leonel Samuel ',
            'apellidos'=>'Casas Sosa',
            'dui'=>'04963245-4',
            'telefonoCasa'=>'2245-9857',
            'telefonoCelular'=>'6098-4214',
            'fechaDeNacimiento'=>'1999-01-23',
            'direccion'=>'AV. NABLUES, No.66, COL.. VILLA PALESTINA, CTON. LAS FLORES, SAN PEDRO MASAHUAT, LA PAZ',
            'referenciaPersonal'=>'Diego Armando Casas',
            'telReferenciaPersonal'=>'',
            'ocupacion'=>'Estudiante',
            'correoElectronico'=>'LSCS@outlook.com',
            'sexo_id'=>'1'
        ]);

        DB::table('pacientes')->insert([
            'nombres'=> 'Nelson Armando',
            'apellidos'=>'Campos Navarrete',
            'dui'=>'',
            'telefonoCasa'=>'2298-0945',
            'telefonoCelular'=>'',
            'fechaDeNacimiento'=>'2005-12-05',
            'direccion'=>'CALLE PPAL. Y 4 CALLE PONIENTE Bo. CONCEPCION, MUNICIPIO DE SAN JUAN NONUALCO, LA PAZ',
            'referenciaPersonal'=>'Maria Julia Campos de Navarrete',
            'telReferenciaPersonal'=>'2278-6331',
            'ocupacion'=>'',
            'correoElectronico'=>'',
            'sexo_id'=>'1'
        ]);






    }
}
