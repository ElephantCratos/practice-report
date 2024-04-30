@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Traits</h1>
        <ul>
            @foreach($traits as $trait)
                <li class="mb-2">{{ $trait->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection
