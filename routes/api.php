<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\SearchController;

Route::post('v1//equipment/search', [SearchController::class, 'search'])->name('api.search');
