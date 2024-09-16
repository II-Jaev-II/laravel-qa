<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            All Questions
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="media-body">
                                <p class="text-xl font-medium text-sky-400 dark:text-sky-400 hover:underline">
                                    <a href="{{ $question->url }}">{{ $question->title }}</a>
                                </p>
                                <p class="lead mb-4">
                                    Asked by
                                    <a class="text-sky-400 dark:text-sky-400 hover:underline" href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    <small class="text-gray-600 dark:text-gray-400">{{ $question->created_date }}</small>
                                </p>
                                {{ Str_limit($question->body, 250) }}
                            </div>
                        </div>
                        <hr class="my-4 border-gray-200 dark:border-gray-600">
                    @endforeach
                    <div class="mt-2">
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
