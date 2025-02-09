@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Contact</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>First Name *</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" name="middle_name" class="form-control">
            </div>

            <div class="form-group">
                <label>Last Name *</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label>Mobile Number</label>
                <input type="text" name="mobile_number" class="form-control">
            </div>

            <div class="form-group">
                <label>Landline Number</label>
                <input type="text" name="landline_number" class="form-control">
            </div>

            <div class="form-group">
                <label>Notes</label>
                <textarea name="notes" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Photo (Max: 500KB)</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Save Contact</button>
        </form>
    </div>
@endsection
