<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Motorbike;
use App\Policies\MotorbikePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
    //    Motorbike::class => MotorbikePolicy::class
    //    'App\Models\Motorbike' => 'App\Policies\MotorbikePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
       
    }
}
