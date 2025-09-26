<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage; 

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')->latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255|unique:articles,title',
            'category_id' => 'required|exists:categories,id',
            'body'        => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validated['slug'] = Str::slug($request->title);
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 150);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('article_images', 'public');
            $validated['image_path'] = $path;
        }

        Article::create($validated);
        
        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully!');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255', Rule::unique('articles')->ignore($article->id)],
            'category_id' => 'required|exists:categories,id',
            'body'        => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $validated['slug'] = Str::slug($request->title);
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 150);

        if ($request->hasFile('image')) {
            if ($article->image_path) {
                Storage::disk('public')->delete($article->image_path);
            }
            $path = $request->file('image')->store('article_images', 'public');
            $validated['image_path'] = $path;
        }

        $article->update($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully!');
    }
    
    public function confirmDelete(Article $article)
    {
        return view('admin.articles.confirm-delete', compact('article'));
    }

    public function destroy(Article $article)
    {
        if ($article->image_path) {
            Storage::disk('public')->delete($article->image_path);
        }

        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully!');
    }
}