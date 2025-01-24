@extends('layout')

@section('content')
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <!-- Display user-specific details -->
@endsection
