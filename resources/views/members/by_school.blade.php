<!-- resources/views/members/by_school.blade.php -->
@extends('layouts.app')

@section('title', 'Members for School')

@section('content')
    <h1>Members for {{ $school->SchoolName }}</h1>
    <ul>
        @foreach ($members as $member)
            <li>Name: {{ $member->name }}</li>
            <li>Email: {{ $member->email }}</li>
        @endforeach
    </ul>
@endsection

