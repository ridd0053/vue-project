<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $tasks =  Task::paginate(5);

       
       
        return response()->json($tasks);
         
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
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'title' => "required|max:255|",
            'due_date' => "nullable"
            
        ]);
        Task::create($data);

        return(['message' => "taak succesvol toegevoegd"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }
    public function updateWorkingOn(Request $request, $id)
    {
        //    

        $task = Task::find($id);
  
        $task->title = $request->get('title');
        $task->due_date = $request->get('due_date');
        
        $task->working_on = $request->get('working_on');

        $task->save(); 
        return redirect('/');
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       
        $task = Task::find($id);
        
        // $task->title = $request->get('title');
        // $task->due_date = $request->get('due_date');
        // $task->completed = $request->get('completed');
        // $task->working_on = $request->get('working_on');         
        
       
        // $task->save(); 
        $data = $request->validate([
            'title' => "required|max:255|",
            'due_date' => "nullable",
            'completed' => "required",
            'working_on' => "required",
        ]);
        $task->update($data);
       
        return(['message' => "taak succesvol gewijzigd"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return(['message' => "taak succesvol gewijzigd"]);
    }
}
