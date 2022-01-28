<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Animal;
class Production extends Model
{
    protected $fillable = [
      'date_milking',
      'animal_id',
      'first_milking',
      'second_milking',
      'third_milking',
      'total_milking',
      'user_id',
      ];
    
      public function animal(){
        return $this->belongsTo(Animal::class); //retorn para o m
      }
}
