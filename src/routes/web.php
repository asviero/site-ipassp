<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminUserController;


// Página inicial
Route::get('/', [NewsController::class, 'index'])->name('home');

// Rota de busca
Route::get('/noticias/busca', [NewsController::class, 'search'])->name('news.search');

// Notícias
Route::prefix('noticias')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'all'])->name('index');
    Route::get('/{news}', [NewsController::class, 'show'])->name('show');
});

// Rotas administrativas
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Administrativo
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // CRUD de Notícias
    Route::resource('noticias', AdminNewsController::class);

    // Gerenciamento básico de usuários
    Route::resource('usuarios', AdminUserController::class)->only(['index', 'edit', 'update', 'destroy']);
});

// Botões Header
Route::view('/institucional', 'institucional')->name('institucional');
Route::View('/segurados', 'segurados')->name('segurados');
Route::View('/dependentes', 'dependentes')->name('dependendetes');
Route::View('/servidores', 'servidores')->name('servidores');
Route::View('/legislacao', 'legislacao')->name('legislacao');

// Autenticação (Laravel Breeze, Fortify, etc.)
require __DIR__ . '/auth.php';
