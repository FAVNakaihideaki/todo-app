<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ToDo App</title>
</head>
<body>
    <h1>ToDoリスト</h1>

    <form action="/" method="POST">
        @csrf
        <input type="text" name="title" placeholder="新しいタスクを入力">
        <button type="submit">追加</button>
    </form>

    <ul>
        @foreach ($todos as $todo)
            <li style="margin-bottom: 10px;">
                <form action="/{{ $todo->id }}" method="POST" style="display: inline;">
                    @csrf
                    @method('PUT')
                    <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $todo->completed ? 'checked' : '' }}>
                    <span style="{{ $todo->completed ? 'text-decoration: line-through;' : '' }} margin-left: 8px;">
                        {{ $todo->title }}
                    </span>
                </form>

                <form action="/{{ $todo->id }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="margin-left: 10px; background-color: #f44336; color: white; border: none; padding: 3px 7px; cursor: pointer;">
                        削除
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>


