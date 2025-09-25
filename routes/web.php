<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\SearchController;

// --- PUBLIC ROUTES ---
Route::get('/', [PortfolioController::class, 'home'])->name('home');
Route::get('/work', [PortfolioController::class, 'work'])->name('work');
Route::get('/services', [PortfolioController::class, 'services'])->name('services'); 
Route::get('/articles', [PortfolioController::class, 'articles'])->name('articles');
Route::get('/articles/{article:slug}', [PortfolioController::class, 'showArticle'])->name('articles.show');
Route::get('/about', [PortfolioController::class, 'about'])->name('about');
Route::get('/contact', [PortfolioController::class, 'contact'])->name('contact');
Route::get('/creative-lab', [PortfolioController::class, 'creative'])->name('creative');
Route::post('/contact', [PortfolioController::class, 'submitContact'])->name('contact.submit');


// --- PROTECTED ADMIN & DASHBOARD ROUTES ---
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::post('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');
    
    // This is the nested group that applies the admin prefix and name prefix to all routes within. 
    // It keeps the URLs clean and route names organize. 
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // CRUD routes
        Route::resource('articles', ArticleController::class);
        Route::resource('work', WorkController::class);
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        
        // Routes for contact messages
        Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
        Route::get('contacts/confirm-delete-all', [ContactController::class, 'confirmDeleteAll'])->name('contacts.confirmDeleteAll');
        Route::delete('contacts/delete-all', [ContactController::class, 'destroyAll'])->name('contacts.destroyAll');
        Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
        Route::get('contacts/{contact}/confirm-delete', [ContactController::class, 'confirmDelete'])->name('contacts.confirmDelete');
        Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    });
});

require __DIR__.'/auth.php';