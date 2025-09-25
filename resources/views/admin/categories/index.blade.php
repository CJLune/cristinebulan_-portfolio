<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 font-weight-bold">
                Manage Categories
            </h2>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create New Category</a>
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
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure? Deleting this category will remove it from all associated articles.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No categories found. Use the button above to create one.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>