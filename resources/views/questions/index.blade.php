<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                All Questions
            </h2>
            <div class="ml-auto">
                <a href="{{ route('questions.create') }}"
                    class="border rounded-md border-gray-600 dark:border-gray-400 dark:text-white hover:bg-gray-500 active:bg-gray-600 hover:text-white dark:hover:bg-gray-600 dark:active:bg-gray-500 px-4 py-2">Ask
                    Question</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('layouts.messages')
                    @foreach ($questions as $question)
                        <div class="media flex items-start">
                            <div class="flex flex-col text-center mr-4 space-y-2 w-24">
                                <div class="vote text-sm">
                                    <div class="font-bold text-lg">
                                        {{ $question->votes }}
                                    </div>
                                    <div>
                                        {{ Str_plural('vote', $question->votes) }}
                                    </div>
                                </div>
                                <div
                                    class="status text-sm
                                    @if ($question->status === 'answered') border border-green-500 text-green-500
                                    @elseif($question->status === 'answered-accepted') border border-green-500 bg-green-100
                                    @else border border-gray-500 @endif">
                                    <div class="font-bold text-lg">
                                        {{ $question->answers }}
                                    </div>
                                    <div>
                                        {{ Str::plural('answer', $question->answers) }}
                                    </div>
                                </div>
                                <div class="view text-xs">
                                    {{ $question->views . ' ' . Str_plural('view', $question->views) }}
                                </div>
                            </div>

                            <div class="media-body">
                                <p class="text-xl font-medium text-sky-400 dark:text-sky-400 hover:underline">
                                    <a href="{{ $question->url }}">{{ $question->title }}</a>
                                </p>
                                <p class="lead mb-4">
                                    Asked by
                                    <a class="text-sky-400 dark:text-sky-400 hover:underline"
                                        href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    <small
                                        class="text-gray-600 dark:text-gray-400">{{ $question->created_date }}</small>
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
