<?php

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('contact') -> group(function () {

    Route::get('index', [ContactController::class, 'index']);

});
