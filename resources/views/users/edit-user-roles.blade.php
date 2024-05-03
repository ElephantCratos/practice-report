<x-app-layout>

    @if (session('status'))
    <div class="alert-container bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        {{ session('status') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 m-auto py-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Назначить/Удалить роли') }}
            </h2>
            <div class="card-body">

                <div class="mb-8 mt-3">
                    <p class="mb-3">Имя пользователя: <span class="form-control">{{ $user->name }}</span></p>
                    <p class="mb-3">Email пользователя: <span class="form-control">{{ $user->email }}</span></p>
                    <p class="block text-gray-700 text-sm font-bold mb-2">Роли пользователя:</p>
                    @if($user->roles)
                    <ul>
                        @foreach ($user->roles as $role)
                        <li class="ml-4 mb-2 list-disc"><span class="form-control">{{ $role->name }}</span></li>
                        @endforeach
                    </ul>
                    @endif
                </div>

                <div class="flex place-content-center">
                    <form action="{{ route('users.assignRole', $user->id) }}" method="post" class="mt-3 flex flex-colm mr-3 mb-3 form-group">
                        @csrf
                        <div class="flex flex-col mt-3 mr-3 mb-3 form-group">
                            <label for="role_id" class="block text-gray-700 text-sm font-bold mb-2">Выберите роль для назначения:</label>
                            <select name="role_id" id="role_id" class="form-control mb-3">
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 border border-green-700 rounded mb-3">Назначить роль</button>
                            <a href="{{ route('roles.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Просмотреть все роли</a>
                        </div>
                    </form>

                    <form action="{{ route('users.removeRole', $user->id) }}" method="post" class="mt-3 flex flex-colm mr-3 mb-3 form-group">
                        @csrf
                        <div class="flex flex-col mt-3 mr-3 mb-3 form-group">
                            <label for="role_id" class="block text-gray-700 text-sm font-bold mb-2">Выберите роль для удаления:</label>
                            <select name="role_id" id="role_id" class="form-control mb-3">
                                @if($user->roles)
                                @foreach ($user->roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                                @endif
                            </select>
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 border border-red-700 rounded">Удалить роль</button>
                        </div>
                    </form>
                </div>

                <div class="flex place-content-center">
                    <form action="{{ route('users.updatePosition', $user->id) }}" method="post" class="mt-3 flex flex-colm mr-3 mb-3 form-group">
                        @csrf
                        <div class="flex flex-col mt-3 mr-3 mb-3 form-group">
                            <label for="position" class="block text-gray-700 text-sm font-bold mb-2">Изменить должность</label>
                            <input type="text" name="position" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 w-100 mb-3" value="{{$user->position}}" required></input>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Назначить</button>
                        </div>
                    </form>


                    @if($user->hasRole('student'))
                    <form method="POST" action="{{ route('users.updateGroup', $user->id) }}" class="mt-3 flex flex-colm mr-3 mb-3 form-group">
                        @csrf
                        <div class="form-group">
                            <label for="group" class="block text-gray-700 text-sm font-bold mb-2">Изменить группу</label>
                            <select name="group_id" id="group" class="form-control mb-3">
                                @foreach ($groups as $group)
                                <option value="{{ $group->id }}" @if($group->id == $user->group_id) selected="selected" @endif>{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Изменить</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>