<?php

namespace App\Providers;
use App\Models\role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Gate::define('isAdmin',function(User $user){
            return $user->getrole()->where('Role','Assioner')->exists();
        });
        Gate::define('isUser',function(User $user){
            return $user->getrole()->where('Role','Assignee')->exists();
        });
            

    }
    
}
