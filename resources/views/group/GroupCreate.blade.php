<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 m-auto">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form method="POST" action="{{ route('Group.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Название</label>
                    <textarea name="name" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" value="" required> </textarea>
                </div>
                <div class="mb-4">
                    <label for="category"></label>
                    <select name="training_direction_id" class="form-control">
                        @foreach($trainingDirection as $TrainingDirection)
                        <option value="{{ $TrainingDirection->id }}">{{ $TrainingDirection->name }}</option>
                        @endforeach
                    </select>
                    <select name="course_id" class="form-control">
                        @foreach($course as $Course)
                        <option value="{{ $Course->id }}">{{ $Course->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" type="submit" name="submitForm" class="bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">Submit</button>

            </form>
        </div>
    </div>
</x-app-layout>