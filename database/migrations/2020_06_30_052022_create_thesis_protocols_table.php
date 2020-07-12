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
            $table->string('thesis_protocol_title')->nullable();
            $table->string('thesis_protocol_institution_name')->nullable();
            $table->string('thesis_protocol_institution_department')->nullable();
            $table->string('thesis_protocol_institution_address')->nullable();
            $table->string('thesis_protocol_institution_phone')->nullable();
            $table->string('thesis_protocol_scholarship_institution')->nullable();
            $table->string('thesis_protocol_scholarship_type')->nullable();
            $table->string('thesis_protocol_scholarship_vigency')->nullable();
            $table->string('thesis_protocol_assessor_name')->nullable();
            $table->string('thesis_protocol_assessor_academic_degree')->nullable();
            $table->string('thesis_protocol_assessor_phone')->nullable();
            $table->string('thesis_protocol_assessor_institution')->nullable();
            $table->string('thesis_protocol_assessor_adscription_department')->nullable();
            $table->string('thesis_protocol_assessor_address')->nullable();
            $table->string('thesis_protocol_assessor_job_phone')->nullable();
            $table->string('thesis_protocol_second_assessor_name')->nullable();
            $table->string('thesis_protocol_second_assessor_academic_degree')->nullable();
            $table->string('thesis_protocol_second_assessor_phone')->nullable();
            $table->string('thesis_protocol_second_assessor_institution')->nullable();
            $table->string('thesis_protocol_second_assessor_adscription_department')->nullable();
            $table->string('thesis_protocol_second_assessor_address')->nullable();
            $table->string('thesis_protocol_second_assessor_job_phone')->nullable();
            $table->string('thesis_protocol_second_assessor_justification')->nullable();
            $table->longText('thesis_protocol_summary')->nullable();
            $table->longText('thesis_protocol_antecedent')->nullable();
            $table->longText('thesis_protocol_general_objective')->nullable();
            $table->longText('thesis_protocol_methodology')->nullable();
            $table->longText('thesis_protocol_schedule')->nullable();
            $table->longText('thesis_protocol_infrastructure')->nullable();
            $table->longText('thesis_protocol_art_state')->nullable();
            $table->longText('thesis_protocol_expected_results')->nullable();
            $table->longText('thesis_protocol_socioeconomic_impact')->nullable();
            $table->longText('thesis_protocol_contributions')->nullable();
            $table->longText('thesis_protocol_bibliography')->nullable();
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
