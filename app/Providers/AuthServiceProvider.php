<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
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

          //authorizations on users creation
          Gate::define('clerk', function (User $user) {
            return  $user->role_id ===1;
        });
        Gate::define('operate-users', function (User $user) {
            return  $user->role_id ===2;
        });

        //authorizations on share
        Gate::define('see-shares', function (User $user) {
            return  $user->role_id ===2 || $user->role_id===1 || $user->role_id===3 ;
        });
        Gate::define('operate-shares', function (User $user) {
            return  $user->role_id ===2;
        });

        //authorizations on loan
        Gate::define('see-loans', function (User $user) {
            return  $user->role_id ===2 || $user->role_id===1 || $user->role_id===3 ;
        });
        Gate::define('operate-loans', function (User $user) {
            return  $user->role_id ===2;
        });


        Gate::define('loan-types', function (User $user) {
            return  $user->role_id ===2 ;
        });
    }
}
