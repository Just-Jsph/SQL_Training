<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\DatasetImportController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SqlController;
use App\Http\Controllers\PlaygroundController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [
        DashboardController::class,
        'index'
    ])->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [
        ProfileController::class,
        'edit'
    ])->name('profile.edit');

    Route::patch('/profile', [
        ProfileController::class,
        'update'
    ])->name('profile.update');

    Route::delete('/profile', [
        ProfileController::class,
        'destroy'
    ])->name('profile.destroy');


    /*
    |--------------------------------------------------------------------------
    | Datasets
    |--------------------------------------------------------------------------
    */

    Route::get('/datasets', [
        DatasetController::class,
        'index'
    ])->name('datasets.index');

    Route::get('/datasets/import', [
        DatasetImportController::class,
        'create'
    ])->name('datasets.import');

    Route::post('/datasets/import', [
        DatasetImportController::class,
        'store'
    ])->name('datasets.import.store');

    Route::get('/datasets/{id}', [
        DatasetController::class,
        'show'
    ])->name('datasets.show');


    /*
    |--------------------------------------------------------------------------
    | Questions
    |--------------------------------------------------------------------------
    */

    Route::get('/questions', [
        QuestionController::class,
        'index'
    ])->name('questions.index');

    Route::get('/questions/create', [
        QuestionController::class,
        'create'
    ])->name('questions.create');

    Route::post('/questions', [
        QuestionController::class,
        'store'
    ])->name('questions.store');

    Route::get('/questions/{id}/edit', [
        QuestionController::class,
        'edit'
    ])->name('questions.edit');

    Route::put('/questions/{id}', [
        QuestionController::class,
        'update'
    ])->name('questions.update');

    Route::delete('/questions/{id}', [
        QuestionController::class,
        'destroy'
    ])->name('questions.destroy');

    Route::get('/questions/{id}', [
        QuestionController::class,
        'show'
    ])->name('questions.show');


    /*
    |--------------------------------------------------------------------------
    | SQL
    |--------------------------------------------------------------------------
    */

    Route::post('/sql/execute', [
        SqlController::class,
        'execute'
    ])->name('sql.execute');

    Route::post('/sql/check', [
        SqlController::class,
        'check'
    ])->name('sql.check');


    /*
    |--------------------------------------------------------------------------
    | SQL Playground
    |--------------------------------------------------------------------------
    */

    Route::get('/playground', [
        PlaygroundController::class,
        'index'
    ])->name('playground.index');

    Route::post('/playground', [
        PlaygroundController::class,
        'execute'
    ])->name('playground.execute');

});

require __DIR__.'/auth.php';