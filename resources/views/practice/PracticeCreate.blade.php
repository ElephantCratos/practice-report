<x-app-layout>
    @if (session('success'))
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
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 m-auto">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form method="POST" action="{{ route('Practice.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="practice_name" class="block text-gray-700 text-sm font-bold mb-2">Название практики</label>
                    <input type="text" name="practice_name" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="mb-4">
                    <label for="practice_type_id"> Тип практики</label>
                    <select name="practice_type_id" class="form-control">
                        @foreach($practiceTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="group_id">Группа, привязанная к практике</label>
                    <select name="group_id" class="form-control">
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="practice_sort_id">Тип практики</label>
                    <select name="practice_sort_id" class="form-control">
                        @foreach($practiceSorts as $sort)
                            <option value="{{ $sort->id }}">{{ $sort->name }}</option>
                        @endforeach
                    </select>
                </div>
                <label for="toppings" class="block text-gray-700 text-sm font-bold mb-2">Выберите организации, в которых будут проходить практики</label>
                <div id="toppings" class="text-gray-700 mb-10">
                @foreach ($practicePlaces as $place)
                        <div class="topping">
                            <label><input type="checkbox" name="$practicePlaces[]" value="{{ $place->id }}">{{ $place->name }} - {{$place->address}}</label>
                        </div>
                @endforeach
                </div>

                <div>
                <label for="start_date"  class="block text-gray-700 text-sm font-bold mb-2">Дата начала практики</label>
                <input type="date" name="start_date">
                </div>

                <div>
                    <label for="end_date"  class="block text-gray-700 text-sm font-bold mb-2">Дата окончания  практики</label>
                    <input type="date" name="end_date">
                </div>

                <div>
                    <label for="order_number"  class="block text-gray-700 text-sm font-bold mb-2">Номер приказа</label>
                    <input type="text" name="order_number">
                </div>

                <div>
                    <label for="order_date"  class="block text-gray-700 text-sm font-bold mb-2">Дата приказа</label>
                    <input type="date" name="order_date">
                </div>

                <div class="mb-4">
                    <label for="practice_head_ugrasu_id">Глава практики ЮГУ     </label>
                    <select name="practice_head_ugrasu_id" class="form-control">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="practice_head_enterprice_id">Глава интерпрайз хуй важный</label>
                    <select name="practice_head_enterprice_id" class="form-control">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                        @endforeach
                    </select>
                </div>




                <button class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" type="submit" name="submitForm" class="bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">Submit</button>

            </form>
        </div>
    </div>
</x-app-layout>