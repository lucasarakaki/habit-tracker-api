<?php

declare(strict_types = 1);

use App\Http\Controllers\Api\V1\HabitController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->name('api.v1.')->group(function(): void {
    Route::apiResource('habits', HabitController::class)->scoped(['habit' => 'uuid']);
    Route::apiResource('users', UserController::class)->scoped(['user' => 'uuid']);
});
