<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;

Route::get('/', [RecordController::class, 'dashboard'])->name('dashboard');

Route::get('records/trashed', [RecordController::class, 'trashed'])->name('records.trashed');
Route::patch('records/{id}/restore', [RecordController::class, 'restore'])->name('records.restore');
Route::delete('records/{id}/force-delete', [RecordController::class, 'forceDelete'])->name('records.forceDelete');
Route::resource('records', RecordController::class);
Route::view('/about', 'about')->name('about');