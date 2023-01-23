<?php

use Illuminate\Support\Facades\Route;

// Chamada para usar o DadosUsuarioController

use App\Http\Controllers\DadosUsuarioController;

// Rota criada para a manipulação de Dados fornecido pela View

Route::get('/', [DadosUsuarioController::class, 'index']);

