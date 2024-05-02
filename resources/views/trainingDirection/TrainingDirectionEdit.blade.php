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
            <form method="POST" action="{{ route('TrainingDirection.update', $trainingDirection->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Направление</label>
                    <input type="text" name="name" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 w-2/3" value="{{ $trainingDirection->name }}" required></input>
                </div>
                <div class="mb-4 flex">
                    <div class="flex flex-col mt-3 mr-5 mb-3">
                        <label for="institute_id">Институт</label>
                        <select name="institute_id" class="form-control">
                            @foreach($institute as $Institute)
                            <option value="{{ $Institute->id }}" @if($Institute->name == $trainingDirection->institute->name) selected @endif>{{ $Institute->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col mt-3 mr-5 mb-3">
                        <label for="head_OPOP_id">Руководитель ОПОП</label>
                        <select name="head_OPOP_id" class="form-control">
                            @foreach($heads_OPOP as $head_OPOP)
                            <option value="{{ $head_OPOP->id }}" @if($head_OPOP->full_name == $trainingDirection->head_OPOP->full_name) selected @endif>{{ $head_OPOP->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded" type="submit" name="submitForm" class="bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">Submit</button>


            </form>
        </div>
    </div>
</x-app-layout>