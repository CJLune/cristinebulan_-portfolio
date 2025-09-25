<x-app-layout>
   
    @section('title', $article->title)
    @section('meta_description', $article->excerpt)

    
    @section('og_title', $article->title)
    @section('og_description', $article->excerpt)
    @if($article->image_path)
        
        @section('og_image', asset('storage/' . $article->image_path)) 

    @endif
    @section('og_url', route('articles.show', $article))
    @section('og_type', 'article')

    <main>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    
                 
                    <article class="article-content">
                        <header class="mb-4">
                            <div class="eyebrow mb-2">
                                {{ $article->category->name }}
                            </div>
                            
                            <h1 class="h1 fw-bold mb-3">{{ $article->title }}</h1>
                
                            <div class="text-muted fst-italic small">
                                <span class="d-inline-block me-3">
                                    Published on 
                                   
                                    <time datetime="{{ $article->created_at->toIso8601String() }}">
                                        {{ $article->created_at->format('M jS, Y, H:i') }}
                                    </time>
                                </span>
                                                  
                                @if ($article->updated_at->gt($article->created_at->addSeconds(1)))
                                    <span class="d-inline-block">
                                        Last Updated on 
                                        <time datetime="{{ $article->updated_at->toIso8601String() }}">
                                            {{ $article->updated_at->format('M jS, Y, H:i') }}
                                        </time>
                                    </span>
                                @endif
                            </div>
                     
                        </header>
                        
                  
                        @auth
                            <div class="text-center border rounded p-3 my-4 bg-light">
                                <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-info d-inline-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square me-2" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                                    <span>Edit this Article</span>
                                </a>
                            </div>
                        @endauth

                        @if ($article->image_path)
                            <figure class="mb-4">
            
                                <img src="{{ asset('storage/' . $article->image_path) }}" class="img-fluid rounded" alt="{{ $article->title }}" loading="lazy">
                                <figcaption></figcaption> 
                            </figure>
                        @endif

                        <section class="body-text fs-5">
                            {!! nl2br(e($article->body)) !!}
                        </section>
                    </article>

                    <hr class="my-5">

                    <div class="text-center">
                        <a href="{{ route('articles') }}" class="btn btn-secondary">&larr; Back to Articles</a>
                    </div>

                </div>
            </div>
        </div>
    </main>
</x-app-layout>