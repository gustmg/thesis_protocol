<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThesisProtocol extends Model
{
    protected $table = 'thesis_protocols';
    protected $primaryKey = 'thesis_protocol_id';
    public $timestamps = false;

    public function evaluator()
    {
        return $this->belongsTo('App\Evaluator');
    }

    public function thesis_protocol_status()
    {
        return $this->belongsTo('App\ThesisProtocolStatus');
    }

    public function thesis_protocol_revision()
    {
        return $this->hasOne('App\ThesisProtocolRevision');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
