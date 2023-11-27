<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create a todo</h1>

    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
        @endif

    <form method="post" action="{{route('todo.update', ['todo' => $todo])}}">
        @csrf 
        @method('put')
        <label for="">Title</label>
        <input type="text" name="title" placeholder="Title" value="{{$todo->title}}">
        <label for="">Description</label>
        <input type="text" name="description" placeholder="Description" value="{{$todo->description}}">
        <label for="">Deadline</label>
        <input type="time" name="deadline" placeholder="Deadline" value="{{$todo->deadline}}">
        <input type="submit" value="edit todo">
    </form>
</body>
</html>