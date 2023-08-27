<?php

namespace App\Http\Repositories;

use App\Models\Todo\Todo;

class TodoRepository {
    private $todo = null;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function selectAllTodos(){
        return $this->todo::all(['id', 'title', 'completed']);
    }
    
    public function saveTodo($data){
        return $this->todo::create($data);
    }

    public function selectOneTodoByField($conditions) {
        return $this->todo::where(function ($query) use ($conditions) {
            foreach ($conditions as $field => $value) {
                $query->where($field, $value);
            }
        })->get();
    }    

    public function updateTodo($data, $id){
        return $this->todo::where('id', $id)->update($data);
    }

    public function deleteTodo($id){
        return $this->todo->delete();
    }
}