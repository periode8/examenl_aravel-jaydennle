<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('tasks.store') }}" method="post">
                    @csrf
                    <x-input type="text" name="title" field="title" placeholder="Title" class="w-full" autocomplete="off"></x-input>
                    @error('title')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    <x-textarea name="text" rows="10" field="text" placeholder="Start typing here..." class="w-full mt-6"></x-textarea>
                    @error('text')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    <x-input type="date" name="deadline" field="deadline" placeholder="" class="w-10" autocomplete="off"></x-input>
                    @error('title')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror

                    <x-button class="mt-6">Save Tasks</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
