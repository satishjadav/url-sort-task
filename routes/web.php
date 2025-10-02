<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [WebController::class,'SortUrl'])->name('sort-url');
Route::post('sort-url-convert', [WebController::class,'SortUrlConvert'])->name('sort-url-convert');
Route::get('sort-url-success', [WebController::class,'SortUrlSuccess'])->name('sort-url-success');
Route::get('url/{id}', [WebController::class,'HitNewUrl'])->name('url');

Route::get('add-user', [WebController::class,'AddUser'])->name('add-user');
Route::post('register-save', [WebController::class,'RegisterUser'])->name('register-save');
Route::get('login', [WebController::class,'LoginUser'])->name('login');

Route::get('auth-check', function(){
    dd( Auth::guard('admin'));
});


Route::middleware(['admin'])->group(function(){
    Route::get('dashboard',[WebController::class,'Dashboard'])->name('admin.dashboard');
    Route::get('update-url/{id}',[WebController::class,'UpdateOldUrl'])->name('admin.update-url');
    Route::post('update-old-url/{id}',[WebController::class,'UpdateOldUrlSave'])->name('admin.update-url-save');
    Route::get('delete-url/{id}',[WebController::class,'OldUrlDelete'])->name('admin.delete-url');
    Route::get('status-update/{id}',[WebController::class,'StatusUpdateUrl'])->name('admin.status-update');
});
