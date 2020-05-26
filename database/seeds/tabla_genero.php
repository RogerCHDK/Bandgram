<?php

use Illuminate\Database\Seeder;

class tabla_genero extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $var1[1]='rock';
        $var1[2]='banda';
        $var1[3]='alternativo';
        $var1[4]='pop';
        $var1[5]='electronica';
        $var1[6]='reggaton';
        $var1[7]='cumbia';
        $var1[8]='salsa';

    for ($i=1; $i <=8 ; $i++) { 
        DB::table('generos')->insert([ 
            'nombre' => $var1[$i],
            'status' => '1',
        ]);
        }
        
         
    }
}
