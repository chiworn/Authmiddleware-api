<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login' ,[AuthController::class,'login']);

Route::middleware(['auth:sanctum','role:admin'])->group(function(){
    Route::get('',function(){
        return response()->json([
            'admin' => 'welcome to admin role' 
        ]);
    });
});

Route::middleware(['auth:sanctum','role:user,admin'])->group(function(){
    Route::get('/user',function(){
        return response()->json([
            'user' => 'welcome to user role' 
        ]);
    });
});