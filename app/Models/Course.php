<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'title'
        
    ];
    public function program()
    {
        return $this->hasMany(Program::class);
        // OR return $this->hasOne('App\User');
    }
}
