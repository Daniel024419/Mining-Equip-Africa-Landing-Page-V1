<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Frontend\Home\FrontendHomeController;
use App\Http\Controllers\Dashboard\Home\DashboardHomeController;
use App\Http\Controllers\Dashboard\Posts\DashboardPostsController;
use App\Http\Controllers\Dashboard\Quotes\DashboardQuotesController;
use App\Http\Controllers\Dashboard\Inquiry\DashboardInquiryController;
use App\Http\Controllers\Dashboard\Projects\DashboardProjectsController;
use App\Http\Controllers\Dashboard\Services\DashboardServicesController;

//home
Route::prefix('/')
    ->name('frontend.')
    ->group(function () {
        Route::controller(FrontendHomeController::class)
            ->name('home.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/about', 'about')->name('about');
                Route::get('/contacts', 'contacts')->name('contacts');
                Route::get('/services', 'services')->name('services');
                Route::get('/projects', 'projects')->name('projects');
                Route::get('/quotes', 'quotes')->name('quotes');
                Route::get('/blog', 'blog')->name('blog');
                Route::get('/team', 'teams')->name('teams');
                Route::get('/testimonial', 'testimonial')->name('testimonial');
                Route::get('/features', 'features')->name('features');
                Route::get('/gallery', 'gallery')->name('gallery');
                Route::get('/equipments/{condition}', 'equipments')->name('equipments');
                Route::get('/equipment/show/{equipment}', 'showEquiment')->name('showEquiment');
                Route::get('/services/show/{service}', 'showService')->name('showService');
                Route::post('/store-inquiries', 'storeInquiries')->name('storeInquiries');
            });
    });

//google auth
Route::controller(GoogleController::class)
    ->group(function () {
        Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
        Route::get('auth/google/callback', 'handleGoogleCallback');
    });

//account recovery
Route::controller(ForgotPasswordController::class)
    ->name('auth.')
    ->group(function () {
        Route::get('/auth/account-recovery/update-account', 'recoverAccount')->name('recoverAccount');
        Route::post('/auth/account-recovery-update', 'resetPassword')->name('resetPassword');

        // account recovery
        Route::post('/api/forgot-password-init',  'sendCode')->name('sendCode');
        Route::post('/api/verify-otp', 'verifyCode')->name('verifyCode');
    });

Route::prefix('/admin')
    ->name('dashboard.')
    ->group(function () {

        //auth
        Route::controller(AuthController::class)
            ->name('auth.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/auth/login', 'login')->name('login');
                Route::post('/auth/logout', 'logout')->name('logout');
                Route::post('/auth/account-recovery/find-account', 'findAccount')->name('recovery.find_account');
                Route::post('/auth/account-recovery-update', 'update')->name('update');

                // account recovery
                Route::post('/api/forgot-password-init',  'sendCode')->name('sendCode');
                Route::post('/api/verify-otp', 'verifyCode')->name('verifyCode');
            });

        //admin
        Route::controller(DashboardHomeController::class)
            ->name('admin.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/profile', 'profile')->name('profile');
            });

        //projects
        Route::controller(DashboardProjectsController::class)
            ->name('projects.')
            ->group(function () {
                Route::get('home/', 'home')->name('home');
            });

        //quotes
        Route::controller(DashboardQuotesController::class)
            ->name('quotes.')
            ->group(function () {
                Route::get('index/', 'index')->name('index');
            });

        //services
        Route::controller(DashboardServicesController::class)
            ->name('services.')
            ->group(function () {
                Route::get('/index', 'index')->name('index');
            });

        //posts
        Route::controller(DashboardPostsController::class)
            ->name('posts.')
            ->group(function () {
                Route::get('/index', 'index')->name('index');
            });

        //inquiry
        Route::controller(DashboardInquiryController::class)
            ->name('inquiry.')
            ->group(function () {
                Route::get('/index', 'index')->name('index');
            });
    });
