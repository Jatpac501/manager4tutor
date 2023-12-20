<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Предподаватели') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($tutors as $tutor)
                        <a href="{{ route('timetable.show', $tutor->id) }}" class="w-full m-4 p-2 border-solid border-2 hover:border-solid rounded-md border-sky-900 hover:border-sky-400">{{ $tutor->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
