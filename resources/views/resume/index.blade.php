@extends('layout')
@section('content')
    <div class="resume">
        <header>
            <h1>{{ $user->name }}</h1>
            <p>{{ $user->email }}</p>
            @if($user->phone)
                <p>{{ $user->phone }}</p>
            @endif
        </header>

        <section class="work-experience">
            <h2>Work Experience</h2>
            @foreach($experiences as $experience)
                <div class="experience">
                    <h3>{{ $experience->role }}</h3>
                    <h4>{{ $experience->company }}</h4>
                    <p>{{ $experience->start_date->format('M Y') }} -
                        {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}</p>
                    <p>{{ $experience->description }}</p>
                </div>
            @endforeach
        </section>
    </div>
@endsection
