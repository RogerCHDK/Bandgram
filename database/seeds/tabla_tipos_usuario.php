<?php

use Illuminate\Database\Seeder;

class tabla_tipos_usuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
        DB::table('tipos_usuarios')->insert([ 
            'nombre' => 'usuario',
            'nivel' => '1',
            'status' => '1',
        ]);

        DB::table('tipos_usuarios')->insert([ 
            'nombre' => 'artista',
            'nivel' => '2',
            'status' => '1',
        ]);
    }
}
