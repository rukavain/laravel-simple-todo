<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <h1 class="font-bold text-6xl mt-8">Todo List</h1>
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>

    <div class="bg-gray-800 p-11 rounded-xl">
        <table>
            <tr>
                <th class="p-5 font-bold text-xl text-white">ID</th>
                <th class="p-5 font-bold text-xl text-white">Title</th>
                <th class="p-5 font-bold text-xl text-white">Description</th>
                <th class="p-5 font-bold text-xl text-white">Deadline</th>
            </tr>
            @foreach($todos as $todo)
            <tr>
                <td class="p-5 font-bold text-xl text-white">{{$todo->id}}</td>
                <td class="p-5 font-bold text-xl text-white">{{$todo->title}}</td>
                <td class="p-5 font-bold text-xl text-white">{{$todo->description}}</td>
                <td class="p-5 font-bold text-xl text-white">{{$todo->deadline}}</td>
                <td class="p-5 font-bold text-xl text-white">
                    <a class="bg-green-900 inline-block px-5 py-3 text-sm rounded-md text-white font-bold hover:opacity-80 transition-all" href="{{route('todo.edit', ['todo' => $todo])}}">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('todo.destroy', ['todo' => $todo])}}">
                        @csrf
                        @method('delete')
                        <input class="bg-red-600 inline-block px-5 py-3 rounded-md text-white font-bold hover:opacity-80 cursor-pointer transition-all" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="bg-green-900 inline-block px-5 py-3 rounded-md text-white font-bold hover:opacity-80 transition-all">
            <a href="{{route('todo.create')}}">Create todo</a>
        </div>
    </div>
</body>
</html>