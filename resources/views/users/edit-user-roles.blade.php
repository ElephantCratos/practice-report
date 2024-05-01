<x-app-layout>

    @if (session('status'))
        <div class="alert-container">
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
            <div class="card-title">Назначить/Удалить роли</div>
            <div class="card-body">
                <p class="mb-8 mt-3 text-white">Имя пользователя: <span class="form-control">{{ $user->name }}</span>
                </p>
                <p class="mb-8 text-white">Email пользователя: <span class="form-control">{{ $user->email }}</span></p>
                <p class="mb-3 text-white">Роли пользователя:</p>

                @if($user->roles)
                <ul>

                    @foreach ($user->roles as $role)

                        <li class="mb-8"><span class="form-control ">{{ $role->name }} </span></li>

                    @endforeach
                </ul>
                @endif

                <form action="{{ route('users.assignRole', $user->id) }}" method="post" class="form-group">
                    @csrf
                    <div class="form-group">
                        <label for="role_id" class="form-label">Выберите роль для назначения:</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Назначить роль</button>
                </form>

                <form action="{{ route('users.removeRole', $user->id) }}" method="post" class="form-group">
                    @csrf
                    <div class="form-group">
                        <label for="role_id" class="form-label">Выберите роль для удаления:</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @if($user->roles)
                            @foreach ($user->roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                                @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-delete">Удалить роль</button>
                </form>
            </div>
        </div>
    </div>

        </x-app-layout>

