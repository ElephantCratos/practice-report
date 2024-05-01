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

    <div class="container">
        <div class="row">
            <div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Создать роль</h5>
                    </div>
                    <div class="card-body">

                        <div style="color:white">
                            <form method="post" action="{{route('roles.store')}}">
                                @csrf
                                <div class="form-group ">
                                    <label for="inputTitle">Title</label>
                                    <input type="text" class="form-control" id="inputTitle" name="name">
                                </div>
                                @foreach($permissions as $permission)
                                    <div class="flex items-center ">
                                        <input type="checkbox" value="{{$permission -> id}}" name="permissions[]" id="RolesCheckbox{{$permission -> id}}" class="w-6 h-6 mb-3 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="RolesCheckbox{{$permission -> id}}" class="ms-2 mb-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{$permission -> name}}</label>
                                    </div>
                                @endforeach
                                <button type="submit" class="btn btn-primary" name="submitForm">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
