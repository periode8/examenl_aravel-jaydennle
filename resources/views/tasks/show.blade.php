<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="flex">
                <p class="opacity-70">
                   <strong>Deadline: </strong> {{ $tasks->deadline}}
                </p>
            </div>

    <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl">
                    {{ $tasks->title }}
                </h2>
                <p class="mt-6 whitespace-pre-wrap">

                    {{ $tasks->text }}

                </p><br>
                <a href="{{ route('tasks.edit', $tasks) }}"  class="btn-link ml-auto">Edit Note</a>

                <form action="{{ route('tasks.destroy', $tasks) }}" method="post" class="pt-2">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you wish to delete this note?')">Delete Task</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
