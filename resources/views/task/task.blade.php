@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Tasks</h1>
        <ul>
            @foreach($tasks as $task)
                <li class="mb-2">{{ $task->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection
