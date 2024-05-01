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
            <form method="POST" action="{{ route('TrainingDirection.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Направление</label>
                    <textarea name="name" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" value="" required> </textarea>
                </div>
                <div class="mb-4">
                    <label for="category"></label>
                    <select name="head_OPOP_id" class="form-control">
                        @foreach($head_OPOP as $User)
                        <option value="{{ $User->id }}">{{ $User->name }}</option>
                        @endforeach
                    </select>
                    <select name="institute_id" class="form-control">
                        @foreach($institute as $Institute)
                        <option value="{{ $Institute->id }}">{{ $Institute->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" type="submit" name="submitForm" class="bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">Submit</button>

            </form>
        </div>
    </div>
</x-app-layout>
