<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Message from {{ $contact->name }}
        </h2>
    </x-slot>

    <div class="container py-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <strong>Subject: {{ $contact->subject }}</strong>
                </div>
                <div>
                    <small class="text-muted">Received: {{ $contact->created_at->format('d.m.Y, H:i') }} Uhr</small>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="card-title">From: {{ $contact->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Email: <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></h6>
                </div>
                
                <hr>

                <p class="card-text mt-4" style="white-space: pre-wrap;">{{ $contact->message }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary d-inline-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    <span>Back to Messages</span>
                </a>
                
                <div>
                    @php
                        $subject = rawurlencode('Re: ' . $contact->subject);
                        $body = rawurlencode("\n\n\n---\nOn " . $contact->created_at->format('F j, Y, \a\t g:i a') . ", " . $contact->name . " wrote:\n\n> " . str_replace("\n", "\n> ", $contact->message));
                    @endphp
                    <a href="mailto:{{ $contact->email }}?subject={{ $subject }}&body={{ $body }}" class="btn btn-primary d-inline-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply-fill me-2" viewBox="0 0 16 16">
                            <path d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                        </svg>
                        <span>Reply</span>
                    </a>

                    <a href="{{ route('admin.contacts.confirmDelete', $contact) }}" class="btn btn-danger d-inline-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash me-2" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                        
                        <span>Delete</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>