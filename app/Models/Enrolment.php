<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
    use HasFactory;

    protected $fillable = [
        
         'stud_id' ,
            'prog_id' ,
            'mname' ,
            'suffix' ,
            'mstatus' ,
            'gender' ,
            'bdate' ,
            'paddress',
            'slattended',
            'course' ,
            'termcon' ,
            'modepay' ,
    ];
}
