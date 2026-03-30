<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembershipController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('members', MemberController::class);
Route::resource('memberships', MembershipController::class);
