<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Public\BlogController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Admin\NewsLetterController;
use App\Http\Controllers\Public\ContactFormController;
use App\Http\Controllers\Admin\PrbsCandidateController;
use App\Http\Controllers\Admin\NewsLetterSentController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

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
Route::get('blog/{month}/month', [BlogController::class, 'postsMonth'])->name('blog.postsMonth');
Route::get('blog/post/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('prbs_candidate/create', [PrbsCandidateController::class, 'create'])->name('prbs_candidate.create');
Route::post('news_letter/subscribe', [NewsLetterController::class, 'subscribe'])->name('news_letter.subscribe');
Route::get('news_letter/{email}/unsubscribe', [NewsLetterController::class, 'unsubscribe'])->name('news_letter.unsubscribe');




Route::middleware('guest')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');


    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::post('forgot-password/{user}', [PasswordResetLinkController::class, 'storeInner'])->name('password.email.inner');
    Route::get('forgot-password', [PasswordResetLinkController::class, 'storeOuter'])->name('password.email.outer');

    Route::get('prbs_candidate/{prbs_candidate}/print', [PrbsCandidateController::class, 'print'])->name('prbs_candidate.print');

    Route::resource('prbs_candidate', PrbsCandidateController::class)->except(['edit', 'update', 'create']);
    Route::resource('user', UserController::class);
    Route::resource('post', PostController::class)->except(['show']);
    Route::resource('news_letter_sent', NewsLetterSentController::class)->except(['edit', 'update']);
    Route::get('news_letter_sent/{mail}/print', [NewsLetterSentController::class, 'print'])->name('news_letter_sent.print');
    Route::post('news_letter_sent/checkbox', [NewsLetterSentController::class, 'checkbox'])->name('news_letter_sent.checkbox');
    Route::get('post/{slug}', [PostController::class, 'show'])->name('post.show');
    Route::post('post/{post}/publish', [PostController::class, 'publish'])->name('post.publish');
    Route::post('post/{post}/unpublish', [PostController::class, 'unpublish'])->name('post.unpublish');
    Route::post('post/{post}/featured_image', [PostController::class, 'featured_image'])->name('post.featured_image');
    Route::post('contact_form', [ContactFormController::class, 'sendContactMail'])->name('contact_form.send');

    Route::get('news_letter', [NewsLetterController::class, 'index'])->name('news_letter.index');
    Route::delete('news_letter/{email}/destroy', [NewsLetterController::class, 'destroy'])->name('news_letter.destroy');
});
