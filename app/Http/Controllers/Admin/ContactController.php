<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the contact messages.
     */
    public function index(Request $request)
    {
        // Get the sorting option from the request, default to 'newest'
        $sort = $request->input('sort', 'newest');

        $query = Contact::query();

        // Apply sorting based on the selected option
        switch ($sort) {
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'unread':
                // This will order by unread messages first (read_at is null),
                // then by the newest among them.
                $query->orderByRaw('read_at IS NULL DESC, created_at DESC');
                break;
            case 'read':
                // This will order by read messages first (read_at is not null),
                // then by the newest among them.
                $query->orderBy('read_at', 'desc')->orderBy('created_at', 'desc');
                break;
            default: // 'newest'
                $query->orderBy('created_at', 'desc');
                break;
        }

        // Paginate the results
        $contacts = $query->paginate(15);

        // Return the view and pass the contacts and current sort option to it
        return view('admin.contacts.index', compact('contacts', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show(Contact $contact)
    {
        if (!$contact->read_at) {
            $contact->update(['read_at' => now()]);
        }
        return view('admin.contacts.show', compact('contact'));
    }
    
    // ... (keep all your other methods: confirmDelete, destroy, confirmDeleteAll, destroyAll)
    
    public function confirmDelete(Contact $contact)
    {
        return view('admin.contacts.confirm-delete', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Message deleted successfully.');
    }

    public function confirmDeleteAll()
    {
        return view('admin.contacts.confirm-delete-all');
    }

    public function destroyAll()
    {
        Contact::truncate();
        return redirect()->route('admin.contacts.index')->with('success', 'All messages have been deleted.');
    }
}

