<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Project; 
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    /**
     * Search for resources across multiple models.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // They said it is a good practice to have an empty collection to start with.
        $results = collect();

        // Only perform a search if the query isn't empty.
        if ($query) {
            // --- Search Articles ---
            // We search the 'title' and 'excerpt' columns of the articles table.
            $articles = Article::where('title', 'LIKE', "%{$query}%")
                               ->orWhere('excerpt', 'LIKE', "%{$query}%")
                               ->get();

            // --- Search Projects (Ready for the future) ---
            // This part is ready to be used once your Project model is fully set up. Soon! :-)
            // For now, it will just return an empty collection.
            $projects = Project::where('title', 'LIKE', "%{$query}%") 
                                 ->get();
            
            // --- Combine Results ---
            $results = $articles->concat($projects);
        }

        // --- Manual Pagination ---
      
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $results->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $paginatedResults = new LengthAwarePaginator(
            $currentPageItems,
            $results->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
        
        // Return to the view with the paginated results and the original query.
        return view('admin.search.results', [
            'results' => $paginatedResults,
            'query' => $query
        ]);
    }
}