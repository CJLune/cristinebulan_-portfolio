<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Notifications\NewMessageNotification; 
use Illuminate\Pagination\LengthAwarePaginator;

class PortfolioController extends Controller
{
    public function home()
    {
        $projects = Project::latest()->take(3)->get();
        $articles = Article::with('category')->latest()->take(3)->get();
        return view('home', compact('projects', 'articles'));
    }

    public function work()
    {
        $projects = Project::latest()->get();
        return view('pages.work', compact('projects'));
    }

    public function services()
    {
        return view('pages.services'); 
    }

    public function articles()
    {
        $articles = Article::with('category')->latest()->paginate(9);
        return view('pages.articles', compact('articles'));
    }

    public function showArticle(Article $article)
    {
        return view('pages.article-show', compact('article'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }
    
    public function creative()
    {
        return view('pages.creative');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email:rfc,dns', 'max:255'], 
            'subject'   => ['required', 'string', 'max:255'],
            'message'   => ['required', 'string', 'min:20', 'max:5000'],
        ]);

        $contact = Contact::create($validated);
        
        $admin = User::first();
        if ($admin) {
            $admin->notify(new NewMessageNotification($contact));
        }

        return redirect()->route('contact')->with('success', 'Thank you for your message! I will get back to you as soon as possible.');
    }

    public function search(Request $request)
{
    $query = $request->input('query');
    $results = collect();

    if ($query) {
        $articles = Article::where('title', 'LIKE', "%{$query}%")
                           ->orWhere('excerpt', 'LIKE', "%{$query}%")
                           ->get();
                           
        $projects = Project::where('title', 'LIKE', "%{$query}%")->get();

        $results = $articles->concat($projects);
    }

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

    return view('pages.search-results', [
        'results' => $paginatedResults,
        'query' => $query
    ]);
}

}
