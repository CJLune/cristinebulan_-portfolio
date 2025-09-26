<section id="blog" class="section">
    <div class="container">
        <div class="section-title"><span class="bar"></span><h2 class="mb-0">Insights & Articles</h2></div>
        <p class="lead">Sharing my thoughts on web performance, technical SEO, and modern development.</p>
        <div class="row g-4 mt-4">
            @forelse ($articles as $article)
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
                    <div class="card p-2 h-100">

                        
                        @if (!empty($article->image_path))
                            <img class="card-img-top rounded" src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img class="card-img-top rounded" src="https://images.unsplash.com/photo-1457369804613-52c61a468e7d?q=80&w=1200" alt="Default article image" style="height: 200px; object-fit: cover;">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <div class="eyebrow mb-1">{{ $article->category->name }}</div>
                            <h5 class="card-title">
                                <a href="{{ route('articles.show', $article) }}" class="text-decoration-none text-body">{{ $article->title }}</a>
                            </h5>
                            <p class="card-text">{{ $article->excerpt }}</p>
                            <div class="text-center mt-auto pt-3">
                              
                               <a href="{{ route('articles.show', $article) }}" class="btn btn-sm btn-secondary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col"><p>No articles found.</p></div>
            @endforelse
        </div>
    </div>
</section>