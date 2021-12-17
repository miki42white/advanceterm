<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\MypageController;

Route::get('/',[ShopController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';

Route::get('/favorite',[FavoriteController::class,'favorite']);
Route::get('/detail/{id}',[ShopController::class,'showdetail']);

Route::post('/done',[ReserveController::class,'create']);
Route::get('/done',[ReserveController::class,'show']);

Route::get('/mypage',[MypageController::class,'show']);
Route::post('/mypage/delete',[MypageController::class,'delete']);

Route::post('/search',[ShopController::class,'search']);


