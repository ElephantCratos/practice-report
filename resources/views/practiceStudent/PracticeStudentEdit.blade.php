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
            <form method="POST" action="{{ route('PracticeStudent.update', $practiceStudent->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="FIO">ФИО студента</label>
                    <p name="FIO" class="text-2xl">{{$practiceStudent->student->full_name}}</p>
                </div>

                <div class="mb-4">
                    <label for="volume_id"> Объем выполненной работы </label>
                    <select name="volume_id" class="form-control">
                        @foreach($volumes as $volume)
                        <option value="{{ $volume->id }}" @if($volume->id == $practiceStudent->volume_id) selected="selected" @endif >{{ $volume->description }} - {{ $volume->score->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="traits_id"> Какие качества были продемонстрированы в ходе работы </label>
                    <select name="traits_id" class="form-control w-full">
                        @foreach($traits as $trait)
                        <option value="{{ $trait->id }}" @if($trait->id == $practiceStudent->trait_id) selected="selected" @endif >{{ $trait->description }} - {{$trait->score->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="trouble_id"> Качества, продемострированные при решение проблем</label>
                    <select name="trouble_id" class="form-control">
                        @foreach($troubles as $trouble)
                        <option value="{{ $trouble->id }}" @if($trouble->id == $practiceStudent->trouble_id) selected="selected" @endif >{{ $trouble->description }} - {{ $trouble->score->name }}</option>
                        @endforeach
                    </select>
                </div>



                <div class="mb-4">
                    <label for="score_id"> Оценка</label>
                    <select name="score_id" id="score_id" onchange="checkScore(this)" class="form-control">
                        @foreach($scores as $score)
                        <option value="{{ $score->id }}" @if($score->id == $practiceStudent->score_id) selected="selected" @endif >{{ $score->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="practice_place"> Место прохождения практики студентом</label>
                    <select name="practice_place" class="form_control">
                        @foreach ($practiceStudent->practice->places as $place)
                        <option value="{{$place->id}}" @if($place->id == $practiceStudent->practice_place) selected="selected" @endif > {{ $place->name }} - {{$place->address}} </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="practiceHeadsOrganization"> Руководитель практики</label>
                    <select name="practiceHeadsOrganization" class="form_control">
                        @foreach ($practiceHeadsOrganization as $practiceHeadOrganization)
                        <option value="{{$practiceHeadOrganization->id}}" @if($practiceHeadOrganization->id == $practiceStudent->practice_head->id) selected="selected" @endif > {{ $practiceHeadOrganization->full_name }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="reprimand">Замечания </label>
                    <textarea name="reprimand" id="reprimand">{{$practiceStudent->reprimand}}</textarea>
                </div>

                <div class="mb-4">
                    <label><input type="checkbox" name="paid" @if($practiceStudent->paid) checked @endif">Оплачиваемая практика</label>
                </div>


                <div class="mb-4">
                    <label><input type="checkbox" name="isReady" @if($practiceStudent->isReady) checked @endif">Данные актуальны и документ готов к печати</label>
                </div>

                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded" type="submit" name="submitForm">Submit</button>

                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" type="button" onclick="shuffleFields()">Перемешать все в соответствие с оценкой</button>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    function shuffleFields() {
        var selectedScore = document.querySelector('select[name="score_id"] option:checked').text;

        var volumeField = document.querySelector('select[name="volume_id"]');
        var volumeOptions = volumeField.options;
        var randomVolume = getRandomOptionIndex(volumeOptions, selectedScore);
        volumeField.selectedIndex = randomVolume;

        var traitField = document.querySelector('select[name="traits_id"]');
        var traitOptions = traitField.options;
        var randomTrait = getRandomOptionIndex(traitOptions, selectedScore);
        traitField.selectedIndex = randomTrait;

        var troubleField = document.querySelector('select[name="trouble_id"]');
        var troubleOptions = troubleField.options;

        var randomTrouble = getRandomOptionIndex(troubleOptions, selectedScore);
        troubleField.selectedIndex = randomTrouble;
    }

    function getRandomOptionIndex(options, selectedScore) {
        var validOptions = [];

        for (var i = 0; i < options.length; i++) {
            if (options[i].textContent.endsWith(selectedScore)) {
                validOptions.push(i);
            }
        }
        console.log(validOptions);
        var randomIndex = Math.floor(Math.random() * validOptions.length);
        return validOptions[randomIndex];
    }

    function checkScore(selectScore) {

        var rep = document.getElementById("reprimand");

        if (selectScore.value == 1) {
            rep.setAttribute('required', true);
        } else {
            rep.removeAttribute('required');
        }
    }

    addEventListener("DOMContentLoaded", (event) => {
        const selectedScore = document.querySelector('select[name="score_id"] option:checked').text;
        const rep = document.getElementById("reprimand");
        console.log(selectedScore);
        if (selectedScore == 'Неудовлетворительно') {
            rep.setAttribute('required', true);
        }
    });
</script>