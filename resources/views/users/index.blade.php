<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center items-center " style="display:flex;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg items-center p-5 w-full"     >

                <table class="bg-gray-700 w-full">
                    <thead>
                    <tr class="text-white">
                        <th class="border-2 border-slate-300 p-5 text-center">Id</th>
                        <th class="border-2 border-slate-300 p-5 text-center">Имя</th>
                        <th class="border-2 border-slate-300 p-5 text-center">Email</th>
                        <th class="border-2 border-slate-300 p-5 text-center">Роли</th>
                        <th class="border-2 border-slate-300 p-5 text-center">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr class="items-center">
                            <td class="border-2 border-slate-300 p-5 text-center text-white">{{ $user->id }}</td>
                            <td class="border-2 border-slate-300 p-5 text-center text-white">{{ $user->name }}</td>
                            <td class="border-2 border-slate-300 p-5 text-center text-white">{{ $user->email }}</td>
                            <td class="border-2 border-slate-300 p-5 text-center text-white flex-col">
                                @if($user->roles)
                                @foreach ($user->roles as $role)
                                    <h2 class="p-1">{{ $role->name }},</h2>
                                @endforeach
                                    @endif
                            </td>
                            <td class="border-2 border-slate-300 p-5 text-center items-center">
                                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 underline">Изменить роли</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 underline">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
