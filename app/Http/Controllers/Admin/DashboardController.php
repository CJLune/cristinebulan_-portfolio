<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Project; // Assumes you have a Project model

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard with content stats and recent activity.
     */
    public function index()
    {
        // Fetch data for the stats cards
        $articleCount = Article::count();
        $projectCount = Project::count();

        // Fetch data for the "Recent Activity" list
        $recentArticles = Article::with('category')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'articleCount',
            'projectCount',
            'recentArticles'
        ));
    }
}