<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </h3>
    </x-slot>

    <div class="w-1/5 mx-auto py-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="place-content-center">
                <div class="card-header">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Создать роль</label>
                </div>
                <div class="card-body flex items-center">
                    <form method="post" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="flex flex-col form-group mb-3">
                            <label for="inputTitle">Название</label>
                            <input type="text" class="form-conpx-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 w-2/3" id="inputTitle" name="name">
                        </div>
                        @foreach($permissions as $permission)
                        <div class="flex items-center mb-3">
                            <input type="checkbox" value="{{ $permission->id }}" name="permissions[]" id="RolesCheckbox{{ $permission->id }}" class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="RolesCheckbox{{ $permission->id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $permission->name }}</label>
                        </div>
                        @endforeach
                        <div class="items-center">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded" type="submit" name="submitForm">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>