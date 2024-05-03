<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Groups') }}
            </h2>
            <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (session('success'))
        <div class="alert-container">
            {{ session('success') }}
        </div>
    @endif
        </h3>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center items-center flex">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg items-center p-5 w-full">
                <table class="bg-gray-700 w-full">
                    <tr class="">
                        <th class="border-2 border-slate-300 p-5 text-white text-center">Группа</th>
                        <th class="border-2 border-slate-300 p-5 text-white text-center">Курс</th>
                        <th class="border-2 border-slate-300 p-5 text-white text-center">Направление</th>
                        <th class="border-2 border-slate-300 p-5 text-white text-center">Изменение</th>
                    </tr>
                    <tbody>
                        @foreach ($group as $Group)
                        <tr class="items-center">
                            <td class="border-2 border-slate-300 p-5 text-white text-center">{{ $Group->name}}</td>
                            <td class="border-2 border-slate-300 p-5 text-white text-center">{{ $Group->course->name}}</td>
                            <td class="border-2 border-slate-300 p-5 text-white text-center">{{ $Group->trainingDirections->name}}</td>
                            <td class="border-2 border-slate-300 p-5 text-white text-center">
                                <a href="{{ route('Group.edit', $Group->id) }}">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Изменить</button>
                                </a>
                                <form method="POST" action="{{ route('Group.delete', $Group->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-5 border border-red-700 rounded">Удалить</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    <a href="{{ route('Group.create') }}"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded">Добавить новый блок</button></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
