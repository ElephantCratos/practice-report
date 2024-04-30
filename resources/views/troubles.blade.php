@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Troubles</h1>
        <ul>
            @foreach($troubles as $trouble)
                <li class="mb-2">{{ $trouble->description }}</li>
            @endforeach
        </ul>
    </div>
@endsection
