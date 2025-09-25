<?php

// app/Http/Controllers/SearchController.php

namespace App\Http\Controllers\Admin;

use App\Models\User; // We are searching Users in this example
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Modify this logic to search your posts, products, etc.
        $results = User::where('name', 'LIKE', "%{$query}%")
                         ->orWhere('email', 'LIKE', "%{$query}%")
                         ->paginate(10);

        // You will need to create this view file later
        return view('search.results', compact('results', 'query'));
    }
}
