<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{

      protected $fillable = [
      'name',
      'phase',
      'description',
      'color',
      'user_id'
    ];
}
