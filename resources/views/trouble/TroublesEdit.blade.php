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
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 m-auto">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form method="POST" action="{{ route('Troubles.update', $trouble->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Шаблон</label>
                    <textarea name="description" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>{{ $trouble->description }} </textarea>
                </div>
                <div class="mb-4">
                    <label for="category">Оценка</label>
                    <select name="score_id" class="form-control">
                        @foreach($score as $Score)
                        <option value="{{ $Score->id }}" @if($Score->name == $trouble->score->name) selected @endif>{{ $Score->name }}</option>
                        @endforeach
                    </select>
                </div>


                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded" type="submit" name="submitForm">Submit</button>

            </form>
        </div>
    </div>
</x-app-layout>