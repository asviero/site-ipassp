<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PublicNoticeController;
use App\Http\Controllers\CategoryController;




Route::get('/', [SliderController::class, 'show'])->name('home');
Route::get('/noticia/{slider}', [SliderController::class, 'detail'])->name('detail');

// Rota de busca
Route::get('/noticias/busca', [NewsController::class, 'search'])->name('news.search');

// Notícias
Route::prefix('noticias')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'all'])->name('index');
    Route::get('/{news}', [NewsController::class, 'show'])->name('show');
});

Route::resource('slider', SliderController::class);


// Rota de admin
// Grupo protegido por autenticação e middleware 'auth'
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Administrativo
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // CRUD de Notícias
    Route::resource('noticias', AdminNewsController::class);

    Route::resource('slider', SliderController::class)->only(['index','create', 'edit', 'store', 'destroy', 'update']);

    Route::resource('editais', PublicNoticeController::class)->only(['index','create', 'edit', 'store', 'destroy', 'update']);

    Route::resource('categorias', CategoryController::class)->only(['index','create', 'edit', 'store', 'destroy', 'update']);

    // Gerenciamento de Usuários (opcional - mostrar, editar e deletar usuários)
    Route::resource('usuarios', AdminUserController::class)->only(['index', 'edit', 'update', 'destroy']);
});

// Botões Header
Route::view('/institucional', 'institucional')->name('institucional');
Route::View('/segurados', 'segurados')->name('segurados');
Route::View('/dependentes', 'dependentes')->name('dependendetes');
Route::View('/servidores', 'servidores')->name('servidores');
Route::View('/legislacao', 'legislacao')->name('legislacao');

// Editais
Route::view('/editais', 'editais')->name('editais');
Route::view('/editais/processo_seletivo_estagio', 'editais-estagio')->name('editais-estagio');
Route::view('/editais/concurso_publico', 'editais-concurso')->name('editais-concurso');

// Autenticação (Laravel Breeze, Fortify, etc.)
require __DIR__ . '/auth.php';
