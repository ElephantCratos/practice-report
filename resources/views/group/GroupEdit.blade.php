<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 m-auto">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form method="POST" action="{{ route('Group.update', $group->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Название</label>
                    <input type="text" name="name" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 w-1/3" value="{{ $group->name }}" required></input>
                </div>
                <div class="mb-4 flex">
                    <div class="flex flex-col mt-3 mr-3 mb-3">
                        <label for="training_direction_id">Направление</label>
                        <select name="training_direction_id" class="form-control">
                            @foreach($trainingDirection as $TrainingDirection)
                            <option value="{{ $TrainingDirection->id }}" @if($TrainingDirection->name == $group->trainingDirections->name) selected @endif>{{ $TrainingDirection->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col mt-3 mr-3 mb-3">
                        <label for="course_id">Курс</label>
                        <select name="course_id" class="form-control">
                            @foreach($course as $Course)
                            <option value="{{ $Course->id }}" @if($Course->name == $group->course->name) selected @endif>{{ $Course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded" type="submit" name="submitForm" class="bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">Submit</button>

            </form>
        </div>
    </div>
</x-app-layout>