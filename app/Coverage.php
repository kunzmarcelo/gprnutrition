<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coverage extends Model
{
  // protected $table ='coverages';
    protected $fillable =
    [
      'animal_id',
      'last_birth',
      'type',
      'insemination_date',
      'diagnosis',
      'date_next_heat',
      'date_touch',
      'dry_date',
      'checkd_dry_date',
      'transition_date',
      'delivery_date',
      'iep',
      'del',
      'situation',
      'insinuating',
      'detail',
      'user_id',
    ];
    public function user(){
      return $this->belongsTo(User::class);
    }
    public function animal(){
      return $this->belongsTo(Animal::class); //retorn para o m
    }
}
