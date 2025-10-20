<?php

use App\Http\Controllers\Api\SubscribeUsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



    Route::prefix('store')->group(function () {

        Route::post('/subscribe', [SubscribeUsController::class, 'store']);

    });
