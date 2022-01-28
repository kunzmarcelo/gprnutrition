<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
      'dry_animal',
      'pre_delivery',
      'animal_birth',
      'pregnancy_confirmation',
      'released_for_ultrasound',
      'days_to_weaning',
      'voluntary_waiting_period',
      'average_day_of_the_month',
      'user_id',
    ];

    public static function checkSetting(){
        $setting = new Setting();
            return $setting->where('user_id','=',auth()->user()->id)->count();


    }
}
