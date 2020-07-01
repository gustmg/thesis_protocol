<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesisProtocolRevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thesis_protocol_revisions', function (Blueprint $table) {
            $table->unsignedBigInteger('thesis_protocol_student_id');
            $table->unsignedBigInteger('title_status_id');
            $table->string('title_commentary');
            $table->unsignedBigInteger('institution_status_id');
            $table->string('institution_commentary');
            $table->unsignedBigInteger('scholarship_status_id');
            $table->string('scholarship_commentary');
            $table->unsignedBigInteger('assessor_status_id');
            $table->string('assessor_commentary');
            $table->unsignedBigInteger('origin_proyect_status_id');
            $table->string('origin_proyect_commentary');
            $table->unsignedBigInteger('summary_status_id');
            $table->string('summary_commentary');
            $table->unsignedBigInteger('antecedent_status_id');
            $table->string('antecedent_commentary');
            $table->unsignedBigInteger('general_objective_status_id');
            $table->string('general_objective_commentary');
            $table->unsignedBigInteger('methodology_status_id');
            $table->string('methodology_commentary');
            $table->unsignedBigInteger('schedule_status_id');
            $table->string('schedule_commentary');
            $table->unsignedBigInteger('infrastructure_status_id');
            $table->string('infrastructure_commentary');
            $table->unsignedBigInteger('art_state_status_id');
            $table->string('art_state_commentary');
            $table->unsignedBigInteger('expected_results_status_id');
            $table->string('expected_results_commentary');
            $table->unsignedBigInteger('socioeconomic_impact_status_id');
            $table->string('socioeconomic_impact_commentary');
            $table->unsignedBigInteger('contributions_status_id');
            $table->string('contributions_commentary');
            $table->unsignedBigInteger('bibliography_status_id');
            $table->string('bibliography_commentary');

            $table->foreign('thesis_protocol_student_id')->references('id')->on('users');
            $table->foreign('title_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('institution_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('scholarship_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('assessor_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('origin_proyect_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('summary_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('antecedent_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('general_objective_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('methodology_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('schedule_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('infrastructure_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('art_state_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('expected_results_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('socioeconomic_impact_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('contributions_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('bibliography_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thesis_protocol_revisions');
    }
}
