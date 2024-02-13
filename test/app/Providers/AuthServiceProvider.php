<?php

namespace App\Providers;
use App\Policies\PublicationPolicy;
 use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Publication;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
      

	Publication::class => PublicationPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin-access', function () {
            $correctPassword = '2006'; // Przykładowe poprawne hasło lub kod

            // Odczytaj parametr query 'secret' z adresu URL
            $urlPassword = request()->query('secret');
        
            // Sprawdź, czy podane hasło lub kod z adresu URL jest poprawne
            return $urlPassword && $urlPassword === $correctPassword;
        });
    }
}
