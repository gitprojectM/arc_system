<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    
    use HasFactory;

    protected $fillable = ['course_id','review_type','year', 'promo','price'];

    public function program()
    {
        return $this->hasOne(Program::class);
        // OR return $this->hasOne('App\User');
    }

    public function course()
    {
   return $this->belongsTo(Course::class);
        // OR return $this->belongsTo('App\Role');
    }
}
