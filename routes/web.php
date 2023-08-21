<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Public\BlogController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Admin\PrbsCandidateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('about', [HomeController::class, 'about'])->name('home.about');
Route::get('programmes', [HomeController::class, 'programmes'])->name('home.programmes');
Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('prbs_candidate/create', [PrbsCandidateController::class, 'create'])->name('prbs_candidate.create');
Route::get('prbs_candidate/{prbs_candidate}/print', [PrbsCandidateController::class, 'print'])->name('prbs_candidate.print');

Route::resource('prbs_candidate', PrbsCandidateController::class)->except(['edit', 'update', 'create']);
Route::resource('user', UserController::class);
