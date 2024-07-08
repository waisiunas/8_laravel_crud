<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\TrashedCountryController;
use Illuminate\Support\Facades\Route;

Route::controller(CountryController::class)->name('country.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::prefix('country')->group(function () {
        Route::get('create', 'create')->name('create');
        Route::post('create', 'store');
        Route::get('{country}/edit', 'edit')->name('edit');
        // Route::post('{country}/edit', 'update');
        Route::patch('{country}/edit', 'update');
        // Route::get('{country}/destroy', 'destroy')->name('destroy');
        Route::delete('{country}/destroy', 'destroy')->name('destroy');
    });
});

Route::controller(TrashedCountryController::class)->group(function () {
    Route::get('country/trashed', 'index')->name('country.trashed');
    Route::patch('country/{id}/restore', 'restore')->name('country.restore');
    Route::delete('country/{id}/delete', 'delete')->name('country.delete');
});
