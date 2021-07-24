<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            # Mexico States
            ['name' => 'Aguascalientes', 'code' => 'Ags.', 'country_id' => 1],
            ['name' => 'Baja California', 'code' => 'BC', 'country_id' => 1],
            ['name' => 'Baja California Sur', 'code' => 'BCS', 'country_id' => 1],
            ['name' => 'Campeche', 'code' => 'Camp.', 'country_id' => 1],
            ['name' => 'Ciudad de México', 'code' => 'CDMX', 'country_id' => 1],
            ['name' => 'Coahuila de Zaragoza', 'code' => 'Coah.', 'country_id' => 1],
            ['name' => 'Colima', 'code' => 'Col.', 'country_id' => 1],
            ['name' => 'Chiapas', 'code' => 'Chis.', 'country_id' => 1],
            ['name' => 'Chihuahua', 'code' => 'Chih.', 'country_id' => 1],
            ['name' => 'Durango', 'code' => 'Dgo.', 'country_id' => 1],
            ['name' => 'Guanajuato', 'code' => 'Gto.', 'country_id' => 1],
            ['name' => 'Guerrero', 'code' => 'Gro.', 'country_id' => 1],
            ['name' => 'Hidalgo', 'code' => 'Hgo.', 'country_id' => 1],
            ['name' => 'Jalisco', 'code' => 'Jal.', 'country_id' => 1],
            ['name' => 'Ciudad de México', 'code' => 'Mex.', 'country_id' => 1],
            ['name' => 'Mexico', 'code' => 'MX', 'country_id' => 1],
            ['name' => 'Michoacán de Ocampo', 'code' => 'Mich.', 'country_id' => 1],
            ['name' => 'Morelos', 'code' => 'Mor.', 'country_id' => 1],
            ['name' => 'Nayarit', 'code' => 'Nay.', 'country_id' => 1],
            ['name' => 'Nuevo Leon', 'code' => 'NL', 'country_id' => 1],
            ['name' => 'Oaxaca', 'code' => 'Oax.', 'country_id' => 1],
            ['name' => 'Puebla', 'code' => 'Pue.', 'country_id' => 1],
            ['name' => 'Queretaro', 'code' => 'Qro.', 'country_id' => 1],
            ['name' => 'Quintana Roo', 'code' => 'Q. Roo', 'country_id' => 1],
            ['name' => 'San Luis Potosi', 'code' => 'SLP', 'country_id' => 1],
            ['name' => 'Sinaloa', 'code' => 'Sin.', 'country_id' => 1],
            ['name' => 'Sonora', 'code' => 'Son.', 'country_id' => 1],
            ['name' => 'Tabasco', 'code' => 'Tab.', 'country_id' => 1],
            ['name' => 'Tamaulipas', 'code' => 'Tamps.', 'country_id' => 1],
            ['name' => 'Tlaxcala', 'code' => 'Tlax.', 'country_id' => 1],
            ['name' => 'Veracruz de Ignacio de la Llave', 'code' => 'Ver.', 'country_id' => 1],
            ['name' => 'Yucatan', 'code' => 'Yuc.', 'country_id' => 1],
            ['name' => 'Zacatecas', 'code' => 'Zac.', 'country_id' => 1],

        ];

        \App\Models\State::insert($states);
    }
}
