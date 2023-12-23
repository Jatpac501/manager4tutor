<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Расписание' ) }}
            {{ $tutor->name }}
            ({{ $tutor->subject->name }})
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <span class="inline-grid grid-cols-7 gap-2 w-full text-center">
                        @for ($w = 1; $w <= 4; $w++)
                                    @foreach([1, 2, 3, 4, 5, 6, 7] as $d)
                                        @php
                                            $event = App\Models\Timetable::where('week', $w)->where('day', $d)->first();
                                        @endphp
                                        @if ($event)
                                            <span class="bg-gray-700 p-2 rounded-lg flex flex-col content-between justify-between h-40 mb-4">
                                                <div class="text-xs">{{$d}} день {{$w}} неделя</div>
                                                <div class="font-bold">{{$event->subject->name}}</div>
                                                <div class="text-sm">{{$event->user->name}}</div>
                                                @if ($event->isAccept)
                                                    <div class="">Принято</div>
                                                @else
                                                    <div class="">Ожидание</div>
                                                @endif
                                                @if ($auth->role == 'admin'|| $auth->id == $event->userID || $auth->id == $event->tutorID )
                                                    <span class="flex flex-col">
                                                        @if ($auth->role == 'admin' || $auth->id == $event->tutorID && !$event->isAccept)
                                                        <form method="POST" action="{{ route('timetable.update', [$event->id]) }}" class="" autocomplete="off">
                                                            @csrf
                                                            @method('PUT')
                                                            <input name="isAccept" class="hidden" value="1" required>
                                                            <button class="border border-lime-600 text-lime-600 px-2 rounded-lg text-sm" type="submit">Принять</button>
                                                        </form>
                                                        @endif
                                                        <form method="POST" action="{{ route('timetable.destroy', [$event->id]) }}" class="" autocomplete="off">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="border border-rose-600 text-rose-600 px-2 rounded-lg text-sm" type="submit">Отклонить</button>
                                                        </form>
                                                    </span>
                                                @endif
                                            </span>
                                        @else
                                            <span class="bg-gray-700 p-2 rounded-lg flex flex-col content-between justify-between h-40 mb-4">
                                                <div class="text-xs">{{$d}} день {{$w}} неделя</div>
                                                <div class="">Свободно</div>
                                                <form method="POST" action="{{route('timetable.store')}}" autocomplete="off">
                                                    @csrf
                                                    <input class="hidden" name="week" value="{{ $w }}" required >
                                                    <input class="hidden" name="day" value="{{ $d }}" required >
                                                    <input class="hidden" name="tutorID" value="{{ $tutor->id }}" required >
                                                    <input class="hidden" name="subjectID" value="{{ $tutor->subject->id }}" required >
                                                    <input class="hidden" name="userID" value="{{ $auth->id }}" required >
                                                    <button class="border px-2 rounded-lg text-sm" type="submit">Записаться</button>
                                                </form>
                                            </span>
                                        @endif
                                    @endforeach
                        @endfor
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

