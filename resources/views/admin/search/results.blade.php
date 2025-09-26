@extends('layouts.app')

@section('content')
<div class="container">
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

                    @include('admin.search.partials._article_result', ['article' => $result])

                @elseif ($result instanceof \App\Models\Project)
                    
                    @include('admin.search.partials._project_result', ['project' => $result])
                @endif

            @endforeach
        </div>

        {{-- This renders the pagination links --}}
        <div class="mt-4">
            {{ $results->appends(['query' => $query])->links() }}
           
        </div>

    @else
        <div class="text-center py-5">
            <p class="text-muted">
                @if($query)
                    No results found.
                @else
                    Please enter a search term to begin.
                @endif
            </p>
        </div>
    @endif
</div>
@endsection