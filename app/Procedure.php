<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Animal;

class Procedure extends Model
{
    protected $fillable =
    [
      'type',
      'date',
      'note',
      'semen_id',
      'user_id',
      ];

      public function animal(){
        return $this->belongsTo(Animal::class); //retorn para o m
      }
}
