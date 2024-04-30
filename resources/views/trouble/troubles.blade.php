<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Orders That Need Preparation') }}
            </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center items-center " style="display:flex;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg items-center p-5 w-full">
                <table class="bg-gray-700 w-full">
    <tr class="">
        <th class="border-2 border-slate-300 p-5 text-white text-center">Шаблон</th>
        <th class="border-2 border-slate-300 p-5 text-white text-center">Оценка</th>
        <th class="border-2 border-slate-300 p-5 text-white text-center">Изменение</th>
    </tr>
    <tbody>
    @foreach ($trouble as $Trouble)
        <tr class="items-center">
            <td class="border-2 border-slate-300 p-5 text-white text-center">{{ $Trouble->description }}</td>
            <td class="border-2 border-slate-300 p-5 text-white text-center">{{ $Trouble->score->name}}</td>
            <td class="border-2 border-slate-300 p-5 text-white text-center">
                <a href="{{ route('Troubles.edit', $Trouble->id) }}"class="text-blue-500 underline">Изменить</a>
                <form method="POST" action="{{ route('Troubles.delete', $Trouble->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-500 underline">Удалить</button>
                                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="mt-4">
    <a href="{{ route('Troubles.create') }}" class="text-green-500 underline">Добавить новый блок</a>
</div>
            </div>
        </div>
    </div>
</x-app-layout>
