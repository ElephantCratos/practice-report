<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 m-auto">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form method="POST" action="{{ route('Traits.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Шаблон</label>
                    <textarea name="description" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" value="" required> </textarea>
                </div>
                <div class="mb-4">
                    <label for="category">Оценка</label>
                                    <select name="score_id" class="form-control">
                                        @foreach($score as $Score)
                                            <option value="{{ $Score->id }}">{{ $Score->name }}</option>
                                        @endforeach
                                    </select>
                </div>


                <button class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" type="submit" name="submitForm" class="bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">Submit</button>

            </form>
        </div>
    </div>
</x-app-layout>
