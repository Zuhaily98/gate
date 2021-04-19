<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Blog' => 'App\Policies\BlogPolicy',
        'App\Models\Phone' => 'App\Policies\PhonePolicy',
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

        Gate::define('manage-blog', function($user, $blog) {
            return $user->role === 'admin';
        });

        Gate::define('update-blog', function($user, $blog) {
            return $user->id === $blog->user_id
                ? Response::allow()
                : Response::deny('You must be an administrator.');
        });

        Gate::define('delete-blog', function($user, $blog) {
            return $user->id === $blog->user_id;
        });

        Gate::define('view-phone', function($user, $phone) {
            return $user->id === $phone->user_id;
        });

        Gate::define('manage-phone', function($user, $phone) {
            return $user->role === 'admin';
        });

        Gate::define('update-phone', function($user, $phone) {
            return $user->id === $phone->user_id    
                ? Response::allow()
                : Response::deny('You must be an administrator.');
            
        });
        
        Gate::define('admin-tab', function($user) {
            return $user->role === 'admin';
        });

        

    }
}
