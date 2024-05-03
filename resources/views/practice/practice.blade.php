<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Practice list') }}
        </h2>
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (session('success'))
            <div class="alert-container">
                {{ session('success') }}
            </div>
            @endif
        </h3>
    </x-slot>

    @role('head_OPOP')
    @php 
    
    $arr = [];

    foreach ($practices as $practice)
    {
        if ($practice->group->trainingDirections->head_OPOP->id == auth()->user()->id)
        {
            array_push($arr, $practice);
        }    
    }
    
    $practices = $arr;

    @endphp
    @endrole
    
    @if(auth()->user()->hasRole('head_OPOP'))
    <div class="mt-4">
        <a href="{{ route('Practice.create') }}"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded">Добавить новый блок</button></a>
    </div>
    @endif

    @foreach($practices as $practice)

    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8 m-auto">

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

            <div class="flex flex-col">

                <div class="text-center mb-6">

                    <h2 class="text-2xl font-bold">Информация о практике</h2>

                </div>

                <div class="grid grid-cols-2 gap-4">

                    <div class="col-span-1">

                        <h2 class="text-lg font-semibold">Основные данные</h2>

                        <div class="mt-4">

                            <p><span class="font-semibold">Имя практики:</span> {{ $practice->practice_name }}</p>
                            <p><span class="font-semibold">Начало практики:</span> {{ $practice->start_date }}</p>
                            <p><span class="font-semibold">Конец практики:</span> {{ $practice->end_date }}</p>
                            <p><span class="font-semibold">Номер приказа:</span> {{ $practice->order_number }}</p>
                            <p><span class="font-semibold">Дата приказа:</span> {{ $practice->order_date }}</p>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <h2 class="text-lg font-semibold">Связанные данные</h2>
                        <div class="mt-4">
                            <p><span class="font-semibold">Места практики:</span>
                                @foreach($practice->places as $place)
                                {{ $place->name }} ({{ $place->address }})@if (!$loop->last), @endif
                                @endforeach
                            </p>
                            <p><span class="font-semibold">Глава практики в ЮГРАСУ:</span> {{ $practice->head_ugrasu->full_name }}</p>
                            <p><span class="font-semibold">Глава практики в интерпрайзе:</span> {{ $practice->head_enterprise->full_name }}</p>
                            <p><span class="font-semibold">Тип практики:</span> {{ $practice->sort->name }}</p>
                            <p><span class="font-semibold">Вид практики:</span> {{ $practice->type->name }}</p>
                            <p><span class="font-semibold">Группа, привязанная к практике:</span> {{ $practice->group->name }}</p>
                        </div>
                    </div>
                </div>
                 
                @if(auth()->user()->hasRole('head_OPOP'))
                <div class="mt-4">
                    <a href="{{ route('Practice.edit', $practice->id) }}">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Изменить</button>
                    </a>
                    <form action="{{ route('Practice.delete', $practice->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-5 border border-red-700 rounded">Удалить</button>
                    </form>
                </div>
                @endif

            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>