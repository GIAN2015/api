<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí puedes registrar rutas para tu API. Estas rutas están cargadas
| automáticamente por el RouteServiceProvider dentro de un grupo que
| contiene el middleware "api". ¡Disfruta construyendo tu API!
|
*/

Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});


Route::resource('categories', CategoryController::class)->except(['create', 'edit']);
Route::resource('products', ProductController::class)->except(['create', 'edit']);
Route::resource('tags', TagController::class)->except(['create', 'edit']);
