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
            $table->string('thesis_protocol_scholarship')->nullable();
            $table->string('thesis_protocol_assessor');
            $table->longText('thesis_protocol_summary');
            $table->longText('thesis_protocol_antecedent');
            $table->longText('thesis_protocol_general_objective');
            $table->longText('thesis_protocol_methodology');
            $table->longText('thesis_protocol_schedule');
            $table->longText('thesis_protocol_infrastructure');
            $table->longText('thesis_protocol_art_state');
            $table->longText('thesis_protocol_expected_results');
            $table->longText('thesis_protocol_socioeconomic_impact');
            $table->longText('thesis_protocol_contributions');
            $table->longText('thesis_protocol_bibliography');
            $table->unsignedBigInteger('thesis_protocol_evaluator_id')->nullable();
            $table->unsignedBigInteger('thesis_protocol_status_id')->default(1);

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
