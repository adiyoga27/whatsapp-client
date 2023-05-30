<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isUser', function ($user) {
            if ($user->level == 'user') {
                return $user->level == 'user';
            } else {
                throw new AuthorizationException("You not allowed to access this site!", 1);
            }
        });

        Gate::define('isAdmin', function ($user) {
            if ($user->level == 'admin') {
                return $user->level == 'admin';
            } else {
                throw new AuthorizationException("You not allowed to access this site!", 1);
            }
        });

        Gate::define('isSuperadmin', function ($user) {
            if ($user->level == 'superadmin') {
                return $user->level == 'superadmin';
            } else {
                throw new AuthorizationException("You not allowed to access this site!", 1);
            }
        });
    }
}
