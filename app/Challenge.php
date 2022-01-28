<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Stock;
use App\Animal;

class Challenge extends Model
{

    protected $fillable = [
      'start_date',
      'animal_id',
      'user_id',
      'stock_id',
      'total_production',
      'coefficient',
      'result',
      'production_projection',
      'analysis_time',
      'description',
      'amount_of_meals',
      'application',
      'number_of_animals',
      'total_amount',
      'cost_price',
      'subtotal',
      'projected_production',
      'active',



      ];
      public function animal(){
        return $this->belongsTo(Animal::class);
      }
      public function stock(){
        return $this->belongsTo(Stock::class);
      }
      public function user(){
        return $this->belongsTo(User::class);
      }
}
