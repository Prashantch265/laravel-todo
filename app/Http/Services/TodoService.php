<?php

namespace App\Http\Services;

use App\Http\Repositories\TodoRepository;

class TodoService {
    protected $todoRepository = null;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function getAllTodos(){
        return $this->todoRepository->selectAllTodos();
    }

    public function addTodo($todo){
        return $this->todoRepository->saveTodo($todo);
    }

    public function getTodoById($id){
        return $this->todoRepository->selectOneTodoByField(['id' => $id]);
    }

    public function updateTodo($todo, $id){
        return $this->todoRepository->updateTodo($todo, $id);
    }

    public function markAsComplete($id){
        return $this->todoRepository->updateTodo(['completed' => true], $id);
    }

    public function deleteTodo($id){
        return $this->todoRepository->deleteTodo($id);
    }
}