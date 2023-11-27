<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('todos.index', ['todos' => $todos]);
        
    }
    public function create() {
        return view('todos.create');
    }
    public function store(Request $request) {
        $data = $request->validate ([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required'
        ]);

        $newTodo = Todo::create($data);

        return redirect(route('todo.index'));
    }
    public function update(Todo $todo, Request $request) {
        $data = $request->validate ([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required'
        ]);
        $todo->update($data);
        return redirect(route('todo.index'))->with('success', 'Todo updated successfully');
    }
    public function edit(Todo $todo) {
        return view('todos.edit', ['todo' => $todo]);
    }
    public function destroy(Todo $todo){
        $todo->delete();
        return redirect(route('todo.index'))->with('success', 'Todo deleted successfully');
    }
}
