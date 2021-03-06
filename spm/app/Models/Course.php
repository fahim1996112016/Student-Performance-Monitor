<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $table='courses';
    use HasFactory;
    public function section()
    {
        return $this->hasMany(Section::class);
    }
    public function program()
    {
        return $this->hasOne(Program::class);
    }

}

