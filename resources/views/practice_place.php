@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Practice Places</h1>
        <ul>
            @foreach($practicePlaces as $place)
                <li class="mb-2">{{ $place->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection
