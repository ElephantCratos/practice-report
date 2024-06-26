<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Пользователи') }}
        </h2>
    </x-slot>
                @php
                    $adminRoles = ['admin', 'head_ugrasu', 'head_OPOP', 'head_enterprice', 'student'];
                    $headOPOPRoles = ['head_enterprice', 'head_ugrasu', 'student'];
                @endphp
    <div class="py-8">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg items-center p-5 w-full">
                <table class="bg-gray-700 w-full">
                    <thead>
                        <tr class="bg-gray-700 text-white ">
                            <th class="border-2 border-slate-300 p-5 text-white text-center">Id</th>
                            <th class="border-2 border-slate-300 p-5 text-white text-center">Имя</th>
                            <th class="border-2 border-slate-300 p-5 text-white text-center">ФИО</th>
                            <th class="border-2 border-slate-300 p-5 text-white text-center">Должность</th>
                            <th class="border-2 border-slate-300 p-5 text-white text-center">Email</th>
                            <th class="border-2 border-slate-300 p-5 text-white text-center">Роли</th>
                            <th class="border-2 border-slate-300 p-5 text-white text-center">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @php
                                $visibleRoles = [];
                                if (auth()->user()->hasRole('admin')) {
                                    $visibleRoles = $adminRoles;
                                } elseif (auth()->user()->hasRole('head_OPOP')) {
                                    $visibleRoles = $headOPOPRoles;
                                }
                            @endphp
                        @endforeach
                        
                        @foreach ($users as $user)
                        @if ($user->roles->pluck('name')->intersect($visibleRoles)->count() > 0)
                        <tr class="">
                            <td class="border-2 border-slate-300 p-5 text-white text-center">{{ $user->id }}</td>
                            <td class="border-2 border-slate-300 p-5 text-white text-center max-w-[300px] overflow-hidden text-ellipsis whitespace-nowrap">{{ $user->name }}</td>
                            <td class="border-2 border-slate-300 p-5 text-white text-center">{{ $user->full_name}}</td>
                            <td class="border-2 border-slate-300 p-5 text-white text-center">{{ $user->position}}</td>
                            <td class="border-2 border-slate-300 p-5 text-white text-center max-w-[300px] overflow-hidden text-ellipsis whitespace-nowrap">{{ $user->email }}</td>
                            <td class="border-2 border-slate-300 p-5 text-white text-center">
                                @foreach ($user->roles as $role)
                                    @if (in_array($role->name, $visibleRoles))
                                        <h2 class="p-1">{{ $role->name }},</h2>
                                    @endif
                                @endforeach
                            </td>
                            <td class="border-2 border-gray-300 p-3 text-center">
                                <a href="{{ route('users.edit', $user->id) }}">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-auto py-2 px-1 rounded mb-2">Изменить</button>
                                </a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                @if(session('registrationLink'))
                <div class="flex flex-col mt-3 mr-3 mb-3">
                    <label for="registrationLink">Ссылка регистрации:</label>
                    <input type="text" id="registrationLink" value="{{session('registrationLink')}}" readonly>
                </div>
                @endif
                <div class="flex">
                    <form id="generateLinkForm" class="mt-3 flex flex-col mr-3 mb-3" action="{{route('generateLink')}}" method="POST">
                        <div class="flex flex-col mt-3 mr-3 mb-3 animate-bounce">
                            @csrf
                            @method('POST')
                            <label for="role">Выберите роль:</label>
                            <select id="roleSelect" name="role" class="form-control px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 w-100 mb-3">
                                @foreach ($roles as $role)
                                    @if (auth()->user()->hasRole('admin') && in_array($role->name, $adminRoles))
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @elseif (auth()->user()->hasRole('head_OPOP') && in_array($role->name, $headOPOPRoles))
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 border border-green-700 rounded" type="submit">Создать ссылку регистрации</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>