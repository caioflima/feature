<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DadosUsuarioController;

Route::get('/', [DadosUsuarioController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });
