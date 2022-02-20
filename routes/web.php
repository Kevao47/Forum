<?php

use App\Http\Controllers\DiscussaoController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');


    Route::get('/', [DiscussaoController::class, 'home'])->name('home');

    Route::get('/discussao', [DiscussaoController::class, 'discussao'])->name('discussao');
    Route::get('/discussao/{id}', [DiscussaoController::class, 'show'])->name('show-discussao');
    Route::post('/comentar/{id}', [DiscussaoController::class, 'comentar'])->name('comentar');

    Route::view('/conta', 'perfil')->name('perfil');
    
    Route::get('/publicar', [DiscussaoController::class, 'create'])->name('publicar');
    Route::post('/publicar', [DiscussaoController::class, 'store']);

    Route::post('/conta', [UsuariosController::class, 'update']);
    
    Route::post('/upload', [UsuariosController::class, 'updateProfilePic'])->name('upload');

    Route::get('/delete', [UsuariosController::class, 'destroy'])->name('delete-account');
});

Route::view('/cadastro', 'criar-conta')->name('criar-conta');
Route::post('/cadastro', [UsuariosController::class, 'insert']);

Route::view('/login', 'login')->name('login');
Route::post('/login', [UsuariosController::class, 'login'])->name('login');


// Route::get('produtos', [ProdutosController::class, 'index'])->name('produtos');

// Route::get('/produtos/inserir', [ProdutosController::class, 'create'])->name('produtos.inserir');

// Route::post('/produtos/inserir', [ProdutosController::class, 'insert'])->name('produtos.gravar');

// Route::get('/produtos/{prod}', [ProdutosController::class, 'show'])->name('produtos.show');

// Route::get('/produtos/{prod}/editar', [ProdutosController::class, 'edit'])->name('produtos.edit');

// Route::put('/produtos/{prod}/editar', [ProdutosController::class, 'update'])->name('produtos.update');

// Route::get('/produtos/{prod}/apagar', [ProdutosController::class, 'remove'])->name('produtos.remove');

// Route::delete('/produtos/{prod}/apagar', [ProdutosController::class, 'delete'])->name('produtos.delete');

// Route::get('usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');

// Route::prefix('usuarios')->group(function() {
    
//     Route::get('/inserir', [UsuariosController::class, 'create'])->name('usuarios.inserir');
//     Route::post('/inserir', [UsuariosController::class, 'insert'])->name('usuarios.gravar');

// });

// Route::get('/login', [UsuariosController::class, 'login'])->name('login');
// Route::post('/login', [UsuariosController::class, 'login']);

// Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');
