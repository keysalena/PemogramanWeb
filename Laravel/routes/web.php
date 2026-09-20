<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BurgerController;

Route::get('/', [BurgerController::class, 'index'])->name('burgers.index');