<?php

namespace App\Http\Controllers\Admin;

// Import the base controller, which was missing.
use App\Http\Controllers\Controller;

// Import the correct class for database notifications.
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Marks a single notification as read via an AJAX request.
     *
     * @param \Illuminate\Notifications\DatabaseNotification $notification
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAsRead(DatabaseNotification $notification)
    {
        // Security Check: Ensure the notification belongs to the authenticated user.
        // The correct property for the user ID is 'notifiable_id'.
        if ($notification->notifiable_id === Auth::id()) {
            
            // Use Laravel's built-in method, which is the preferred way.
            $notification->markAsRead();
        }
        
        return response()->json(['success' => true]);
    }

    /**
     * Marks all of the user's unread notifications as read.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAllAsRead()
    {
        // Your existing logic here is correct and follows best practices.
        Auth::user()->unreadNotifications()->update(['read_at' => now()]);
        
        return redirect()->back()->with('success', 'All notifications marked as read.');
    }
}
