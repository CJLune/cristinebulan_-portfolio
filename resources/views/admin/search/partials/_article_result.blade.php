{{-- resources/views/admin/search/partials/_article_result.blade.php --}}

<div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
    <div>
        <h5 class="mb-1">{{ $article->title }}</h5>
        <p class="mb-1 text-muted">{{ Str::limit($article->excerpt, 150) }}</p>
        <small>Type: Article &middot; Published: {{ $article->created_at->format('d.m.Y, H:i') }}</small>
    </div>
    

    <div class="ms-3 text-nowrap">
        <a href="{{ route('articles.show', $article) }}" class="btn btn-primary" target="_blank">View</a>
        <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-outline-secondary">Edit</a>
    </div>
</div>