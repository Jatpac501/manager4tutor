<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Расписание') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <table class="table-fixed w-full">
                        <tbody>
                            @for ($i = 1; $i <= 5; $i++)
                                <tr class="h-40">
                                    @for ($d = 1; $d <= 7; $d++)
                                        <td class="p-2 border-solid border hover:border-solid rounded-md">{{$i*$d}}</td>
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
