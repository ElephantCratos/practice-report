<x-app-layout>
    @foreach($practice as $shit)
        <div class="flex flex-col text-center ">
        <h2> Имя практики: {{$shit->practice_name }}</h2>
        <h2> Начало дата: {{$shit->start_date }}</h2>
        <h2> Конец дата: {{$shit->end_date }}</h2>
        <h2> Номер приказа: {{$shit->order_number }}</h2>
        <h2> Дата приказа:  {{$shit->order_date }}</h2>
        <h2> ИД группы:  {{$shit->group_id }}</h2>
        <h2> ИД важный хуй с югу: {{$shit->practice_head_ugrasu_id}}</h2>
        <h2> ИД важный хуй энтерпрайз: {{$shit->practice_head_enterprice_id}}</h2>
        <h2> ИД вид практики: {{$shit->practice_sort_id }}</h2>
        <h2> ИД тип практики: {{$shit->practice_type_id}}</h2>
            </div>
        <h3>Связи ебучие</h3>
            <div class="flex flex-col text-center">
                <h2> @foreach($shit->places as $place){{$place->name}}@endforeach</h2>
                <h2> {{$shit->head_ugrasu->full_name}} </h2>
                <h2>  {{$shit->head_enterprise->full_name}} </h2>
                <h2>   {{$shit->sort->name}}</h2>
                <h2>    {{$shit->type->name}}</h2>
                <h2>     {{$shit->group->name}}</h2>
            </div>
        @endforeach
</x-app-layout>

