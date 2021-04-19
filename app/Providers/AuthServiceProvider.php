<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Blog' => 'App\Policies\BlogPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::before(function ($user) {
        //     return $user->isAdmin();
        // });

        Gate::define('view-blog', function($user, $blog) {
            return $user->id === $blog->user_id;
        });

        Gate::define('view-phone', function($user, $phone) {
            return $user->id === $phone->user_id;
        });

        Gate::define('manage-phone', function($user, $phone) {
            return $user->role === 'admin';
        });
    }
}
