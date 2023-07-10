<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/products',[ProductController::class, 'index']);
Route::get('/products/{id}',[ProductController::class, 'show']);
Route::delete('/products/{id}',[ProductController::class, 'destroy']);
Route::post('/products',[ProductController::class, 'store']);
Route::patch('/products/{id}',[ProductController::class, 'update']);


Route::get('/clients',[ClientController::class,'index']);
Route::get('/clients/{id}',[ClientController::class,'show']);
Route::patch('/clients/{id}',[ClientController::class,'update']);
Route::post('/clients',[ClientController::class,'store']);
Route::delete('/clients/{id}',[ClientController::class,'destroy']);



Route::get('/orders',[OrderController::class, 'index']);
Route::delete('/orders/{id}',[OrderController::class, 'destroy']);
Route::delete('/orders',[OrderController::class, 'deleteOrdersbyclient']);
Route::patch('/orders/{id}',[OrderController::class,'update']);
Route::post('/orders',[OrderController::class,'store']);
