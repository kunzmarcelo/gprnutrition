<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lot;
use App\User;
use App\Medicine;
use App\Production;
use App\Reproduction;
use App\AnimalMedicine;

class Animal extends Model
{
    protected $fillable=[
      'earring',
      'record',
      'name',
      'lot_id',
      'birth_date',
      'breed',
      'blood_grade',
      'sex',
      'origin',
      'date_of_last_delivery',
      'able_to_get_pregnant',
      'value',
      'weaning_date',
      'mother_on_the_property',
      'father_on_the_property',
      'image',
      'active',
      'comments',
      'to_discard',
      'animal_stage',
      'user_id',
    ];
    public function lot(){
      return $this->belongsTo(Lot::class);
    }
    public function user(){
      return $this->belongsTo(User::class);
    }

    public function opcionais(){
        return $this->belongsToMany(Medicine::class,AnimalMedicine::class,'animal_id','medicine_id');

      }
    public function reproductions(){
        return $this->hasOne(Reproduction::class);

      }
    public function productions(){
        return $this->hasMany(Production::class);

      }
}
