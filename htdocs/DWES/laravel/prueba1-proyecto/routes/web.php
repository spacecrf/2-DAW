<?php

use App\Http\Controllers\InicioCtrl;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::any('/', [InicioCtrl::class, 'index']);
