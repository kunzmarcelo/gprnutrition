<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
      'description',
      'user_id',
      'registration_date',
      'price',
      'the_amount',
      'unity',
      'provider',
      'active',
    ];
}
