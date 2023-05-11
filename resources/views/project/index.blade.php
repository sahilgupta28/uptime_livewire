<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight max-w-xs">
            {{ __('Projects') }}
        </h2>
            <a type="button" class="block rounded-md bg-indigo-500 px-3 py-2 text-center text-sm font-semibold text-white hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2
             focus-visible:outline-offset-2 focus-visible:outline-indigo-500" href="{{route('project.create')}}">Add Project</a>
        </div>
    </x-slot>

    <div class="py-12">
        @livewire('projects-list')
    </div>
</x-app-layout>
