@csrf
<div class="block mb-4">
    <label for="question-title">Question Title</label>
    <input type="text" name="title" value="{{ old('title', $question->title) }}" id="question-title"
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
        name="body" id="question-body" cols="30" rows="10">{{ old('body', $question->body) }}</textarea>
    @if ($errors->has('body'))
        <div class="text-red-500 mt-1">
            <strong>{{ $errors->first('body') }}</strong>
        </div>
    @endif
</div>
<div class="block">
    <button
        class="border rounded-md border-sky-600 text-sky-600 hover:bg-sky-200 active:bg-sky-400 active:text-white dark:border-sky-600 dark:text-sky-400 dark:hover:bg-sky-700 dark:active:bg-sky-500 dark:hover:text-white px-4 py-2">{{ $buttonText }}</button>
</div>
