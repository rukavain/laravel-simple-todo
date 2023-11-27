<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <h1>Todo List</h1>
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>

    <div>
        <div>
            <a href="{{route('todo.create')}}">Create todo</a>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Deadline</th>
            </tr>
            @foreach($todos as $todo)
            <tr>
                <td>{{$todo->id}}</td>
                <td>{{$todo->title}}</td>
                <td>{{$todo->description}}</td>
                <td>{{$todo->deadline}}</td>
                <td>
                    <a href="{{route('todo.edit', ['todo' => $todo])}}">edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('todo.destroy', ['todo' => $todo])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>