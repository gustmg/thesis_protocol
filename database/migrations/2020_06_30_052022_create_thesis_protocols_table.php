<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesisProtocolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thesis_protocols', function (Blueprint $table) {
            $table->unsignedBigInteger('thesis_protocol_student_id');
            $table->string('thesis_protocol_title');
            $table->string('thesis_protocol_institution');
            $table->string('thesis_protocol_scholarship');
            $table->string('thesis_protocol_assessor');
            $table->string('thesis_protocol_origin_proyect');
            $table->string('thesis_protocol_summary');
            $table->string('thesis_protocol_antecedent');
            $table->string('thesis_protocol_general_objective');
            $table->string('thesis_protocol_methodology');
            $table->string('thesis_protocol_schedule');
            $table->string('thesis_protocol_infrastructure');
            $table->string('thesis_protocol_art_state');
            $table->string('thesis_protocol_expected_results');
            $table->string('thesis_protocol_socioeconomic_impact');
            $table->string('thesis_protocol_contributions');
            $table->string('thesis_protocol_bibliography');
            $table->unsignedBigInteger('thesis_protocol_evaluator_id');
            $table->unsignedBigInteger('thesis_protocol_status_id');

            $table->foreign('thesis_protocol_student_id')->references('id')->on('users');
            $table->foreign('thesis_protocol_evaluator_id')->references('id')->on('users');
            $table->foreign('thesis_protocol_status_id')->references('thesis_protocol_status_id')->on('thesis_protocol_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thesis_protocols');
    }
}
