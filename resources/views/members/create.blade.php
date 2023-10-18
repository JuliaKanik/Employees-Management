

@extends('layouts.app') {{-- Use your own layout template if needed --}}

@section('content')
    <div class="container">
        <h1>Add New Member</h1>
        <form method="POST" action="{{ route('members.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="school">School:</label>
                <select name="school_name" id="school" class="form-control" required>
                    @foreach($schools as $school)
                        <option value="{{ $school->SchoolName }}">{{ $school->SchoolName }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Member</button>
        </form>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
