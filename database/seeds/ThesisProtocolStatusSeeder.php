<?php

use Illuminate\Database\Seeder;

class ThesisProtocolStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thesis_protocol_status')->insert(array(
            'thesis_protocol_status_name' => 'A revisión',
        ));
        DB::table('thesis_protocol_status')->insert(array(
            'thesis_protocol_status_name' => 'Aprobado',
        ));
        DB::table('thesis_protocol_status')->insert(array(
            'thesis_protocol_status_name' => 'Rechazado',
        ));
    }
}
