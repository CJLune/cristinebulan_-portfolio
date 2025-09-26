@extends('layouts.portfolio')

@section('title', 'Search Results')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">
        @if($query)
            Search Results for: <span class="fw-normal">"{{ $query }}"</span>
        @else
            Search
        @endif
    </h1>

    @if($query && $results->count())
        <div class="list-group">
            @foreach ($results as $result)
                @if ($result instanceof \App\Models\Article)
                    @include('partials._public_article_result', ['article' => $result])
                @endif
            @endforeach
        </div>

        <div class="mt-4">
            {{ $results->appends(['query' => $query])->links() }}
        </div>
    @else
        <p class="text-muted">No results found for your search.</p>
    @endif
</div>
@endsection