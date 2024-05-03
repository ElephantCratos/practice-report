<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task') }}
        </h2>
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (session('success'))
                <div class="alert-container">
                    {{ session('success') }}
                </div>
            @endif
        </h3>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 justify-center items-center" style="display:flex;">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg items-center p-5 w-full">
                <table class="bg-gray-700 w-full">
                    <tr class="">
                        <th class="border-2 border-slate-300 p-5 text-white text-center">Описание задачи</th>
                        <th class="border-2 border-slate-300 p-5 text-white text-center">Дата создания задачи</th>
                        <th class="border-2 border-slate-300 p-5 text-white text-center">кому назначена</th>
                        <th class="border-2 border-slate-300 p-5 text-white text-center">статус</th>
                        <th class="border-2 border-slate-300 p-5 text-white text-center">Изменение</th>
                    </tr>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr class="items-center">
                            <td class="border-2 border-slate-300 p-5 text-white text-center">{{ $task->description }}</td>
                            <td class="border-2 border-slate-300 p-5 text-white text-center">{{ $task->date}}</td>
                            <th class="border-2 border-slate-300 p-5 text-white text-center">{{ $task->practice->student->full_name}}-{{ $task->practice->practice->practice_name}}</th>
                            <th class="border-2 border-slate-300 p-5 text-white text-center">{{ $task->status}}</th>
                            <td class="border-2 border-slate-300 p-5 text-white text-center">
                                
                                <form method="POST" action="{{ route('Task.delete', $task->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-5 border border-red-700 rounded">Удалить</button>
                                </form>
                                 <form action="{{ route('Task.edit', $task->id) }}">
                                    @csrf
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-5 border border-green-700 rounded">Изменить</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    <a href="{{ route('Task.create') }}"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded">Добавить новый блок</button></a>
                </div>
                <div class="mt-4">
                    <form action="{{ route('tasks.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex items-center mb-4">
                            <label for="student_practice_id" class="mr-2">Выберите студента:</label>
                            <select name="student_practice_id" id="student_practice_id" class="rounded border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($practiceStudents as $student)
                                    <option value="{{ $student->id }}">{{ $student->practice->practice_name}}-{{ $student->student->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center mb-4">
                            <input type="file" name="csv_file" accept=".csv" class="mr-2">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Импорт задач</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
