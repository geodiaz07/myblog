<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\HomeController; // Tambahkan HomeController


Route::get('/', function () {
    return view('welcome');
});

// Route landing page
Route::get('/', [HomeController::class, 'index'])->name('home.main');
Route::get('/articles', [HomeController::class, 'articles'])->name('home.articles.index');
Route::get('/articles/{slug}', [HomeController::class, 'articlesShow'])->name('home.articles.show');
Route::get('/articles/categories/{id}', [HomeController::class, 'articlesCategories'])->name('home.articles.categories');
Route::get('/information', [HomeController::class, 'information'])->name('home.information.index');
Route::get('/information/{slug}', [HomeController::class, 'informationShow'])->name('home.information.show');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact.index');
Route::post('/contact', [HomeController::class, 'contactStore'])->name('home.contact.store');
Route::get('/team', [HomeController::class, 'team'])->name('home.team.index');



//Route semua pengguna
Route::middleware(['auth'])->name('admin.')->group(function () {
    //route untuk dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('admin/articles', ArticleController::class); // manajemen artikel
    // Rute profil user yang login
    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route hanya untuk admin
Route::middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    // Semua rute di dalam grup ini akan memerlukan otentikasi dan peran 'admin'
    Route::resource('admin/users', UserController::class); // manajemen user
    Route::resource('admin/categories', CategoryController::class); // manajemen kategori
    Route::resource('admin/information', InformationController::class); // manajemen kategori

     // route untuk inbox
    Route::get('admin/inbox', [InboxController::class, 'index'])->name('inbox.index');
    Route::put('admin/inbox/{inbox}/toggle-status', [InboxController::class, 'toggleStatus'])->name('inbox.toggleStatus');
    Route::delete('admin/inbox/{inbox}', [InboxController::class, 'destroy'])->name('inbox.destroy');

});
