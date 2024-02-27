<?php

namespace App\Services;

use App\Repositories\TodoRepository;

class TodoService
{
    protected TodoRepository $todoRepository;

    public function __construct() 
    {
        $this->todoRepository = new TodoRepository;
    }

	/**
	 * NOTE: untuk mengambil semua todo
	 */
    public function getTodo()
    {
        $todo = $this->todoRepository->getAll();
        return $todo;
    }

	/**
	 * NOTE: UNTUK mengambil data task
	 */
	public function getById(string $taskId)
	{
		$task = $this->todoRepository->getById($taskId);
		return $task;
	}

    /**
	 * NOTE: untuk menambahkan todo
	 */
    public function addTodo(array $data)
    {
		$taskId = $this->todoRepository->create($data);
		return $taskId;
    }

    /**
	 * NOTE: untuk merubah todo
	 */
	public function updateTodo(array $editTask, array $formData)
	{
		if (isset($formData['title'])) {
			$editTask['title'] = $formData['title'];
		}

		if (isset($formData['description'])) {
			$editTask['description'] = $formData['description'];
		}

		$id = $this->todoRepository->update($editTask);
		return $id;
	}

    /**
	 * NOTE: untuk menghapus todo
	 */
	public function deleteTodo(string $todoId)
	{
		$existTask = $this->getById($todoId);

		if (!$existTask) {
			return response()->json([
				"message" => "Task " . $todoId . " tidak ada"
			], 401);
		}

		$id = $this->todoRepository->deleteById($todoId);
		return $id;
	}
}