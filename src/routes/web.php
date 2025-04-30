<?php

use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [NewsController::class, 'index'])->name('home');

Route::get('/noticias', [NewsController::class, 'all'])->name('news.index');

Route::get('/noticias/{news}', [NewsController::class, 'show'])->name('news.show');

// Rota de admin
// Grupo protegido por autenticação e middleware 'auth'
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Gerenciamento de Notícias
    Route::resource('noticias', AdminNewsController::class);

    // Gerenciamento de Usuários (opcional - mostrar, editar e deletar usuários)
    Route::resource('usuarios', AdminUserController::class)->only(['index', 'edit', 'update', 'destroy']);
});

require __DIR__.'/auth.php';
