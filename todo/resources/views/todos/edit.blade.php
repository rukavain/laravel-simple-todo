<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <h1 class="font-bold text-6xl mt-8">Edit a todo</h1>

    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
        @endif
    <div class="bg-gray-800 p-11 rounded-xl">

        <form method="post" action="{{route('todo.update', ['todo' => $todo])}}">
            @csrf 
            @method('put')
            <div class="flex flex-col">
                <label for="" class="p-5 font-bold text-2xl text-white self-start ">Title</label>
                <input class="px-8 py-3 mb-5 block rounded-md" type="text" name="title" placeholder="Title" value="{{$todo->title}}">
            </div>
            <div class="flex flex-col">
                <label for="" class="p-5 font-bold text-2xl text-white ">Description</label>
                <input class="px-8 py-3 mb-5 block rounded-md " type="text" name="description" placeholder="Description" value="{{$todo->description}}">
            </div>
            <div class="flex flex-col"> 
                <label for="" class="p-5 font-bold text-2xl text-white ">Deadline</label>
                <input class="px-8 py-3 mb-5 block rounded-md " type="time" name="deadline" placeholder="Deadline" value="{{$todo->deadline}}">
            </div>
            
           
            <input type="submit" value="Edit Todo" class="bg-green-900 inline-block px-5 py-3 text-sm rounded-md text-white font-bold hover:opacity-80 transition-all">
        </form>

    </div>
   
</body>
</html>