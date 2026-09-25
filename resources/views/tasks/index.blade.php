<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <style>
      body {
     font-family: "Trebuchet MS", sans-serif;
    font-weight: bold;
    letter-spacing: 1px;
    background: #11b8af;
    margin: 0;
    padding: 30px;
}

        .container {
            max-width: 1000px;
            margin: auto;
        }

        h1 {
            margin-bottom: 20px;
        }

        .add-btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .success {
            background: #d1fae5;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
        }

       table {
    width: 100%;
    background: white;
    border-collapse: collapse;
}

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #e5e7eb;
        }

        .edit {
            color: #2563eb;
            text-decoration: none;
            margin-right: 10px;
        }

        .complete {
            color: #16a34a;
            font-weight: bold;
            margin-right: 10px;
        }

        .completed {
            color: #16a34a;
            font-weight: bold;
            margin-right: 10px;
        }

        .delete {
            color: #dc2626;
        }

        form {
            display: inline;
        }

        button {
            border: none;
            background: none;
            cursor: pointer;
            font-size: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Personal Task Manager</h1>

    <a href="https://turbo-waddle-r76wrpvqg5r53px57-8000.app.github.dev/tasks/create"
       class="add-btn">
        + Add Task
    </a>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Description</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        @forelse($tasks as $task)

            <tr>

                <td>
                    {{ $task->task_name }}
                </td>

                <td>
                    {{ $task->description ?? 'No description' }}
                </td>

                <td>
                    {{ $task->status }}
                </td>

                <td>
                    {{ $task->due_date ?? 'No date' }}
                </td>

                <td>

                    @if($task->status == 'Pending')

                        <form action="https://turbo-waddle-r76wrpvqg5r53px57-8000.app.github.dev/tasks/{{ $task->id }}/complete"
                              method="POST">

                            @csrf

                            @method('PATCH')

                            <button type="submit" class="complete">
                                ✓ Complete
                            </button>

                        </form>

                    @else

                        <span class="completed">
                            ✓ Completed
                        </span>

                    @endif

                    <a href="https://turbo-waddle-r76wrpvqg5r53px57-8000.app.github.dev/tasks/{{ $task->id }}/edit"
                       class="edit">
                        Edit
                    </a>

                    <form action="https://turbo-waddle-r76wrpvqg5r53px57-8000.app.github.dev/tasks/{{ $task->id }}"
                          method="POST">

                        @csrf

                        @method('DELETE')

                        <button type="submit"
                                class="delete"
                                onclick="return confirm('Delete this task?')">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="5">
                    No tasks yet.
                </td>
            </tr>

        @endforelse

        </tbody>
    </table>

</div>

</body>
</html>