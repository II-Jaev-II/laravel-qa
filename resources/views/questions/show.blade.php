<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight overflow-hidden whitespace-normal break-words w-8/12 md:w-10/12">
                {{ $question->title }}
            </h2>
            <div class="ml-auto">
                <a href="{{ route('questions.index') }}"
                    class="border rounded-md border-gray-600 dark:border-gray-400 dark:text-white hover:bg-gray-500 active:bg-gray-600 hover:text-white dark:hover:bg-gray-600 dark:active:bg-gray-500 px-4 py-2">
                    All Questions
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto px-2 md:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                <div class="flex">
                    <div class="flex flex-col items-center py-4 px-4">
                        <a title="This question is useful">
                            <i class="fas fa-caret-up fa-3x dark:text-green-400 cursor-pointer"></i>
                        </a>
                        <span class="block dark:text-green-400">1230</span>
                        <a title="This question is not useful">
                            <i class="fas fa-caret-down fa-3x text-gray-400 dark:text-red-400 cursor-pointer"></i>
                        </a>
                        <a title="Click to mark as favorite question">
                            <i class="mt-4 fas fa-star fa-3x text-yellow-400  cursor-pointer w-8 h-8"></i>
                            <span class="block text-yellow-400 text-center">123</span>
                        </a>
                    </div>
                    <div class="p-4 text-gray-900 dark:text-gray-100 flex-1">
                        {!! $question->body_html !!}
                        <div class="float-right my-2">
                            <span class="text-gray-600 dark:text-gray-400">Answered {{ $question->created_date }}</span>
                            <div class="flex items-center">
                                <a href="{{ $question->user->url }}" class="pr-2">
                                    <img src="{{ $question->user->avatar }}" class="w-8 h-8">
                                </a>
                                <a class="text-sky-400 hover:underline"
                                    href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-6xl mx-auto px-2 md:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                <div class="p-4 dark:text-white">
                    <h2>{{ $question->answers_count . ' ' . str_plural('Answer', $question->answers_count) }}</h2>
                </div>
                <hr>
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    @foreach ($question->answers as $answer)
                        <div class="flex">
                            <div class="flex flex-col items-center py-4 px-4">
                                <a title="This answer is useful">
                                    <i class="fas fa-caret-up fa-3x dark:text-green-400 cursor-pointer"></i>
                                </a>
                                <span class="block dark:text-green-400">1230</span>
                                <a title="This answer is not useful">
                                    <i
                                        class="fas fa-caret-down fa-3x text-gray-400 dark:text-red-400 cursor-pointer"></i>
                                </a>
                                <a title="Mark as the best answer">
                                    <i class="mt-4 fas fa-check fa-3x text-green-400  cursor-pointer w-8 h-8"></i>
                                </a>
                            </div>
                            <div class="p-4 text-gray-900 dark:text-gray-100 flex-1">
                                {!! $answer->body_html !!}
                                <div class="float-right my-2">
                                    <span class="text-gray-600 dark:text-gray-400">Answered {{ $answer->created_date }}</span>
                                    <div class="flex items-center">
                                        <a href="{{ $answer->user->url }}" class="pr-2">
                                            <img src="{{ $answer->user->avatar }}" class="w-8 h-8">
                                        </a>
                                        <a class="text-sky-400 hover:underline"
                                            href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear-both"></div>
                        <hr class="my-2">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
