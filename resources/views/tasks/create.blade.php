<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background: #2563eb;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            cursor: pointer;
        }

        a {
            margin-left: 10px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add Task</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="https://turbo-waddle-r76wrpvqg5r53px57-8000.app.github.dev/tasks" method="POST">

        @csrf

        <label>Task Name</label>
        <input type="text" name="task_name" required>

        <label>Description</label>
        <textarea name="description" rows="4"></textarea>

        <label>Status</label>
        <select name="status">
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select>

        <label>Due Date</label>
        <input type="date" name="due_date">

        <button type="submit">Add Task</button>

        <a href="https://turbo-waddle-r76wrpvqg5r53px57-8000.app.github.dev/tasks">
            Cancel
        </a>

    </form>

</div>

</body>
</html>