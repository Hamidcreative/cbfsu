<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::group(['prefix'=>'customers','groupName' => 'Customers', 'access' => 'all'], function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index')->defaults('title','Listing');
    Route::get('create', [CustomerController::class, 'create'])->name('customer.create')->defaults('title','Create');
    Route::post('store', [CustomerController::class, 'store'])->name('customer.store')->defaults('title','Save');
    Route::get('{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit')->defaults('title','Edit');
    Route::post('update', [CustomerController::class, 'update'])->name('customer.update')->defaults('title','Update');
    Route::get('{id}/view', [CustomerController::class, 'view'])->name('customer.view')->defaults('title','Details');
    Route::post('delete/{id}',[CustomerController::class,'delete'])->name('customer.delete')->defaults('title','Delete');
    Route::post('status/{id}/{status}',[CustomerController::class,'status'])->name('customer.status')->defaults('title','Status');
    Route::get('profile',[CustomerController::class,'profile'])->name('customer.profile')->defaults('title','Customer Profile');
});
