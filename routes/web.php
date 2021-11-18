<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscoveryController;
use App\Http\Controllers\ViewController;

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

Route::get('/', [ViewController::class, 'EnvironmentsView']);

Route::prefix('environments')->group(function () {
    Route::get('view',    [DiscoveryController::class, 'EnvironmentsView'])->name('view.environments');
    Route::post('create', [DiscoveryController::class, 'EnvironmentsCreate'])->name('environments.create');
    Route::get('list',    [DiscoveryController::class, 'EnvironmentsList'])->name('environments.list');
});

Route::prefix('environment')->group(function () {
    Route::post('view',   [ViewController::class,      'EnvironmentView'])->name('view.environment');
    Route::post('status', [DiscoveryController::class, 'EnvironmentStatus'])->name('environment.status');
    Route::post('update', [DiscoveryController::class, 'EnvironmentUpdate'])->name('environment.update');
    Route::get('delete',  [DiscoveryController::class, 'EnvironmentDelete'])->name('environment.delete');/*Not tested*/
    Route::post('fields', [DiscoveryController::class, 'EnvironmentFields'])->name('environment.fields');

    // Configurations
    Route::prefix('configurations')->group(function () {
        Route::post('view',     [ViewController::class,  'ConfigurationsView'])->name('view.configurations');
        /*To do: config/create*/
        Route::post('list',     [DiscoveryController::class, 'ConfigurationsList'])->name('configurations.list');
        Route::post('details',  [DiscoveryController::class, 'ConfigurationsDetail'])->name('configurations.detail');
        /*To do: config/update*/
        /*To do: config/delete*/
    });
});

Route::prefix('collections')->group(function () {
    Route::post('view',   [ViewController::class,      'CollectionsView'])->name('view.collections');
    Route::post('create', [DiscoveryController::class, 'CollectionsCreate'])->name('collections.create');
    Route::post('list',   [DiscoveryController::class, 'CollectionsList'])->name('collections.list');

    Route::prefix('queries')->group(function () {
        /*To do: query multiple collections (get)*/
        /*To do: query multiple collections (post)*/
        /*To do: query multiple collections system notices (get)*/
    });
});

Route::prefix('collection')->group(function () {
    Route::post('view',   [ViewController::class,      'CollectionView'])->name('view.collection');
    Route::post('details',[DiscoveryController::class, 'CollectionDetails'])->name('collection.details');
    Route::post('fields', [DiscoveryController::class, 'CollectionFields'])->name('collection.fields');
    Route::post('update', [DiscoveryController::class, 'CollectionUpdate'])->name('collection.update');
    Route::post('delete', [DiscoveryController::class, 'CollectionDelete'])->name('collection.delete');

    // Documents
    Route::prefix('documents')->group(function () {
        Route::post('view',     [ViewController::class,       'DocumentsView'])->name('view.documents');
        Route::post('upload',   [DiscoveryController::class,  'DocumentsUpload'])->name('documents.upload');
        Route::post('details',  [DiscoveryController::class,  'DocumentsDetails'])->name('documents.details');
        Route::post('update',   [DiscoveryController::class,  'DocumentsUpdate'])->name('documents.update');
        Route::post('delete',   [DiscoveryController::class,  'DocumentsDelete'])->name('documents.delete');
    });

    // Queries
    Route::prefix('queries')->group(function () {
        Route::post('view',     [ViewController::class,       'QueriesView'])->name('view.queries');
        Route::post('short',    [DiscoveryController::class,  'QueriesShort'])->name('queries.short');
        Route::post('long',     [DiscoveryController::class,  'QueriesLong'])->name('queries.long');
        /*To do: query system notices (get)*/
        /*To do: query autocomplete suggestions (get)*/
    });
});

// Other
    /*To do: get expansion list*/
    /*To do: create or update an expansion list*/
    /*To do: delete an expansion list*/
    /*To do: get tokenization dictionary status*/
    /*To do: create tokenization dictionary*/
    /*To do: delete tokenization dictionary*/
    /*To do: get stopword list status*/
    /*To do: create stopword list*/
    /*To do: delete a custom stopword list*/
    /*To do: list training data*/
    /*To do: add query to training data*/
    /*To do: delete all training data*/
    /*To do: get details about a training data query*/
    /*To do: delete a training data query*/
    /*To do: list examples for a training data query*/
    /*To do: add examples to training data query*/
    /*To do: delete examples for training data query*/
    /*To do: change label or cross reference for example*/
    /*To do: Get details for training data example*/
    /*To do: Delete labeled data*/
    /*To do: Create event*/
    /*To do: Search the query and event log*/
    /*To do: Number of queries over time*/
    /*To do: Number of queries with an event over time*/
    /*To do: Number of queries with no search results over time*/
    /*To do: Percentage of queries with an associated even*/
    /*To do: Most frequent query tokens with an event*/
    /*To do: List credentials*/
    /*To do: Create credentials*/
    /*To do: View Credentials*/
    /*To do: Update credentials*/
    /*To do: Delete credentials*/
    /*To do: List Gateways*/
    /*To do: Create Gateway*/
    /*To do: List Gateway Details*/
    /*To do: Delete Gateway*/
