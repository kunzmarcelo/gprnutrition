<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Breed;
use App\Blood;

class Semen extends Model
{
    protected $fillable=[
      'record',
      'name',
      'breed_id',
      'blood_id',
      'supplier_company',
      'sexed',
      'user_id',
    ];

    public function breed(){
      return $this->belongsTo(Breed::class);
    }
    public function blood(){
      return $this->belongsTo(Blood::class);
    }
}
