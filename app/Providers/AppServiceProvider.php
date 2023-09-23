<?php

namespace App\Providers;

use App\Models\User;
use App\Services\MailchimpNewsletters;
use App\Services\Newsletters;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        App()->bind(Newsletters::class, function () {
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us21'
            ]);
            return new MailchimpNewsletters($client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    { 
        Model::unguard();
        FacadesGate::define('admin', function (User $user) {
            return $user->username === 'Pual Phonix';
        });
    }
}
