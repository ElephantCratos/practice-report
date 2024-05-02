<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Роли') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-700">
                    @if (session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($roles as $role)
                        @if ($role->name != "SuperAdmin")
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-md mb-4">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $role->name }}</h3>
                                    <div class="flex">
                                        <a href="{{ route('roles.edit', $role->id) }}" class="text-blue-500 underline mr-4">Изменить</a>
                                        
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 underline">Удалить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <a href="{{ route('roles.create') }}" class="text-green-500 underline block mt-5">Добавить новую роль</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
