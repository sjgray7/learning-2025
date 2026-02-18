<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('welcome', compact('tasks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
        ]);

        Task::create([
            'title' => $validated['title'],
            'is_completed' => false,
        ]);

        return redirect()->back()->with('success', 'Task created successfully.');
    }

    // Оновлення статусу (виконано / не виконано)
    public function update(Task $task)
    {
        // Ми просто перемикаємо статус на протилежний
        $task->update([
            'is_completed' => !$task->is_completed,
        ]);

        return redirect()->back();
    }

    // Видалення завдання
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back();
    }
}
