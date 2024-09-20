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
        <div class="max-w-8xl mx-auto px-2 md:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('layouts.messages')
                    @foreach ($questions as $question)
                        <div class="flex flex-col sm:flex-row items-start">
                            <div class="flex flex-row md:flex-col text-center sm:mb-0 sm:mr-4 md:space-y-2 space-x-2 w-28 sm:w-24">
                                <div class="vote md:text-sm">
                                    <div class="md:font-bold md:text-lg">
                                        {{ $question->votes }}
                                    </div>
                                    <div>
                                        {{ Str_plural('vote', $question->votes) }}
                                    </div>
                                </div>
                                <div class="status md:text-sm
                                    @if ($question->status === 'answered') md:border border-green-500 text-green-500
                                    @elseif($question->status === 'answered-accepted') md:border border-green-500 bg-green-400
                                    @else md:border border-gray-500 @endif">
                                    <div class="md:font-bold md:text-lg">
                                        {{ $question->answers_count }}
                                    </div>
                                    <div>
                                        {{ Str::plural('answer', $question->answers_count) }}
                                    </div>
                                </div>
                                <div class="view md:text-xs">
                                    {{ $question->views . ' ' . Str_plural('view', $question->views) }}
                                </div>
                            </div>

                            <div class="flex flex-col w-full">
                                <div class="flex items-center justify-between sm:w-full mb-4">
                                    <p class="text-xl font-medium text-sky-400 dark:text-sky-400 hover:underline truncate w-full w-18 md:w-96">
                                        <a href="{{ $question->url }}">{{ $question->title }}</a>
                                    </p>
                                    <div class="flex space-x-2">
                                        @if (Auth::user()->can('update-question', $question))
                                            <a href="{{ route('questions.edit', $question->id) }}"
                                                class="border rounded-md border-sky-400 text-sky-400 hover:bg-sky-600 hover:text-white active:bg-sky-400 dark:text-sky-400 dark:border-sky-400 dark:hover:bg-sky-600 dark:hover:text-white dark:active:bg-sky-400 px-4 py-2">Edit</a>
                                        @endif
                                        @if (Auth::user()->can('delete-question', $question))
                                            <form action="{{ route('questions.destroy', $question->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    class="border rounded-md border-red-400 text-red-400 hover:bg-red-600 hover:text-white active:bg-red-400 dark:text-red-400 dark:border-red-400 dark:hover:bg-red-600 dark:hover:text-white dark:active:bg-red-400 px-4 py-2"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                                <p class="lead mb-4">
                                    Asked by
                                    <a class="text-sky-400 dark:text-sky-400 hover:underline"
                                        href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    <small class="text-gray-600 dark:text-gray-400">{{ $question->created_date }}</small>
                                </p>
                                <p class="text-gray-700 dark:text-gray-300">
                                    {{ Str_limit($question->body, 250) }}
                                </p>
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
