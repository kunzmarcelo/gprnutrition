<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoverageCount extends Model
{
    protected $fillable = [
        'animal_id',
        'count_insemination',
        'pregnancy_percentage',
        'user_id',
    ];
}
