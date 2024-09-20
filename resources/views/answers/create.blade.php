<div class="py-12">
    <div class="max-w-6xl mx-auto px-2 md:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
            <div class="p-4 dark:text-white">
                <h3>Your Answer</h3>
            </div>
            <hr>
            <div class="p-4 text-gray-900 dark:text-gray-100">
                <form action="{{ route('questions.answers.store', $question->id) }}" method="post">
                    @csrf
                    <div>
                        <textarea class="block w-full flex rounded-md dark:bg-gray-700 my-2 {{ $errors->has('body') ? 'border-red-500' : '' }}" name="body" rows="7"></textarea>
                        @if ($errors->has('body'))
                            <div>
                                <div class="text-red-500 mt-1">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div>
                        <button type="submit" class="border rounded-md border-sky-600 text-sky-600 hover:bg-sky-200 active:bg-sky-400 active:text-white dark:border-sky-600 dark:text-sky-400 dark:hover:bg-sky-700 dark:active:bg-sky-500 dark:hover:text-white px-4 py-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
