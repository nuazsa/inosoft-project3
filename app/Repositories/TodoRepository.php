<?php


namespace App\Repositories;

use App\Models\Todo;
use App\Helpers\MongoModel;
use Illuminate\Support\Arr;

class TodoRepository
{
    private MongoModel $todo;

    public function __construct()
    {
        $this->todo = new MongoModel('todo');
    }

    /**
     * Untuk mendapatkan seluruh task
     */
    public function getAll()
    {
        $todo = $this->todo->get([]);
        return $todo;
    }

    /**
     * Untuk mendapatkan task bedasarkan id
     */
    public function getById(string $id)
    {
        $task = $this->todo->find(['_id' => $id]);
        return $task;
    }

    /**
     * Untuk membuat task
     */
    public function create(array $data)
    {
        $dataSaved = [
            'title' => $data['title'],
            'description' => $data['description'],
            'assigned' => null,
            'subtodo' => [],
            'created_at' => time()
        ];

        ksort($dataSaved);

        $id = $this->todo->save($dataSaved);
        return $id;
    }

    /**
     * Untuk update todo
     */
    public function update(array $data) 
    {
        $id = $this->todo->save($data);
        return $id;
    }

    /**
     * Untuk manghapus todo
     */
	public function deleteById(string $id)
	{
		$id = $this->todo->deleteQuery(['_id' => $id]);
        return $id;
	}

}
