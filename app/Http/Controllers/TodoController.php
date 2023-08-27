<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\TodoService;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    protected $todoService;
    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = $this->todoService->getAllTodos();
        return response()->json(['data'=>$todos], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $validatedData = $request->validated(); // Get the validated data from the request
        $res = $this->todoService->addTodo($validatedData);
        return response()->json(['data'=>$res], 200);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res = $this->todoService->getTodoById($id);
        return response()->json(['data'=>$res], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, $id)
    {
        $validatedData = $request->validated(); // Get the validated data from the request
        $res = $this->todoService->updateTodo($validatedData, $id);
        return response()->json(['data'=>$res], 200);    
    }

    /**
     * Mark todo as completed
     */
    public function markAsCompleted($id){
        $res = $this->todoService->markAsComplete($id);
        return response()->json(['data'=>$res], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = $this->todoService->deleteTodo($id);
        return response()->json(['data'=>$res], 200);
    }
}
