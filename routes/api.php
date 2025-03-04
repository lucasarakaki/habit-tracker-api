<?php

declare(strict_types = 1);

use App\Http\Controllers\Api\V1\HabitController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->name('api.v1.')->group(function(): void {
    Route::get('/habits', [HabitController::class, 'index'])
        ->name('habits.index');
    Route::get('/habits/{habit:uuid}', [HabitController::class, 'show'])
        ->name('habits.show');
    Route::get('/users', [UserController::class, 'index'])
        ->name('users.index');
    Route::get('/users/{user:uuid}', [UserController::class, 'show'])
        ->name('users.show');
    Route::post('/habits', [HabitController::class, 'store'])
        ->name('habits.store');
    Route::post('/users', [UserController::class, 'store'])
        ->name('users.store');
    Route::put('/habits/{habit:uuid}', [HabitController::class, 'update'])
        ->name('habit.update');
});
