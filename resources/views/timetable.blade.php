<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Расписание' ) }}
            {{ $tutor->name }}
            ({{ $tutor->subject->name }})
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-fixed w-full">
                        <tbody>
                            @for ($w = 1; $w <= 4; $w++)
                                    <tr class="h-40">
                                        @for ($d = 1; $d <= 7; $d++)
                                            @foreach ($timetable as $event)
                                                @if ($event->day == $d && $event->week == $w)
                                                    <td class="text-center border-solid border hover:border-solid rounded-md">
                                                        <div class="">{{$d}} день {{$w}} неделя</div>
                                                        <div class="">{{$event->subject->name}}</div>
                                                        <div class="">{{$event->user->name}}</div>
                                                        @if ($event->isAccept)
                                                            <div class="">Принято</div>
                                                        @else
                                                            <div class="">Ожидание</div>
                                                        @endif
                                                        <button class="text-green-600">Принять</button>
                                                        <button class="text-red-600">Отклонить</button>
                                                    </td>
                                                @else
                                                    <td class="text-center border-solid border hover:border-solid rounded-md">
                                                        <div class="">{{$d}} день {{$w}} неделя</div>
                                                        <button class="text-yellow-600">Свободно</button>
                                                    </td>
                                                @endif
                                            @endforeach
                                        @endfor
                                    </tr>
                            @endfor
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
