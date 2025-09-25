<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Edit Article</h2>
    </x-slot>
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                
                <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                    {{-- Title Input --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $article->title) }}" required>
                        @error('title')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Image Upload Input with Current Image Preview --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Featured Image</label>
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                        <small class="form-text text-muted">Optional: Upload a new image to replace the current one (max 2MB).</small>
                        @error('image')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror

                        @if ($article->image_path)
                            <div class="mt-3">
                                <label>Current Image:</label>
                                <img src="{{ asset('storage/' . $article->image_path) }}" alt="Current featured image for {{ $article->title }}" class="img-thumbnail" width="200">
                            </div>
                        @endif
                    </div>

                    {{-- Category Select --}}
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Body Textarea --}}
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" rows="10" required>{{ old('body', $article->body) }}</textarea>
                        @error('body')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Article</button>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>