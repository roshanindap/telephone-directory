@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Contact</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">First Name *</label>
                        <input type="text" name="first_name" class="form-control" value="{{ $contact->first_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Middle Name</label>
                        <input type="text" name="middle_name" class="form-control" value="{{ $contact->middle_name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name *</label>
                        <input type="text" name="last_name" class="form-control" value="{{ $contact->last_name }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $contact->email }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mobile Number</label>
                        <input type="text" name="mobile_number" class="form-control" value="{{ $contact->mobile_number }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Landline Number</label>
                        <input type="text" name="landline_number" class="form-control" value="{{ $contact->landline_number }}">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Notes</label>
                <textarea name="notes" class="form-control">{{ $contact->notes }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Photo (Leave empty if not changing)</label>
                <input type="file" name="photo" class="form-control">
                @if ($contact->photo)
                    <div class="mt-2">
                        <img src="{{ asset('storage/'.$contact->photo) }}" width="100" class="rounded shadow">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-success w-100">Update Contact</button>
        </form>
    </div>
@endsection
