<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
     protected $fillable = [
        'name','last_name', 'email', 'password',
    ];
    
    protected $table = 'estudiantes';
    
    public function user()
    {
        return $this->hasOne('App\User','id');
    }
}

