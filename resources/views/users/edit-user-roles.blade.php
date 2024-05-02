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

    <div class="container">
        <div class="card">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Назначить/Удалить роли') }}
            </h2>
            <div class="card-body">

                <div class="mb-8 mt-3">
                    <p>Имя пользователя: <span class="form-control">{{ $user->name }}</span></p>
                </div>

                <div class="mb-10">
                    <p>Email пользователя: <span class="form-control">{{ $user->email }}</span></p>
                </div>


                <div class="mb-4">
                    <p class="block text-gray-700 text-sm font-bold mb-2">Роли пользователя:</p>
                    @if($user->roles)
                    <ul>
                        @foreach ($user->roles as $role)
                        <li class="mb-4"><span class="form-control">{{ $role->name }}</span></li>
                        @endforeach
                    </ul>
                    @endif

                </div>

                <form action="{{ route('users.assignRole', $user->id) }}" method="post" class="form-group mb-10">
                    @csrf
                    <div class="form-group">
                        <label for="role_id" class="block text-gray-700 text-sm font-bold">Выберите роль для назначения:</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded">Назначить роль</button>
                </form>

                <form action="{{ route('users.removeRole', $user->id) }}" method="post" class="form-group mb-10">
                    @csrf
                    <div class="form-group">
                        <label for="role_id" class="block text-gray-700 text-sm font-bold mb-2">Выберите роль для удаления:</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @if($user->roles)
                            @foreach ($user->roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded">Удалить роль</button>
                </form>

                <form action="{{ route('users.updatePosition', $user->id) }}" method="post" class="form-group mb-10">
                    @csrf
                    <div class="form-group">
                        <label for="position" class="block text-gray-700 text-sm font-bold mb-2">Изменить должность</label>
                        <input type="text" name="position" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 w-1/3" value="{{$user->position}}" required></input>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Назначить</button>
                </form>

                <div>
                    <a href="{{ route('roles.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Просмотреть все роли</a>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>