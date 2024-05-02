<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Данные о практике студента') }}
        </h2>
    </x-slot>
    <section>
        <section >
        <div class="mt-4">
            @foreach ($practiceStudent as $student)
            <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8 m-auto">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <div class="bg-white border-b border-gray-200">
                        <div class="flex flex-col">
                            <div class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                        <div class="mb-4">
                            <div class="font-bold">Объем выполненной работы:</div>
                            @if($student->volume)
                                <div>{{ $student->volume->description }}</div>
                            @else
                                <div>Нет данных</div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <div class="font-bold">Какие качества были продемонстрированы в ходе работы:</div>
                            @if($student->trait)
                            <div>{{ $student->trait->description }}</div>
                            @else
                            <div>Нет данных</div>
                            @endif
                        </div>
                        <div class="mb-4">
                            <div class="font-bold">Качества, продемострированные при решении проблем:</div>
                            @if($student->troubles)
                            <div>{{ $student->troubles->description }}</div>
                            @else
                            <div>Нет данных</div>
                            @endif

                        </div>
                        <div class="mb-4">
                            <div class="font-bold">Тип контракта:</div>
                            @if($student->contract_type)
                            <div>{{ $student->contract_type->name }}</div>
                            @else
                            <div>Нет данных</div>
                            @endif
                        </div>
                        <div class="mb-4">
                            <div class="font-bold">Оценка:</div>
                            @if($student->score)
                            <div>{{ $student->score->name }}</div>
                            @else
                            <div>Нет данных</div>
                            @endif
                        </div>
                        <div class="mb-4">
                            <div class="font-bold">Место прохождения практики студентом:</div>
                            @if($student->place)
                            <div>{{ $student->place->name }} - {{ $student->place->address }}</div>
                            @else
                            <div>Нет данных</div>
                            @endif
                        </div>
                        <div class="mb-4">
                            <div class="font-bold">Замечания:</div>
                            @if($student->reprimand)
                            <div>{{ $student->reprimand }}</div>
                            @else
                            <div>Нет данных</div>
                            @endif
                        </div>
                        <div class="mb-4">
                            <div class="font-bold">Оплачиваемая практика:</div>
                            <div>{{ $student->paid ? 'Да' : 'Нет' }}</div>
                        </div>
                        <div class="mb-4">
                            <div class="font-bold">Данные актуальны и документ готов к печати:</div>
                            <div>{{ $student->isReady ? 'Да' : 'Нет' }}</div>
                        </div>
                    @if(auth()->user()->can('edit articles') && $some_other_condition)

                    <form action="{{ route('PracticeStudent.delete', $student->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded">Удалить</button>
                                </form>
                    <form action="{{ route('PracticeStudent.edit', $student->id) }}">
                                @csrf

                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Изменить</button>
                                </form>
                                </form>
                                
                                @endif
                                @if($student->isReady)
                           
                                <div class="mt-4">
                                    <a href="{{ route('downloadDocx.ind', $student->id) }}">
                                        скачать
                                    </a>
                                </div>
                                @endif
                                
                            </div>
                           
                            </div>
                </div>
            </div>
            </div>
             @endforeach
        </div>
        
    </section>
</x-app-layout>

