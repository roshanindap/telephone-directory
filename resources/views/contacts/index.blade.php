@extends('layouts.app')

@section('title', 'Contacts')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mt-3">
            <h3><i class="fas fa-address-book"></i> Contacts Overview</h3>
            <a href="{{ route('contacts.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Contact
            </a>
        </div>

        <!-- Search & Sorting Row -->
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" id="searchContacts" class="form-control" placeholder="Search contacts...">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
            </div>

            <div class="col-md-6 text-end">
                <div class="btn-group" role="group">
                    <strong class="align-self-center me-2">Sort By:</strong>
                    <a href="{{ route('contacts.index', ['sort_by' => 'first_name', 'order' => request('order') == 'asc' ? 'desc' : 'asc']) }}" class="btn btn-outline-primary">
                        Name <i class="fas {{ request('sort_by') == 'first_name' && request('order') == 'asc' ? 'fa-sort-up' : 'fa-sort-down' }}"></i>
                    </a>
                    <a href="{{ route('contacts.index', ['sort_by' => 'created_at', 'order' => request('order') == 'asc' ? 'desc' : 'asc']) }}" class="btn btn-outline-primary">
                        Date Added <i class="fas {{ request('sort_by') == 'created_at' && request('order') == 'asc' ? 'fa-sort-up' : 'fa-sort-down' }}"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Contact Cards -->
        <div class="row mt-4" id="contactList">
            @foreach($contacts as $contact)
                <div class="col-md-4 mb-4 contact-card">
                    <div class="card shadow-sm border-0 rounded-lg">
                        <img class="card-img-top img-fluid rounded-top" src="{{ asset('storage/'.$contact->photo) }}" alt="Contact Image" style="height: 180px; object-fit: contain;">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $contact->first_name }} {{ $contact->last_name }}</h5>
                            <p class="card-text">
                                <i class="fas fa-envelope"></i> <strong>Email:</strong> {{ $contact->email ?? 'N/A' }}<br>
                                <i class="fas fa-phone"></i> <strong>Mobile:</strong> {{ $contact->mobile_number ?? 'N/A' }}<br>
                                <i class="fas fa-sticky-note"></i> <strong>Notes:</strong> {{ Str::limit($contact->notes, 50) }}
                            </p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('contacts.show', $contact) }}" class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-outline-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // AJAX search functionality
            $('#searchContacts').on('keyup', function() {
                let query = $(this).val();

                if(query.length >= 3) { // Trigger search after 3 characters
                    $.ajax({
                        url: "{{ route('contacts.search') }}",
                        type: "GET",
                        data: { query: query },
                        success: function(data) {
                            let contactList = $('#contactList');
                            contactList.empty(); // Clear the current contact list

                            // Add new contacts based on search result
                            if (data.length > 0) {
                                data.forEach(function(contact) {
                                    contactList.append(`
                                    <div class="col-md-4 mb-4 contact-card">
                                        <div class="card shadow-sm border-0 rounded-lg">
                                            <img class="card-img-top img-fluid rounded-top" src="/storage/${contact.photo}" alt="Contact Image" style="height: 180px; object-fit: contain;">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">${contact.first_name} ${contact.last_name}</h5>
                                                <p class="card-text">
                                                    <i class="fas fa-envelope"></i> <strong>Email:</strong> ${contact.email || 'N/A'}<br>
                                                    <i class="fas fa-phone"></i> <strong>Mobile:</strong> ${contact.mobile_number || 'N/A'}<br>
                                                    <i class="fas fa-sticky-note"></i> <strong>Notes:</strong> ${contact.notes ? contact.notes.slice(0, 50) : 'N/A'}
                                                </p>
                                                <div class="d-flex justify-content-between">
                                                    <a href="/contacts/${contact.id}" class="btn btn-outline-info btn-sm">
                                                        <i class="fas fa-eye"></i> View
                                                    </a>
                                                    <a href="/contacts/${contact.id}/edit" class="btn btn-outline-warning btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="/contacts/${contact.id}" method="POST" class="d-inline">
                                                        @csrf @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
`);
                                });
                            } else {
                                contactList.append('<p class="text-center mt-3 text-muted">No results found</p>');
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
