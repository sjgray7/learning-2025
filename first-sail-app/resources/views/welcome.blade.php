<!DOCTYPE html>
<html>
<head>
    <title>Мої завдання</title>
</head>
<body>
    <h1>Список завдань:</h1>
    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->title }}</li>
        @endforeach
    </ul>
</body>
</html>
