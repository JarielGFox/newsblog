<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TicketController;

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

// Rotte private

Route::middleware('auth')->group(function(){
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::post('/store', [PageController::class, 'store'])->name('store-article');
    Route::post('/sendmail',  [PageController::class, 'sendEmail'])->name('send');
    Route::get('/usermanager', [PageController::class, 'accountManagement'])->name('user-manager');

    // Route::resource();
    Route::resource('categories', CategoryController::class);
    Route::resource('articles', PageController::class);
    Route::resource('tickets', TicketController::class);
});

// Rotte Pubbliche
Route::get('/', [PageController::class, 'welcome'])->name('home');
Route::get('/dettagliarticolo/{id}', [PageController::class, 'newsDetail'])->name('news-detail');
Route::get('/contact', [PageController::class, 'contact'])->name('contacts');
Route::get('/grazie',[PageController::class, 'thankYou'])->name('thank-you');

// Route::get('/news', [PageController::class, 'showArticle'])->name('news');
// Route::get('/testdb', [PageController::class, 'insertInto'])->name('hello');
// Route::get('/estrai', [PageController::class, 'exportAll'])->name('export');

