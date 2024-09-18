<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Ask Question
            </h2>
            <div class="ml-auto">
                <a href="{{ route('questions.index') }}"
                    class="border rounded-md border-gray-600 dark:border-gray-400 dark:text-white hover:bg-gray-500 active:bg-gray-600 hover:text-white dark:hover:bg-gray-600 dark:active:bg-gray-500 px-4 py-2">All
                    Questions</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('questions.store') }}" method="post">
                        @csrf
                        <div class="block mb-4">
                            <label for="question-title">Question Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" id="question-title"
                                class="block w-full flex rounded-md dark:bg-gray-600 my-2 {{ $errors->has('title') ? 'border-red-500' : '' }}">
                            @if ($errors->has('title'))
                                <div class="text-red-500 mt-1">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="block mb-4">
                            <label for="question-body">Explain your question</label>
                            <textarea class="block w-full flex rounded-md dark:bg-gray-700 my-2 {{ $errors->has('body') ? 'border-red-500' : '' }}"
                                name="body" id="question-body" cols="30" rows="10">{{ old('body') }}</textarea>
                            @if ($errors->has('body'))
                                <div class="text-red-500 mt-1">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="block">
                            <button
                                class="border rounded-md border-sky-600 text-sky-600 hover:bg-sky-200 active:bg-sky-400 active:text-white dark:border-sky-600 dark:text-sky-400 dark:hover:bg-sky-700 dark:active:bg-sky-500 dark:hover:text-white px-4 py-2">Ask
                                this question</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
