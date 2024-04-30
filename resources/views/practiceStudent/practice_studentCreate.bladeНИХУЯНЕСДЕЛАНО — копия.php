@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Practice Students</h1>
        <ul>
            @foreach($practiceStudents as $student)
                <li class="mb-2">{{ $student->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection
