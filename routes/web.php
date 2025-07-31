<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Dashboard\Equipments\DashboardEquipmentsController;
use App\Http\Controllers\Frontend\Home\FrontendHomeController;
use App\Http\Controllers\Dashboard\Home\DashboardHomeController;
use App\Http\Controllers\Dashboard\Posts\DashboardPostsController;
use App\Http\Controllers\Dashboard\Quotes\DashboardQuotesController;
use App\Http\Controllers\Dashboard\Inquiry\DashboardInquiryController;
use App\Http\Controllers\Dashboard\Projects\DashboardProjectsController;
use App\Http\Controllers\Dashboard\Services\DashboardServicesController;
use App\Http\Controllers\Dashboard\Users\UsersController;
use App\Http\Controllers\Frontend\Home\CommentController;
use App\Http\Middleware\Auth\AuthMiddleware;

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
                Route::get('/blog/show/{post}', 'showPost')->name('showPost');
                Route::get('/team', 'teams')->name('teams');
                Route::get('/testimonial', 'testimonial')->name('testimonial');
                Route::get('/features', 'features')->name('features');
                Route::get('/gallery', 'gallery')->name('gallery');
                Route::get('/equipments/{condition}', 'equipments')->name('equipments');
                Route::get('/equipment/show/{equipment}', 'showEquiment')->name('showEquiment');
                Route::get('/services/show/{service}', 'showService')->name('showService');
                Route::post('/store-inquiries', 'storeInquiries')->name('storeInquiries');
                Route::post('/users/store-vistor', 'registerVistor')->name('registerVistor');
            });

        //post comment
        Route::controller(CommentController::class)
            ->group(function () {

                Route::post('/posts/{post}/comments', 'store')->name('comments.store');

                Route::delete('/comments/{comment}', 'destroy')->name('comments.destroy');
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

Route::prefix('/dashboard')
    ->name('dashboard.')
    ->middleware([AuthMiddleware::class])
    ->group(function () {

        //auth
        Route::controller(AuthController::class)
            ->name('auth.')
            ->prefix('/login')
            ->withoutMiddleware([AuthMiddleware::class])
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/auth/login', 'login')->name('login');
                Route::get('/auth/logout', 'logout')->name('logout');
                Route::post('/auth/account-recovery/find-account', 'findAccount')->name('recovery.find_account');
                Route::post('/auth/account-recovery-update', 'update')->name('update');

                // account recovery
                Route::post('/api/forgot-password-init',  'sendCode')->name('sendCode');
                Route::post('/api/verify-otp', 'verifyCode')->name('verifyCode');
            });

        //admin
        Route::controller(DashboardHomeController::class)
            ->name('admin.')
            ->prefix('/dashboard/home')
            ->group(function () {
                Route::post('/profile/update', 'updateProfile')->name('updateProfile');
                Route::get('/settings', 'settings')->name('settings');
            });

        //projects
        Route::controller(DashboardProjectsController::class)
            ->name('projects.')
            ->prefix('/projects')
            ->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::put('/update/{project}', 'update')->name('update');
                Route::get('/edit/{project}', 'edit')->name('edit');
                Route::get('/show/{project}', 'show')->name('show');
                Route::delete('/delete/{project}', 'destroy')->name('destroy');
            });

        //quotes
        Route::controller(DashboardQuotesController::class)
            ->name('quotes.')
            ->prefix('/quotes')
            ->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
            });

        //services
        Route::controller(DashboardServicesController::class)
            ->name('services.')
            ->prefix('/services')
            ->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::put('/update/{service}', 'update')->name('update');
                Route::get('/edit/{service}', 'edit')->name('edit');
                Route::get('/show/{service}', 'show')->name('show');
                Route::delete('/delete/{service}', 'destroy')->name('destroy');
            });
        //services
        Route::controller(DashboardEquipmentsController::class)
            ->name('equipments.')
            ->prefix('/equipments')
            ->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::put('/update/{equipment}', 'update')->name('update');
                Route::get('/edit/{equipment}', 'edit')->name('edit');
                Route::get('/show/{equipment}', 'show')->name('show');
                Route::delete('/delete/{equipment}', 'destroy')->name('destroy');
            });
        //posts
        Route::controller(DashboardPostsController::class)
            ->name('posts.')
            ->prefix('/posts')
            ->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::put('/update/{post}', 'update')->name('update');
                Route::get('/edit/{post}', 'edit')->name('edit');
                Route::get('/show/{post}', 'show')->name('show');
                Route::delete('/delete/{post}', 'destroy')->name('destroy');
            });

        //inquiry
        Route::controller(DashboardInquiryController::class)
            ->name('inquiry.')
            ->prefix('/inquiry')
            ->group(function () {
                Route::get('/index', 'index')->name('index');
            });

        //inquiry
        Route::controller(UsersController::class)
            ->name('users.')
            ->prefix('/users')
            ->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::put('/update/{user}', 'update')->name('update');
                Route::get('/edit/{user}', 'edit')->name('edit');
                Route::get('/show/{user}', 'show')->name('show');
                Route::delete('/delete/{user}', 'destroy')->name('destroy');
            });
    });
