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

Route::get('/news/{tag}', [NewsController::class, 'getNews']);
Route::post('/uploadNews', [NewsController::class, 'uploadNews']);
Route::get('/editNews/{id}', [NewsController::class, 'editNews']);
Route::post('/updateNews', [NewsController::class, 'updateNews']);
Route::delete('/deleteNews', [NewsController::class, 'deleteNews']);