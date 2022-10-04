<?php

namespace App\Http\Livewire\View;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class Index extends Component
{

    public $tasks1, $name, $assignee, $dueDate, $task_id;
    public $isOpen = 0; 
    public $statuses = [
        'in-progress', 
        'ToDo',
        'Unassigned',
    ];
    
    public function render()
    {
        $tasks = Task::where('task_id', $this->task_id)->first(); 
        return view('livewire.tasks.view', ['tasks1'=> $tasks]);
    }

}

 