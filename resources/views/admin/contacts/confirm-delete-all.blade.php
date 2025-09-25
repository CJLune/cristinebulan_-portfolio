<x-app-layout>
    <div class="container py-5" style="max-width: 600px;">
        <div class="card shadow-lg">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0">Confirm Bulk Deletion</h5>
            </div>
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-exclamation-triangle-fill text-danger mb-3" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <h4 class="card-title">Are you sure you want to delete ALL messages?</h4>
                <p class="text-danger fw-bold">This action will permanently delete every single message in your inbox.</p>
                <p class="text-muted">This action cannot be undone.</p>

                <div class="d-flex justify-content-center mt-4">
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary me-3">Cancel</a>
                    <form action="{{ route('admin.contacts.destroyAll') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes, Delete All Messages</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

