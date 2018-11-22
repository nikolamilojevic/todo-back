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

    public function getAuthor($user_id, Request $request) {
        return Todo::with('user')
        ->where('user_id', $user_id)->get();
    }

    public function store(TodosFormRequest $request)
    {
        Todo::create([
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
            'user_id' => $request->user_id
        ]);
    }

    public function destroy($todo)
    {
        $todoToDelete = Todo::findOrFail($todo);
        return Todo::destroy($todoToDelete->id);
    }

    public function update(Request $request, $todo)
    {
        $todoToEdit = Todo::findOrFail($todo);
        $todoToEdit->update($request->all());
    }
}
