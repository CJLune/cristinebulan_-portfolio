<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
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
        if ($notification->notifiable_id === Auth::id()) {
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
        Auth::user()->unreadNotifications()->update(['read_at' => now()]);
        
        return redirect()->back()->with('success', 'All notifications marked as read.');
    }
}
