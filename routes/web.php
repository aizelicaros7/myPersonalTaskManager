<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect('https://turbo-waddle-r76wrpvqg5r53px57-8000.app.github.dev/tasks');
});

Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete']);

Route::resource('tasks', TaskController::class);