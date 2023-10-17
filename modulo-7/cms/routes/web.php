<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('plantilla');
});

Route::view('/','paginas.blog');
Route::view('/administradores', 'paginas.administradores');
Route::view('/categorias', 'paginas.categorias');
Route::view('/articulos', 'paginas.articulos');
Route::view('/opiniones', 'paginas.opiniones');
Route::view('/banner', 'paginas.banner');
Route::view('/anuncios', 'paginas.anuncios');



 Route::get('/', 'BlogController@traerBlog');
 Route::get('/administradores', 'AdministradoresController@traerAdministradores');
 Route::get('/categorias', 'CategoriasController@traerCategorias');
 Route::get('/articulos', 'ArticulosController@traerArticulos');
 Route::get('/opiniones', 'OpinionesController@traerOpiniones');
 Route::get('/banner', 'BannerController@traerBanner');
 Route::get('/anuncios', 'AnunciosController@traerAnuncios');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
