<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/home');

Route::get('/home', [CustomerController::class, 'showAllCustomers'])->name('home');

Route::post('/saveCustomer', [CustomerController::class, 'saveCustomerDetails'])-> name ('saveCustomer') ;

Route::get('/editCustomer/{cust_ID}',[CustomerController::class, 'ShowCustomerDetails']) -> name('customerEdit');

Route::delete('/deleteCustomer/{cust_ID}',[CustomerController::class, 'deleteCustomerDetails']) -> name('customerDelete');

Route::put('/saveEditCustomer/{cust_ID}', [CustomerController::class, 'saveEditCustomer']) ->name('saveEditCustomer');
