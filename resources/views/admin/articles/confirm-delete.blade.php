<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Confirm Deletion
        </h2>
    </x-slot>

    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-body text-center p-5">
                <h4 class="card-title mb-3">Are you sure you want to delete this article?</h4>
                <p class="text-danger"><strong>This action cannot be undone.</strong></p>
                
                <div class="alert alert-secondary my-4">
                    "{{ $article->title }}"
                </div>

                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mb-2">Yes, Delete Article</button>
                </form>

                <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</x-app-layout>