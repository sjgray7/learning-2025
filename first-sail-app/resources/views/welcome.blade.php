<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список завдань</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-xl shadow-lg overflow-hidden">

        @if (session('success'))
            <x-flash />
        @endif

        <div>
            <form action="{{ route('tasks.store') }}" method="POST" class="p-4 border-b border-gray-200 bg-gray-50">
                @csrf

                <div class="flex gap-2">
                    <input
                        type="text"
                        name="title"
                        placeholder="Що треба зробити?"
                        class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border"
                        required
                    >
                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition"
                    >
                        Додати
                    </button>
                </div>

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </form>
        </div>

        <div class="bg-blue-600 p-4">
            <h1 class="text-white text-xl font-bold">Мої Завдання</h1>
        </div>

        <ul class="divide-y divide-gray-200">
            @foreach ($tasks as $task)
                <li class="p-4 hover:bg-gray-50 flex items-center justify-between transition group">

                    <div class="flex items-center gap-3">
                        <form action="{{ route('tasks.update', $task) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="w-6 h-6 rounded-full border-2 flex items-center justify-center transition
                                {{ $task->is_completed ? 'bg-green-500 border-green-500' : 'border-gray-300 hover:border-blue-500' }}">

                                @if($task->is_completed)
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                @endif
                            </button>
                        </form>

                        <span class="{{ $task->is_completed ? 'line-through text-gray-400' : 'text-gray-800' }}">
                            {{ $task->title }}
                        </span>
                    </div>

                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-gray-400 hover:text-red-500 transition opacity-0 group-hover:opacity-100 p-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>

                </li>
            @endforeach
        </ul>
    </div>

</body>
</html>
