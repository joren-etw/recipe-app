<?php

use App\Http\Livewire\Components\Recipe;
use App\Http\Livewire\Recipes;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Recipes::class);
Route::get('/{id}', Recipe::class);
