<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThesisProtocolRevision extends Model
{
    protected $table = 'thesis_protocol_revisions';
    protected $primaryKey = 'thesis_protocol_revision_id';

    public function thesis_protocol_title_status ()
    {
        return $this->belongsTo('App\ThesisProtocolFieldStatus');
    }

    public function thesis_protocol_institution_status ()
    {
        return $this->belongsTo('App\ThesisProtocolFieldStatus');
    }

    public function thesis_protocol_scholarship_status ()
    {
        return $this->belongsTo('App\ThesisProtocolFieldStatus');
    }

    public function thesis_protocol_assessor_status ()
    {
        return $this->belongsTo('App\ThesisProtocolFieldStatus');
    }

    public function thesis_protocol_summary_status ()
    {
        return $this->belongsTo('App\ThesisProtocolFieldStatus');
    }

    public function thesis_protocol_antecedent_status ()
    {
        return $this->belongsTo('App\ThesisProtocolFieldStatus');
    }

    public function thesis_protocol_general_objective_status ()
    {
        return $this->belongsTo('App\ThesisProtocolFieldStatus');
    }

    public function thesis_protocol_methodology_status ()
    {
        return $this->belongsTo('App\ThesisProtocolFieldStatus');
    }

    public function thesis_protocol_schedule_status ()
    {
        return $this->belongsTo('App\ThesisProtocolFieldStatus');
    }

    public function thesis_protocol_infrastructure_status ()
    {
        return $this->belongsTo('App\ThesisProtocolFieldStatus');
    }

    public function thesis_protocol_art_state_status ()
    {
        return $this->belongsTo('App\ThesisProtocolFieldStatus');
    }

    public function thesis_protocol_expected_results_status ()
    {
        return $this->belongsTo('App\ThesisProtocolFieldStatus');
    }

    public function thesis_protocol_socioeconomic_impact_status ()
    {
        return $this->belongsTo('App\ThesisProtocolFieldStatus');
    }

    public function thesis_protocol_contributions_status ()
    {
        return $this->belongsTo('App\ThesisProtocolFieldStatus');
    }

    public function thesis_protocol_bibliography_status ()
    {
        return $this->belongsTo('App\ThesisProtocolFieldStatus');
    }
}
