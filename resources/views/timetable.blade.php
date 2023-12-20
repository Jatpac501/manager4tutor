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
                                        @foreach([1, 2, 3, 4, 5, 6, 7] as $d)
                                            @php
                                                $event = App\Models\Timetable::where('week', $w)->where('day', $d)->first();
                                            @endphp
                                            @if ($event)
                                                <td class="text-center border-solid border hover:border-solid rounded-md">
                                                    <div class="">{{$d}} день {{$w}} неделя</div>
                                                    <div class="">{{$event->subject->name}}</div>
                                                    <div class="">{{$event->user->name}}</div>
                                                    @if ($event->isAccept)
                                                        <div class="">Принято</div>
                                                    @else
                                                        <div class="">Ожидание</div>
                                                        <form method="POST" action="{{ route('timetable.update', [$event->id]) }}" class="mb-3" autocomplete="off">
                                                            @csrf
                                                            @method('PUT')
                                                            <input name="isAccept" class="hidden" value="1" required>
                                                            <button class="text-green-600" type="submit">Принять</button>
                                                        </form>
                                                    @endif
                                                    <form method="POST" action="{{ route('timetable.destroy', [$event->id]) }}" class="mb-3" autocomplete="off">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-red-600" type="submit">Отклонить</button>
                                                    </form>
                                                </td>
                                            @else
                                                <td class="text-center border-solid border hover:border-solid rounded-md">
                                                    <div class="">{{$d}} день {{$w}} неделя</div>
                                                    <form method="POST" action="{{route('timetable.store')}}" autocomplete="off">
                                                        @csrf
                                                        <input class="hidden" name="week" value="{{ $w }}" required >
                                                        <input class="hidden" name="day" value="{{ $d }}" required >
                                                        <input class="hidden" name="tutorID" value="{{ $tutor->id }}" required >
                                                        <input class="hidden" name="subjectID" value="{{ $tutor->subject->id }}" required >
                                                        <input class="hidden" name="userID" value="{{ $auth->id }}" required >
                                                        <button class="text-yellow-600" type="submit">Свободно</button>
                                                    </form>
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                            @endfor

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

