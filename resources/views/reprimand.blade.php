@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Reprimands</h1>
        <ul>
            @foreach($reprimands as $reprimand)
                <li class="mb-2">{{ $reprimand->description }}</li>
            @endforeach
        </ul>
    </div>
@endsection
