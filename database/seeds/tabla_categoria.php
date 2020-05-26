<?php

use Illuminate\Database\Seeder;

class tabla_categoria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var1[1]='playeras'; 
        $var1[2]='camisetas';
        $var1[3]='pantalones';
        $var1[4]='pop';
        $var1[5]='pines';
        $var1[6]='discos';
        $var1[7]='posters';

        for ($i=1; $i <=7; $i++) { 
        DB::table('categorias')->insert([ 
            'nombre' => $var1[$i],
            'status' => '1',
        ]);
        }
    }
}
