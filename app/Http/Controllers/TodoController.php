<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TodoService;

class TodoController extends Controller
{
    protected TodoService $todoService;

    public function __construct()
    {
        $this->todoService = new TodoService();
    }

    // TODO: showTodo()
    public function showTodo()
    {
        try {
            $result = $this->todoService->getTodo();
        } catch (\Throwable $th) {
            $result = [
                'status' => 500,
                'error' => $th->getMessage(),
            ];
        }
        return response()->json($result);
    }

    // TODO: createTodo()
    public function createTodo(Request $request)
    {
        $todo = $request->validate([
			'title'=>'required|string|min:3',
			'description'=>'required|string'
        ]);
        
		$data = [
			'title'=>$request->post('title'),
			'description'=>$request->post('description')
		];

		$id = $this->todoService->addTodo($data);
		$todo = $this->todoService->getById($id);

        return response()->json([
            'massage' => 'Succes Create Todo',
            'data' => $todo
        ]);
    }

    // TODO: createTodo()
    public function updateTodo(Request $request)
    {
        $request->validate([
            'todo_id' => 'required|string',
			'title'=>'string|min:3',
			'description'=>'string'
        ]);

        $todoId = $request->post('todo_id');
        $formData = $request->only('title', 'description');
        
        $todo = $this->todoService->getById($todoId);
        $id = $this->todoService->updateTodo($todo, $formData);
        
        $todo = $this->todoService->getById($id);
        
		return response()->json([
            'massage' => 'Succes Update Todo',
            'data' => $todo
        ]);
    }
    
    // TODO: deleteTodo()
    public function deleteTodo(Request $request)
    {
        $request->validate([
            'todo_id' => 'required|string',
        ]);

        $todoId = $this->post('todo_id');
        $id = $this->todoService->deleteTodo($todoId);

        $todo = $this->todoService->getById($id);

        return response()->json([
            'massage' => 'Succes Delete Todo',
            'data' => $todo
        ]);
    }
}
