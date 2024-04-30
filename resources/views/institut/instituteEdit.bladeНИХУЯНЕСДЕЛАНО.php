@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Institutes</h1>
        <ul>
            @foreach($institutes as $institute)
                <li class="mb-2">{{ $institute->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection
