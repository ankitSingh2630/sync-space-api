<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use App\Models\CustomPersonalAccessToken; // Import your custom model

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Use the custom PersonalAccessToken model
        Sanctum::usePersonalAccessTokenModel(CustomPersonalAccessToken::class);
    }
}


