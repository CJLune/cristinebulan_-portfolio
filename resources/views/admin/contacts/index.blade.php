<x-app-layout>
    <div class="container py-5">
        <div class="card">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                <h5 class="card-title mb-0 me-3">Received Messages</h5>
                <div class="d-flex align-items-center mt-2 mt-md-0">
                    <!-- Sorting Form -->
                    <form action="{{ route('admin.contacts.index') }}" method="GET" class="d-flex align-items-center me-2">
                        <label for="sort" class="form-label me-2 mb-0 visually-hidden">Sort</label>
                        <select name="sort" id="sort" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="newest" {{ ($sort ?? 'newest') === 'newest' ? 'selected' : '' }}>Newest</option>
                            <option value="oldest" {{ ($sort ?? 'newest') === 'oldest' ? 'selected' : '' }}>Oldest</option>
                            <option value="unread" {{ ($sort ?? 'newest') === 'unread' ? 'selected' : '' }}>Unread</option>
                            <option value="read" {{ ($sort ?? 'newest') === 'read' ? 'selected' : '' }}>Read</option>
                        </select>
                    </form>

                    <!-- Delete All Link -->
                    <a href="{{ route('admin.contacts.confirmDeleteAll') }}" class="btn btn-danger btn-sm">Delete All</a>
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('info'))
                    <div class="alert alert-info" role="alert">
                        {{ session('info') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Received</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contacts as $contact)
                                <tr class="{{ is_null($contact->read_at) ? 'fw-bold table-row-unread' : '' }}">
                                    <th scope="row">{{ $contacts->firstItem() + $loop->index }}</th>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ Str::limit($contact->subject, 40) }}</td>
                                    <td>{{ $contact->created_at->format('d.m.Y') }}</td>
                                    <td>
                                       
                                        @if(is_null($contact->read_at))
                                            <span class="badge bg-primary">Unread</span>
                                        @else
                                            <span class="badge bg-secondary">Read</span>
                                        @endif
                                        
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-outline-secondary" aria-label="View Message">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.12 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/></svg>
                                        </a>
                                        <a href="{{ route('admin.contacts.confirmDelete', $contact) }}" class="btn btn-sm btn-outline-danger" aria-label="Delete Message">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">You have no messages.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                <div class="mt-4 d-flex justify-content-center">
                    {{ $contacts->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

