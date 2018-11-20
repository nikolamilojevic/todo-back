<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Requests\TodosFormRequest;

class TodosController extends Controller
{
    public function index(Request $request) {
        return Todo::all();
    }

    public function store(TodosFormRequest $request)
    {
        Todo::create([
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority
        ]);
    }

    public function destroy($todo)
    {
        return Todo::destroy($todo);
    }

    public function update(Request $request, $todo)
    {
        $todoToEdit = Todo::findOrFail($todo);
        $todoToEdit->update($request->all());
    }
}
