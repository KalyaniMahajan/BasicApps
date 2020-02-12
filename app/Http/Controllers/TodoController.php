<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $term = null )
    {
        //$tasks = Todo::all();
        if($term != null){
            $tasks['data'] = Todo::where('name','like','%'.$term.'%')->get();
            return request()->json(200, $tasks);
        }
        return $this->getRecord();
    }

    public function store(Request $request)
    {
        $todo = Todo::create($request->all());
        if($todo){
            return $this->getRecord();
        }
    }

    public function edit(Todo $task)
    {
        return request()->json(200, $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, Todo $task)
    {
        $task->name = $request->name;
        if($task->save()){
            return $this->getRecord();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $task)
    {
        if( $task->delete() ) 
            return $this->getRecord();
        else
            return response()->json(425, ['delete'=>"error in deleting record"]);
    }

    public function getRecord()
    {
        $tasks = Todo::orderBy('created_at','desc')->paginate(6);
        return request()->json(200, $tasks);
    }
}
