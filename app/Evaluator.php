<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluator extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    public function thesis_protocols()
    {
        return $this->hasMany('App\ThesisProtocol');
    }
}
