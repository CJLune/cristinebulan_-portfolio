<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Welcome back, {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="container py-5">

        <div class="row mb-4">
            {{-- Articles Card --}}
            <div class="col-lg-4 mb-4">
                <a href="{{ route('admin.articles.index') }}" class="card-link">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <h3 class="display-4">{{ $articleCount }}</h3>
                            <p class="card-text">Published Articles</p>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4 mb-4">
                <a href="#" class="card-link disabled"> 
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <h3 class="display-4">{{ $projectCount }}</h3>
                            <p class="card-text">Portfolio Projects</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="card text-center h-100 border-2 border-dashed">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title text-muted">Task Management</h5>
                        <span class="badge bg-light text-dark">Coming Soon</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
    
            <div class="col-lg-8 mb-4">
                <div class="card">
                    <div class="card-header">Recent Activity</div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @forelse($recentArticles as $article)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <a href="{{ route('articles.show', $article) }}" target="_blank">{{ $article->title }}</a>
                                        
                                        @if ($article->updated_at->gt($article->created_at->addSeconds(1))) 
                                            {{-- Use gt() for comparison, a Clean Code practice for Carbon objects --}}
                                            <small class="d-block text-muted">
                                                <span class="fw-bold text-success">Updated:</span> 
                                                <time datetime="{{ $article->updated_at->toIso8601String() }}">
                                                    {{ $article->updated_at->format('d.m.Y, H:i') }}
                                                </time>
                                            </small>
                                        @else
                                
                                            <small class="d-block text-muted">
                                                <span class="fw-bold">Published:</span> 
                                                <time datetime="{{ $article->created_at->toIso8601String() }}">
                                                    {{ $article->created_at->format('d.m.Y, H:i') }}
                                                </time>
                                            </small>
                                        @endif
                                    </div>
                                    <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                </li>
                            @empty
                                <li class="list-group-item text-center">You haven't published any articles yet.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

         
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header">Quick Actions</div>
                    <div class="card-body">
                        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary d-block mb-2">New Article</a>
                        <a href="#" class="btn btn-secondary d-block disabled">New Project</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CSS (Content Preserved) --}}
    @push('styles')
    <style>
        .card-link { text-decoration: none; color: inherit; }
        .card-link .card { transition: all 0.2s ease-in-out; }
        .card-link:hover .card { transform: translateY(-5px); box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .border-dashed { border-style: dashed !important; }
    </style>
    @endpush
</x-app-layout>