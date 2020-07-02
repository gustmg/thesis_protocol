<?php

use Illuminate\Database\Seeder;

class ThesisProtocolFieldStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thesis_protocol_field_status')->insert(array(
            'thesis_protocol_field_status_name' => 'Completo',
        ));
        DB::table('thesis_protocol_field_status')->insert(array(
            'thesis_protocol_field_status_name' => 'Regular',
        ));
        DB::table('thesis_protocol_field_status')->insert(array(
            'thesis_protocol_field_status_name' => 'Incompleto',
        ));
    }
}
