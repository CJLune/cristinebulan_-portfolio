<a href="{{ route('articles.show', $article) }}" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">{{ $article->title }}</h5>
        <small class="text-muted">{{ $article->created_at->diffForHumans() }}</small>
    </div>
    <p class="mb-1">{{ Str::limit($article->excerpt, 200) }}</p>
    <small class="text-primary">Read More &rarr;</small>
</a>