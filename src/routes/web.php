<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Loggeduser\Http\Controllers\UserDetailController;

Route::get('/test', function(){
    return "Hello from the package!";
});

// Route::get('/user', [Laravel\Loggeduser\Http\Controllers\UserDetailController::class, 'index'])->name('user');
Route::get('/user_details', [Laravel\Loggeduser\Http\Controllers\UserDetailController::class, 'index']);


// require __DIR__.'/../../../../routes/auth.php';

