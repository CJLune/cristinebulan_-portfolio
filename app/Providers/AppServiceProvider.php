<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Contact;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ==================================================
        //             ADD THIS VIEW COMPOSER
        // ==================================================
        // This composer shares notification and message data with the
        // main navigation bar on every authenticated page load.
        View::composer('layouts.navigation', function ($view) {
            // Ensure we only run this logic when a user is logged in
            if (Auth::check()) {
                // Fetch all unread notifications for the bell icon
                $unreadNotifications = Auth::user()->unreadNotifications;

                // Fetch the count of unread messages for the mail icon
                $unreadMessagesCount = Contact::whereNull('read_at')->count();

                // Share these variables with the view
                $view->with([
                    'unreadNotifications' => $unreadNotifications,
                    'unreadMessagesCount' => $unreadMessagesCount,
                ]);
            } else {
                // For non-authenticated pages, provide default empty values
                $view->with([
                    'unreadNotifications' => collect(), // An empty collection
                    'unreadMessagesCount' => 0,
                ]);
            }
        });
        // ==================================================
        //            END OF NEW LOGIC
        // ==================================================
    }
}
