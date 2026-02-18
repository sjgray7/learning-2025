<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список завдань</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-xl shadow-lg overflow-hidden">

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
                <li class="p-4 hover:bg-gray-50 flex items-center justify-between">
                    <span class="text-gray-800">{{ $task->title }}</span>
                    @if($task->is_completed)
                        <span class="text-xs font-semibold text-green-600 bg-green-100 px-2 py-1 rounded-full">Готово</span>
                    @else
                        <span class="text-xs font-semibold text-yellow-600 bg-yellow-100 px-2 py-1 rounded-full">В процесі</span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

</body>
</html>
