<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller{

    public function index(){
        return response()->json(Task::all());
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',  
            'done' => 'required|boolean',
        ],[
            'title.required' => 'O título da tarefa é obrigatório.',
            'done.required' => 'O campo "feito" é obrigatório.',
            'done.boolean' => 'O campo "feito" deve ser verdadeiro ou falso.',
        ]
    );
        $task = Task::create($validated);
        return response()->json($task, 201);
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task, status: 200);
    }

    public function update(Request $request, $id) {

        $validated = $request->validate([
            'title' => 'required|string|max:255', 
            'done' => 'required|boolean',   
        ]);

        $task = Task::findOrFail($id);
        $task->update($validated);
        return response()->json($task, 200);
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return response()->json(null, 204);
    }



    
}