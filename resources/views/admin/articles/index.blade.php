<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 font-weight-bold">
                Manage Articles
            </h2>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">Create New Article</a>
        </div>
    </x-slot>

    <div class="container py-5">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            {{-- ADDED: New column for the image thumbnail --}}
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                {{-- ADDED: Table cell to display the image --}}
                                <td>
                                    @if ($article->image_path)
                                        <img src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}" width="100" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->category->name }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                {{-- MODIFIED: Updated colspan to 5 to account for the new column --}}
                                <td colspan="5" class="text-center">No articles found. Use the button above to create one.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>