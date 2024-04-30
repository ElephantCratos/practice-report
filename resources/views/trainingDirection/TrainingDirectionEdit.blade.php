<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 m-auto">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form method="POST" action="{{ route('TrainingDirection.update', $trainingDirection->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Направление</label>
                    <textarea name="name" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>{{ $trainingDirection->name }} </textarea>
                </div>
                <select name="institute_id" class="form-control">
                    @foreach($institute as $Institute)
                    <option value="{{ $Institute->id }}" @if($Institute->name == $trainingDirection->institute->name) selected @endif>{{ $Institute->name }}</option>
                    @endforeach
                </select>
                <select name="head_OPOP_id" class="form-control">
                    @foreach($head_OPOP as $User)
                    <option value="{{ $User->id }}" @if($User->full_name == $trainingDirection->users->full_name) selected @endif>{{ $User->name }}</option>
                    @endforeach
                </select>
                <button class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" type="submit" name="submitForm" class="bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">Submit</button>

            </form>
        </div>
    </div>
</x-app-layout>