<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
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

Route::get('/', function () {
    return redirect('/news/all');
});

Route::get('/news/{tag}', [NewsController::class, 'index']);
Route::post('/uploadNews', [NewsController::class, 'store']);
Route::get('/editNews/{id}', [NewsController::class, 'edit']);
Route::post('/updateNews', [NewsController::class, 'update']);
Route::delete('/deleteNews', [NewsController::class, 'destroy']);
