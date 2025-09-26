<?php

use Illuminate\Support\Facades\Route;

// --- PUBLIC ROUTES ---
Route::get('/', [\App\Http\Controllers\PortfolioController::class, 'home'])->name('home');
Route::get('/work', [\App\Http\Controllers\PortfolioController::class, 'work'])->name('work');
Route::get('/services', [\App\Http\Controllers\PortfolioController::class, 'services'])->name('services');
Route::get('/articles', [\App\Http\Controllers\PortfolioController::class, 'articles'])->name('articles');
Route::get('/articles/{article:slug}', [\App\Http\Controllers\PortfolioController::class, 'showArticle'])->name('articles.show');
Route::get('/about', [\App\Http\Controllers\PortfolioController::class, 'about'])->name('about');
Route::get('/contact', [\App\Http\Controllers\PortfolioController::class, 'contact'])->name('contact');
Route::get('/creative-lab', [\App\Http\Controllers\PortfolioController::class, 'creative'])->name('creative');
Route::post('/contact', [\App\Http\Controllers\PortfolioController::class, 'submitContact'])->name('contact.submit');
Route::get('/find', [\App\Http\Controllers\PortfolioController::class, 'search'])->name('search.public');

// --- PROTECTED ADMIN & DASHBOARD ROUTES ---
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::post('/notifications/{notification}/read', [\App\Http\Controllers\Admin\NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [\App\Http\Controllers\Admin\NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');
    
    // Admin-only routes with /admin URL prefix and 'admin.' name prefix
    Route::prefix('admin')->name('admin.')->group(function () {
        // Admin Search
        Route::get('/search', [\App\Http\Controllers\Admin\SearchController::class, 'search'])->name('search');

        // Profile
        Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [\App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');

        // Contact Messages
        Route::get('contacts', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
        Route::get('contacts/confirm-delete-all', [\App\Http\Controllers\Admin\ContactController::class, 'confirmDeleteAll'])->name('contacts.confirmDeleteAll');
        Route::delete('contacts/delete-all', [\App\Http\Controllers\Admin\ContactController::class, 'destroyAll'])->name('contacts.destroyAll');
        Route::get('contacts/{contact}', [\App\Http\Controllers\Admin\ContactController::class, 'show'])->name('contacts.show');
        Route::get('contacts/{contact}/confirm-delete', [\App\Http\Controllers\Admin\ContactController::class, 'confirmDelete'])->name('contacts.confirmDelete');
        Route::delete('contacts/{contact}', [\App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('contacts.destroy');

        // CRUD for Articles (with confirmation)
        Route::get('articles/{article}/confirm-delete', [\App\Http\Controllers\ArticleController::class, 'confirmDelete'])->name('articles.confirmDelete');
        Route::resource('articles', \App\Http\Controllers\ArticleController::class);
        
        // Other CRUD routes
        Route::resource('work', \App\Http\Controllers\WorkController::class);
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    });
});

require __DIR__.'/auth.php';