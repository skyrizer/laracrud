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
use App\Http\Controllers\NodeConfigController;
use App\Http\Controllers\ForgotPasswordController;



Auth::routes();

Route::middleware(['HttpRequest'])->group(function () {

    // Agent Controller
    route::post('/agent', [AgentController::class, 'handlePostRequest']);

    // Container
    Route::post('storeContainers', [ContainerController::class, 'storeContainers']);

    // Public
    route::post('api/register', [AuthController::class, 'register']);
    route::post('api/login', [AuthController::class, 'login']);
    // route::post('api/forgotPassword', [ForgotPasswordController::class, 'sendResetLinkEmail']);
    Route::group(['namespace' => 'App\Http\Controllers'], function () {
        // Password Reset Routes
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::post('password/reset', 'ForgotPasswordController@reset')->name('password.update');
        Route::get('password/reset/{token}', 'ForgotPasswordController@showResetForm')->name('password.reset');
    });

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
        Route::post('addConfig', [ConfigController::class, 'store']);
        Route::delete('delConfig/{id}', [ConfigController::class, 'delete']);
        Route::put('updateConfig/{id}', [ConfigController::class, 'update']);

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
        Route::put('updatePermission/{id}', [PermissionController::class, 'update']);


        // Role Permission
        Route::post('addRolePermission', [RolePermissionController::class, 'store']);
        Route::get('rolePermissions', [RolePermissionController::class, 'index']);
        Route::delete('delRolePermission', [RolePermissionController::class, 'delete']);


        // UserRole
        Route::get('getRoles', [UserRoleController::class, 'index']);
        Route::post('addRole', [UserRoleController::class, 'store']);
        Route::put('updateRole/{id}', [UserRoleController::class, 'update']);



        // Node Access
        Route::post('addNodeAccess', [NodeAccessController::class, 'create']);
        Route::get('getNodeAccess', [NodeAccessController::class, 'index']);
        Route::put('updateNodeAccess/{id}', [NodeAccessController::class, 'update']);
        Route::delete('deleteNodeAccess/{nodeId}/{userId}/{roleId}', [NodeAccessController::class, 'delete']);
        Route::get('getNodeAccess/{nodeId}', [NodeAccessController::class, 'getByNodeId']);



        // HttpResponse
        Route::get('getHttpResponses', [HttpResponseController::class, 'index']);
        Route::post('searchByCode', [HttpResponseController::class, 'searchByCode']);
        Route::post('searchByCode', [HttpResponseController::class, 'searchByCode']);
        Route::post('searchByDate', [HttpResponseController::class, 'searchByDate']);




        // Node Config
        Route::get('getNodeConfigs', [NodeConfigController::class, 'index']);
        Route::post('addNodeConfig', [NodeConfigController::class, 'create']);
        Route::get('getNodeConfig/{nodeId}', [NodeConfigController::class, 'getByNodeId']);
        Route::delete('deleteNodeConfig/{nodeId}/{configId}', [NodeConfigController::class, 'delete']);







    });



});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
