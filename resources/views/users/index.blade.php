<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Пользователи') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-700">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-700 text-white">
                                <th class="border-2 border-gray-300 p-3 text-center">Id</th>
                                <th class="border-2 border-gray-300 p-3 text-center">Имя</th>
                                <th class="border-2 border-gray-300 p-3 text-center">Email</th>
                                <th class="border-2 border-gray-300 p-3 text-center">Роли</th>
                                <th class="border-2 border-gray-300 p-3 text-center">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="bg-white">
                                <td class="border-2 border-gray-300 p-3 text-center">{{ $user->id }}</td>
                                <td class="border-2 border-gray-300 p-3 text-center">{{ $user->name }}</td>
                                <td class="border-2 border-gray-300 p-3 text-center">{{ $user->email }}</td>
                                <td class="border-2 border-gray-300 p-3 text-center">
                                    @if($user->roles)
                                    @foreach ($user->roles as $role)
                                    <h2 class="p-1">{{ $role->name }},</h2>
                                    @endforeach
                                    @endif
                                </td>
                                <td class="border-2 border-gray-300 p-3 text-center">
                                    <a href="{{ route('users.edit', $user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-5 px-1 rounded mb-2">Изменить роли</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post" class="inline-block">
                                        
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
