@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Training Directions</h1>
        <ul>
            @foreach($trainingDirections as $direction)
                <li class="mb-2">{{ $direction->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection
