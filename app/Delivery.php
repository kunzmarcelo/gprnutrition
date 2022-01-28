<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Delivery extends Model
{
    protected $fillable = [
      'collection_date',
      'liters_delivered',
      'liters_consumption',
      'liters_internal_consumption',
      'discarded_liters',
      'total_liters_produced',
      'milk_price',
      'user_id',
    ];

    public static  function totalMonthDelivery() { // funcao que retorna total de entrega nos ultimos 2 meses
      //$now = Carbon::now()->format('m');
      $delivery = new Delivery();
      $now =  date('m', strtotime('-1 months', strtotime(date('Y-m-d'))));
        return $delivery->whereMonth('collection_date', '>=', $now)->where('user_id','=',auth()->user()->id)->orderBy('collection_date','ASC')->get();
    }

    public static function productionTotalMonth(){ // producao de leite individual por animal
      $now = Carbon::now()->format('m');
        $delivery = new Delivery();
      return $delivery->whereMonth('collection_date', '=', $now)->where('user_id','=',auth()->user()->id)->sum('total_liters_produced');
    }

}
