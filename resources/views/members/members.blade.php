@extends('layouts.app')

@section('title', 'Members')


@section('content')
<a href="{{ route('members.create') }}" class="btn btn-primary">Create New Member</a>

    <h1>Members List</h1>
    <ul>
        @foreach ($members as $member)
            <li>
                Name: {{ $member->name }}
                <br>
                Email: {{ $member->email }}
                <br>
                School: {{ $member->school->SchoolName }} 
                <br>
                <form action="{{ route('members.destroy', $member) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
0

@endsection
