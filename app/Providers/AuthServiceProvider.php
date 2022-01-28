<?php

namespace App\Providers;

use App\Permission;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $resources = \App\Resource::all();




        foreach ($resources as $resource) {
  // print($resource->roles->contains($user->role));
          Gate::define($resource->resource, function(User $user) use ($resource){

            return $resource->roles->contains($user->role);
          });
        }

        //dd(Gate::abilities());


    }
}
