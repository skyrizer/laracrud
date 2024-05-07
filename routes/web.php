<?php

use App\Http\Controllers\NodeAccessController;
use App\Http\Controllers\PerformanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\NodeController;
use App\Http\Controllers\ContainerController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\HttpResponseController;


Route::middleware(['HttpRequest'])->group(function () {

    // Agent Controller
    route::post('/agent', [AgentController::class, 'handlePostRequest']);

    // Container
    Route::post('storeContainers', [ContainerController::class, 'storeContainers']);

    // Public
    route::post('api/register', [AuthController::class, 'register']);
    route::post('api/login', [AuthController::class, 'login']);

    // Refresh Token
// Route::put('api/refreshToken', [AuthController::class, 'refreshToken'])->name('refresh.token');


    // Protected routes
    Route::prefix('api')->middleware(['auth:sanctum'])->group(function () {

        // Refresh Token
        Route::put('refreshToken', [AuthController::class, 'refreshToken'])->name('refresh.token');

        // User
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);


        // Node
        Route::post('addNode', [NodeController::class, 'create']);
        Route::get('getNodes', [NodeController::class, 'index']);
        Route::delete('deleteNode/{id}', [NodeController::class, 'delete']);


        // Config
        Route::get('getConfigs', [ConfigController::class, 'index']);


        // Container
        Route::get('getContainers', [ContainerController::class, 'index']);
        Route::put('updateContainer/{id}', [ContainerController::class, 'updateLimits']);
        Route::get('getOneContainer/{id}', [ContainerController::class, 'show']);



        // Container performance
        Route::get('containerPerformance', [PerformanceController::class, 'performance']);
        Route::post('allPerformance', [PerformanceController::class, 'performanceForAllContainers']);

        // Permission
        Route::get('getPermissions', [PermissionController::class, 'index']);
        Route::post('addPermission', [PermissionController::class, 'store']);

        // Role Permission
        Route::post('addRolePermission', [RolePermissionController::class, 'store']);

        // UserRole
        Route::get('getRoles', [UserRoleController::class, 'index']);
        Route::post('addRole', [UserRoleController::class, 'store']);

        // Node Access
        Route::post('addNodeAccess', [NodeAccessController::class, 'create']);

        // HttpResponse
        Route::get('getHttpResponses', [HttpResponseController::class, 'index']);



    });



});


