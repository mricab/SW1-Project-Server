<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DiscoveryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// AuthController Routes (public)
Route::group(['middleware' => ['cors', 'json.response']], function ()
{
    /** AuthController Routes **/

    Route::post('/login', [AuthController::class, 'login'])->name('login.api');
    Route::post('/register', [AuthController::class, 'register'])->name('register.api');
});

// AuthController Routes (protected)
Route::middleware(['auth:api'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.api');

});

// ApplicationController Routes (protected)
Route::middleware(['auth:api'])->group(function () {
    // Folders
    Route::prefix('folders')->group(function () {
        Route::post('create', [ApplicationController::class, 'CreateUserCollection']);
    });
});










// DiscoveryController Routes (protected)
Route::middleware(['auth:api'])->group(function () {

    // Environments
    Route::prefix('environments')->group(function () {

        // Environments
        Route::post('create', [DiscoveryController::class, 'EnvironmentsCreate'])->name('environments.create');/*Not tested*/
        Route::get('list',    [DiscoveryController::class, 'EnvironmentsList'])->name('environments.list');
    });

    // Environment
    Route::prefix('environment')->group(function () {

        // Environment
        Route::post('status', [DiscoveryController::class, 'EnvironmentStatus'])->name('environment.status');
        Route::post('update', [DiscoveryController::class, 'EnvironmentUpdate'])->name('environment.update');
        Route::get('delete',  [DiscoveryController::class, 'EnvironmentDelete'])->name('environment.delete');/*Not tested*/
        Route::post('fields', [DiscoveryController::class, 'EnvironmentFields'])->name('environment.fields');

        // Configurations
        Route::prefix('configurations')->group(function () {
            Route::post('create',   [DiscoveryController::class, 'ConfigurationsCreate'])->name('configurations.create');/*Not implemented*/
            Route::post('list',     [DiscoveryController::class, 'ConfigurationsList'])->name('configurations.list');
        });

        // Configuration
        Route::prefix('configuration')->group(function () {
            Route::post('details',  [DiscoveryController::class, 'ConfigurationDetails'])->name('configuration.details');
            Route::post('update',   [DiscoveryController::class, 'ConfigurationUpdate'])->name('configuration.update');/*Not implemented*/
            Route::post('delete',   [DiscoveryController::class, 'ConfigurationDelete'])->name('configuration.delete');/*Not tested*/
        });
    });

    // Collections
    Route::prefix('collections')->group(function () {

        // Collections
        Route::post('create', [DiscoveryController::class, 'CollectionsCreate'])->name('collections.create');
        Route::post('list',   [DiscoveryController::class, 'CollectionsList'])->name('collections.list');

        // Queries
        Route::prefix('queries')->group(function () {
            Route::post('shorts',   [DiscoveryController::class, 'CollectionsQueryShort'])->name('collections.queries.short');/*Not tested*/
            Route::post('long',     [DiscoveryController::class, 'CollectionsQueryLong'])->name('collections.queries.long');/*Not tested*/
            Route::post('notices',  [DiscoveryController::class, 'CollectionsNotices'])->name('collections.queries.notices');/*Not tested*/
        });
    });

    //Collection
    Route::prefix('collection')->group(function () {

        // Collection
        Route::post('details',[DiscoveryController::class, 'CollectionDetails'])->name('collection.details');
        Route::post('fields', [DiscoveryController::class, 'CollectionFields'])->name('collection.fields');
        Route::post('update', [DiscoveryController::class, 'CollectionUpdate'])->name('collection.update');
        Route::post('delete', [DiscoveryController::class, 'CollectionDelete'])->name('collection.delete');

        // Documents
        Route::prefix('documents')->group(function () {
            Route::post('upload',   [DiscoveryController::class,  'DocumentsUpload'])->name('documents.upload');
            Route::post('details',  [DiscoveryController::class,  'DocumentsDetails'])->name('documents.details');
            Route::post('update',   [DiscoveryController::class,  'DocumentsUpdate'])->name('documents.update');
            Route::post('delete',   [DiscoveryController::class,  'DocumentsDelete'])->name('documents.delete');
        });

        // Queries
        Route::prefix('queries')->group(function () {
            Route::post('short',    [DiscoveryController::class,  'CollectionQueryShort'])->name('collection.queries.short');
            Route::post('long',     [DiscoveryController::class,  'CollectionQueryLong'])->name('collection.queries.long');
            Route::post('notices',  [DiscoveryController::class,  'CollectionNotices'])->name('collection.queries.notices');/*Not tested*/
        });
    });
});




