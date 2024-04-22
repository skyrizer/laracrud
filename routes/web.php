<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\NodeController;
use App\Http\Controllers\ContainerController;



// Home Controller
Route::get('/',[HomeController::class, 'index']);
route::post('/add_product', [HomeController::class, 'add_product']);
route::get('show_product', [HomeController::class, 'show_product']);
route::get('delete_product/{id}', [HomeController::class, 'delete_product']);
route::get('update_product/{id}', [HomeController::class, 'update_product']);
route::post('edit_product/{id}', [HomeController::class, 'edit_product']);

// Agent Controller
route::post('/agent', [AgentController::class, 'handlePostRequest']);
// Container
Route::post('getContainers', [ContainerController::class, 'getContainers']);

// Public
route::post('api/register', [AuthController::class, 'register']);
route::post('api/login', [AuthController::class, 'login']);

// Protected routes
Route::prefix('api')->middleware(['auth:sanctum'])->group(function() {

    // User
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('user', [AuthController::class, 'user']);


    // Node
    Route::post('addNode', [NodeController::class, 'create']);

    




});