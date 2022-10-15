<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        return view('dashboard')->with([
            'todos' => $todos,
        ]);
    }

    public function store(Request $request)
    {
        $attiributes = request()->validate([
            'title' => 'required',
            'desc' => 'nullable',
        ]);

        Todo::create($attiributes);

        return redirect('dashboard');
    }

    public function update(Todo $todo)
    {
        $todo->update(['isDone' => true]);

        return redirect('dashboard');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect('dashboard');
    }

}
