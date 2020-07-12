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
            $table->id('thesis_protocol_revision_id');
            $table->unsignedBigInteger('title_status_id');
            $table->string('title_commentary')->nullable();
            $table->unsignedBigInteger('institution_status_id');
            $table->string('institution_commentary')->nullable();
            $table->unsignedBigInteger('scholarship_status_id');
            $table->string('scholarship_commentary')->nullable();
            $table->unsignedBigInteger('assessor_status_id');
            $table->string('assessor_commentary')->nullable();
            $table->unsignedBigInteger('second_assessor_status_id');
            $table->string('second_assessor_commentary')->nullable();
            $table->unsignedBigInteger('summary_status_id');
            $table->string('summary_commentary')->nullable();
            $table->unsignedBigInteger('antecedent_status_id');
            $table->string('antecedent_commentary')->nullable();
            $table->unsignedBigInteger('general_objective_status_id');
            $table->string('general_objective_commentary')->nullable();
            $table->unsignedBigInteger('methodology_status_id');
            $table->string('methodology_commentary')->nullable();
            $table->unsignedBigInteger('schedule_status_id');
            $table->string('schedule_commentary')->nullable();
            $table->unsignedBigInteger('infrastructure_status_id');
            $table->string('infrastructure_commentary')->nullable();
            $table->unsignedBigInteger('art_state_status_id');
            $table->string('art_state_commentary')->nullable();
            $table->unsignedBigInteger('expected_results_status_id');
            $table->string('expected_results_commentary')->nullable();
            $table->unsignedBigInteger('socioeconomic_impact_status_id');
            $table->string('socioeconomic_impact_commentary')->nullable();
            $table->unsignedBigInteger('contributions_status_id');
            $table->string('contributions_commentary')->nullable();
            $table->unsignedBigInteger('bibliography_status_id');
            $table->string('bibliography_commentary')->nullable();
            $table->unsignedBigInteger('thesis_protocol_student_id');

            $table->foreign('title_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('institution_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('scholarship_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('assessor_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
            $table->foreign('second_assessor_status_id')->references('thesis_protocol_field_status_id')->on('thesis_protocol_field_status');
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
            $table->foreign('thesis_protocol_student_id')->references('id')->on('users');
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
