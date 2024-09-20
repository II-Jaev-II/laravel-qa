<div class="py-12">
    <div class="max-w-6xl mx-auto px-2 md:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
            @include('layouts.messages')
            <div class="p-4 dark:text-white">
                <h2>{{ $answersCount . ' ' . str_plural('Answer', $answersCount) }}</h2>
            </div>
            <hr>
            <div class="p-4 text-gray-900 dark:text-gray-100">
                @foreach ($answers as $answer)
                    <div class="flex">
                        <div class="flex flex-col items-center py-4 px-4">
                            <a title="This answer is useful">
                                <i class="fas fa-caret-up fa-3x dark:text-green-400 cursor-pointer"></i>
                            </a>
                            <span class="block dark:text-green-400">1230</span>
                            <a title="This answer is not useful">
                                <i class="fas fa-caret-down fa-3x text-gray-400 dark:text-red-400 cursor-pointer"></i>
                            </a>
                            <a title="Mark as the best answer">
                                <i
                                    class="mt-4 fas fa-check fa-3x text-green-400  cursor-pointer w-8 h-8 {{ $answer->status }}"></i>
                            </a>
                        </div>
                        <div class="p-4 text-gray-900 dark:text-gray-100 flex-1">
                            {!! $answer->body_html !!}
                            <div class="flex space-x-2">
                                @if (Auth::user()->can('update-answer', $answer))
                                    <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}"
                                        class="border rounded-md border-sky-400 text-sky-400 hover:bg-sky-600 hover:text-white active:bg-sky-400 dark:text-sky-400 dark:border-sky-400 dark:hover:bg-sky-600 dark:hover:text-white dark:active:bg-sky-400 px-2 py-2">Edit</a>
                                @endif
                                @if (Auth::user()->can('delete-answer', $answer))
                                    <form
                                        action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}"
                                        method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                            class="border rounded-md border-red-400 text-red-400 hover:bg-red-600 hover:text-white active:bg-red-400 dark:text-red-400 dark:border-red-400 dark:hover:bg-red-600 dark:hover:text-white dark:active:bg-red-400 px-4 py-2"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                @endif
                            </div>
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
                            <div class="float-right my-2">
                                <span class="text-gray-600 dark:text-gray-400">Answered
                                    {{ $answer->created_date }}</span>
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
