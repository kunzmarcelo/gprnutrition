<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Resource;

class Role extends Model
{
  protected $fillable = ['name','role'];

    public function users(){
      return $this->hasMany(User::class);
    }

    public function resources(){
      return $this->belongsToMany(Resource::class);
    }
}
