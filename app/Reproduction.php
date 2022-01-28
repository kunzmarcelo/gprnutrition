<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Animal;

class Reproduction extends Model
{
  protected $table = 'reproductions';
    protected $fillable=[
        'animal_id',
        'user_id',
        'created',
        'delivery_date',
        'coverage_date',
        'expected_delivery_date',
        'dry_date',
        'pre_delivery_date',
        'del',
        'del_total',
        'situation',
        'observation1',
        'observation2',
      ];

      protected function animals(){
        return $this->belongsTo('App\Animal','animal_id','id'); // está funcionando link para a duvida --->>>>>https://pt.stackoverflow.com/questions/152089/problemas-com-relacionamento-um-para-muitos-laravel
      }
}
