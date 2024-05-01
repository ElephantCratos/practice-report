<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center items-center " style="display:flex;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg items-center p-5 w-full">

                @if (session('status'))
                    <div class="bg-white p-3 rounded-md mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                @foreach ($roles as $role)
                        @if ($role->name != "SuperAdmin")
                    <div class="bg-gray-600 p-4 rounded-md mb-4">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-lg font-semibold text-white">{{ $role->name }}</h3>
                            <div class="flex">
                                <a href="{{ route('roles.edit', $role->id) }}" class="text-blue-500 underline mr-4">Изменить</a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="post">
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

</x-app-layout>
