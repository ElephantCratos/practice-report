@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Practices</h1>
        <ul>
            @foreach($practices as $practice)
                <li class="mb-2">{{ $practice->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection
