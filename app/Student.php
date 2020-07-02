<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    public function thesis_protocol()
    {
        return $this->hasOne('App\ThesisProtocol');
    }
}
