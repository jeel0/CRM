<?php
namespace App\Http\Controllers;
use App\Models\Task; 
use Illuminate\Http\Request;

class TasksController extends Controller
{


    /**
     * Create a new Controller instance
     * 
     * @return void
     */
    public function __construct(){
        $this->middleware('auth'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $tasks = Task::where('user_id', $request->user()->id)->get(); 

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Create task
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate task 
        $request->validate([
            'name' => 'required',
            'assignee' => 'required|string|nullable',
            'status' => 'required',
            'dueDate' => 'required',
        ]);
        Task::updateOrCreate([
            'id' => $request->task_id
        ], [
            'name' => $request->name,
            'assignee' =>  $request->assignee,
            'status' => $request->status,
            'dueDate' => $request->dueDate,
            // 'description' => $this->description,
        ]);

        return redirect('/tasks'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('livewire.tasks.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($task)
    {
        //
        Task::findOrFail($task)->delete(); 

        session()->flash('message', 'Task deleted Successfully');
        return back(); 
    }
}
