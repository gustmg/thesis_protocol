<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThesisProtocol extends Model
{
    protected $table = 'thesis_protocols';
    protected $primaryKey = 'thesis_protocol_student_id';
    public $timestamps = false;
    protected $with = ['student', 'evaluator', 'thesis_protocol_status', 'thesis_protocol_revisions'];

    public function evaluator()
    {
        return $this->belongsTo('App\Evaluator', 'thesis_protocol_evaluator_id');
    }

    public function thesis_protocol_status()
    {
        return $this->belongsTo('App\ThesisProtocolStatus', 'thesis_protocol_status_id');
    }

    public function thesis_protocol_revisions()
    {
        return $this->hasMany('App\ThesisProtocolRevision', 'thesis_protocol_student_id', 'thesis_protocol_student_id');
    }

    public function student()
    {
        return $this->belongsTo('App\Student', 'thesis_protocol_student_id');
    }
}
