<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Предметы') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 inline-grid grid-cols-5 gap-4 text-gray-900 dark:text-gray-100">
                    @foreach ($subjects as $subject)
                        <a href="{{route('tutors.show', $subject->id)}}"  class="text-center font-bold text-xl p-4 border-solid border-2 hover:border-solid rounded-md border-sky-900 hover:border-sky-400">{{ $subject->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
