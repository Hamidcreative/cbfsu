<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BondController;

Route::group(['prefix'=>'bonds','groupName' => 'Bonds', 'access' => 'all'], function () {
    Route::get('/', [BondController::class, 'index'])->name('bond.index')->defaults('title','Listing');
    Route::get('create', [BondController::class, 'create'])->name('bond.create')->defaults('title','Create');
    Route::post('store', [BondController::class, 'store'])->name('bond.store')->defaults('title','Save');
    Route::get('create/{id}', [BondController::class, 'create'])->name('bond.edit')->defaults('title','Edit');
    Route::post('update', [BondController::class, 'update'])->name('bond.update')->defaults('title','Update');
    Route::get('{bond}/view', [BondController::class, 'view'])->name('bond.view')->defaults('title','Details');
    Route::post('delete/{id}',[BondController::class,'delete'])->name('bond.delete')->defaults('title','Delete');
    Route::post('status/{id}/{status}',[BondController::class,'status'])->name('bond.status')->defaults('title','Status');
});

