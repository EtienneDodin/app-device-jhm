<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\HomeController;

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ServiceController;

Route::get('/', HomeController::class)->name('index');

Route::get('/types', [TypeController::class,'index'])->name('types.index');
Route::get('/types/create', [TypeController::class,'create'])->name('types.create');
Route::post('/types/store', [TypeController::class,'store'])->name('types.store');
Route::get('/types/edit/{type}', [TypeController::class,'edit'])->name('types.edit');
Route::put('/types/update/{type}', [TypeController::class,'update'])->name('types.update');
Route::delete('/types/destroy/{type}', [TypeController::class,'destroy'])->name('types.destroy');


Route::get('/owners', [OwnerController::class,'index'])->name('owners.index');
Route::get('/owners/create', [OwnerController::class,'create'])->name('owners.create');
Route::post('/owners/store', [OwnerController::class,'store'])->name('owners.store');
Route::get('/owners/edit/{owner}', [OwnerController::class,'edit'])->name('owners.edit');
Route::put('/owners/update/{owner}', [OwnerController::class,'update'])->name('owners.update');
Route::delete('/owners/destroy/{owner}', [OwnerController::class,'destroy'])->name('owners.destroy');

Route::get('/devices/create', [DeviceController::class,'create'])->name('devices.create');
Route::get('/devices/edit/{device}', [DeviceController::class,'edit'])->name('devices.edit');
Route::put('/devices/update/{device}', [DeviceController::class,'update'])->name('devices.update');
Route::post('/devices/store', [DeviceController::class,'store'])->name('devices.store');
Route::delete('/devices/destroy/{device}', [DeviceController::class,'destroy'])->name('devices.destroy');

Route::get('/locations', [LocationController::class,'index'])->name('locations.index');
Route::get('/locations/create', [LocationController::class,'create'])->name('locations.create');
Route::get('/locations/edit/{location}', [LocationController::class,'edit'])->name('locations.edit');
Route::put('/locations/update/{location}', [LocationController::class,'update'])->name('locations.update');
Route::post('/locations/store', [LocationController::class,'store'])->name('locations.store');
Route::delete('/locations/destroy/{location}', [LocationController::class,'destroy'])->name('locations.destroy');

Route::get('/services', [ServiceController::class,'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class,'create'])->name('services.create');
Route::get('/services/edit/{service}', [ServiceController::class,'edit'])->name('services.edit');
Route::put('/services/update/{service}', [ServiceController::class,'update'])->name('services.update');
Route::post('/services/store', [ServiceController::class,'store'])->name('services.store');
Route::delete('/services/destroy/{service}', [ServiceController::class,'destroy'])->name('services.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/i', [AdminController::class,'index'])->name('iex');
});
