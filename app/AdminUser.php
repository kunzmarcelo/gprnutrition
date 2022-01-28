<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table = 'admin_users';
    public $timestamps = false;
    protected $fillable =[
      'admin_id',
      'user_id'
    ];

    public function adminUser(){
      return $this->belongsTo(User::class,'user_id');
    }
}
