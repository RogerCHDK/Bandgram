<?php

use Illuminate\Database\Seeder;

class tabla_estados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var1[1]='Aguascalientes';
        $var1[2]='Baja California';
        $var1[3]='Baja California Sur';
        $var1[4]='Campeche';
        $var1[5]='Coahuila';
        $var1[6]='Colima';
        $var1[7]='Chiapas';
        $var1[8]='Chihuahua';
        $var1[9]='Distrito Federal';
        $var1[10]='Durango';
        $var1[11]='Guanajuato';
        $var1[12]='Guerrero';
        $var1[13]='Hidalgo';
        $var1[14]='Jalisco';
        $var1[15]='México';
        $var1[16]='Michoacán de Ocampo';
        $var1[17]='Morelos';
        $var1[18]='Nayarit';
        $var1[19]='Nuevo León';
        $var1[20]='Oaxaca';
        $var1[21]='Puebla';
        $var1[22]='Querétaro';
        $var1[23]='Quintana Roo';
        $var1[24]='San Luis Potosí';
        $var1[25]='Sinaloa';
        $var1[26]='Sonora';
        $var1[27]='Tabasco';
        $var1[28]='Tamaulipas';
        $var1[29]='Tlaxcala';
        $var1[30]='Veracruz';
        $var1[31]='Yucatán';
        $var1[32]='Zacatecas';

        for ($i=1; $i <=32 ; $i++) { 
        DB::table('estados')->insert([ 
            'nombre' => $var1[$i],
            'status' => '1',
        ]);
        }
    }
}
