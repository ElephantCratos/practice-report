<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Institutes') }}
            </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center items-center " style="display:flex;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg items-center p-5 w-full">
                <table class="bg-gray-700 w-full">
                    <tr class="">
                        <th class="border-2 border-slate-300 p-5 text-white text-center">Название</th>
                        <th class="border-2 border-slate-300 p-5 text-white text-center">Изменение</th>
                    </tr>
                    <tbody>
                        @foreach ($institute as $Institute)
                        <tr class="items-center">
                            <td class="border-2 border-slate-300 p-5 text-white text-center">{{ $Institute->name}}</td>
                            <td class="border-2 border-slate-300 p-5 text-white text-center">
                                <a href="{{ route('Institute.edit', $Institute->id) }}" class="text-blue-500 underline">Изменить</a>
                                <form method="POST" action="{{ route('Institute.delete', $Institute->id) }}">
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
                    <a href="{{ route('Institute.create') }}"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded">Добавить новый блок</button></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>