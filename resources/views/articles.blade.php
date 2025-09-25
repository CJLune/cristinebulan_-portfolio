<x-app-layout> {{-- Or <x-guest-layout> if you have one --}}
    <main>
        <div class="container section">
            <div class="section-title">
                <span class="bar"></span><h1 class="mb-0">Insights & Articles</h1>
            </div>
            <p class="lead">Sharing my thoughts on web performance, technical SEO, and modern development.</p>

            @if($articles->count())
                <div class="row g-4 mt-4">
                    @foreach ($articles as $article)
                        <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
                            <article class="card p-2 h-100 w-100">
                                <a href="{{ route('articles.show', $article) }}">
                                    
                                    @if (!empty($article->image_path))
                                        <img class="card-img-top rounded" src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                                    @else
                                        <img class="card-img-top rounded" src="https://images.unsplash.com/photo-1457369804613-52c61a468e7d?q=80&w=1200" alt="Default article image" style="height: 200px; object-fit: cover;">
                                    @endif

                                </a>
                                
                                <div class="card-body d-flex flex-column">
                                    <header>
                                        <div class="eyebrow mb-1">                                            
                                            {{ $article->category->name }}
                                        </div>
                                        <h2 class="card-title h5">
                                            <a class="text-decoration-none text-body" href="{{ route('articles.show', $article) }}">
                                                {{ $article->title }}
                                            </a>
                                        </h2>
                                    </header>
                                    <p class="card-text">{{ $article->excerpt }}</p>
                                    <div class="mt-auto pt-3">
                                        <a href="{{ route('articles.show', $article) }}" class="btn btn-sm btn-secondary">Read More</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="col">
                    <p>No articles found.</p>
                </div>
            @endif
        </div>

        @if ($articles->hasPages())
            <div class="mt-5 d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        @endif
    </main>
</x-app-layout>