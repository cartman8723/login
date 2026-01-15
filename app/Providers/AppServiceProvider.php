<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use App\Repositories\Contracts\AppInterface;
use App\Repositories\Eloquent\AppRepository;

use OwenIt\Auditing\Models\Audit;
use App\Observers\AuditObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AppInterface::class, AppRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        URL::forceScheme('https');
        Audit::observe(AuditObserver::class);

        Gate::define('tech-permissions', function ($user) {
            $allowedEmails = [
                'alejandra.avendano@conectiacapital.com',
                'jose.lopez@conectiacapital.com',
                'edwin.andrade@conectiacapital.com',
                'robinson.cortes@conectiacapital.com',
            ];

            return in_array($user->email, $allowedEmails);
        });
    }
}
