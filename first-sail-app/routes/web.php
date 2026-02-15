<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $tasks = Task::all();
    return view('welcome', ['tasks' => $tasks]);
});
