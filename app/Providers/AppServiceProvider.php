<?php

namespace App\Providers;


use App\Service\FileUpload;
use App\Service\SMSService;
use App\Service\FileUploadInterface;
use App\Service\NotificationService;
use App\Service\SMSServiceInterface;
use Illuminate\Support\ServiceProvider;
use App\Service\NotificationServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SMSServiceInterface::class, SMSService::class);
        $this->app->bind(FileUploadInterface::class, FileUpload::class);
        $this->app->bind(NotificationServiceInterface::class, NotificationService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
