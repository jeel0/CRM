<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class View extends Component
{

    public $tasks, $name, $assignee, $dueDate, $task_id;
    public $isOpen = 0; 
    public $statuses = [
        'in-progress', 
        'ToDo',
        'Unassigned',
    ];
    
    public function render()
    {
        $tasks = Task::where('task_id', $this->task->id)->first(); 
        return view('livewire.tasks.view', ['tasks1'=> $tasks]);
    }

    public function view($id){
        $task = Task::findOrFail($id); 
        $this->task_id = $id; 
        $this->name = $task->name;
        $this->assignee = $task->assignee;
        $this->status = $task->status;
        $this->dueDate = $task->dueDate;

        return redirect()->route('view');
    }

}

 