@if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-400 dark:bg-green-700 dark:text-green-400"
        role="alert">
        <span class="font-medium">Success!</span> {{ session('success') }}
    </div>
@endif
