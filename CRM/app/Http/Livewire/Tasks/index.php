<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 
class Index extends Component
{

    use withPagination; 

    public $tasks , $name, $assignee, $dueDate, $task_id;
    public $isOpen = 0;
    public $statuses = [
        'in-progress', 
        'ToDo',
        'Unassigned',
    ];
    public $result;
    public $users;
    
    public function render()
    {
       $tasks = Task::paginate(10);
       $this->users = DB::table('users')->get(); 
        return view('livewire.tasks.index', ['tasks1' => $tasks]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openPopup();
    }

    public function openPopup()
    {
        $this->isOpen = true;
    }

    public function closePopup()
    {
        $this->isOpen = false;
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->assignee = '';
        $this->status = '';
        $this->dueDate = '';
    }

    // public function confirmDelete($id){
    //     $this->result = confirm("want to delete?")
    //     if(result){
    //         Task::findOrFail($id)->delete(); 
    //     }
    //     return back();
    // }
    
    public function store()
    {
        $this->validate([
            'name' => 'required|string',
            'assignee' => 'required|string',
            'status' => 'required|string',
            'dueDate' => 'required|date',
        ]);
        Task::updateOrCreate([
            'id' => $this->task_id
        ], 
        [
            'name' => $this->name,
            'assignee' =>  $this->assignee,
            'status' => $this->status,
            'dueDate' => Carbon::now(),
            // 'description' => $this->description,
        ]);

        session()->flash(
            'message',
            $this->task_id ? 'Task Updated Successfully.' : 'Task Added Successfully.'
        );

        $this->closePopup();
        $this->resetInputFields();
    }

    public function edit($id){
        $task = Task::findOrFail($id); 
        $this->task_id = $id; 
        $this->name = $task->name;
        $this->assignee = $task->assignee;
        $this->status = $task->status;
        $this->dueDate = $task->dueDate;

        $this->openPopup(); 
    }

    public function delete($id){
        Task::findOrFail($id)->delete(); 
        session()->flash('message','Task Deleted Successfully'); 
    
    }

    

}

 

