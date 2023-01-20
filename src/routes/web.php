<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Userdetails\Loggeduser\Http\Controllers\UserDetailController;

Route::get('/test', function(){
    return "Hello from the package!";
});

// Route::get('/user', [Userdetails\Loggeduser\Http\Controllers\UserDetailController::class, 'index'])->name('user');
Route::get('/user_details', [Userdetails\Loggeduser\Http\Controllers\UserDetailController::class, 'index'])->middleware(['auth']);


// require __DIR__.'/../../../../routes/auth.php';

