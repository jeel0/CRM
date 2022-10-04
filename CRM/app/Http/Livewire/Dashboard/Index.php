<?php

/********************************************
 * Author: Nhi Banh
 * Purpose: Main Dashboard Component
 *******************************************/

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Task;
use App\Models\ContactInfo;
use App\Models\ContactNote;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\WithPagination;
use Carbon\Carbon;

class Index extends Component
{
    public function render()
    {
        $currentUser =  Auth::user()->name;
        $tasks = Task::all();

        //Grab up to 10 tasks due in the future, for the current logged in user 
        //Removed where('dueDate', '>', Carbon::now())-> for now
        $userOrderedTasks = Task::where('assignee', '=', $currentUser)->orderBy('dueDate', 'desc')->take(10)->get();

        //get the recent notes, recent contacts, recent tasks
        $newTasks = $tasks->sortByDesc('updated_at')->take(15);
        $newContacts = Contact::latest()->take(15)->get();
        $newNotes = ContactNote::latest()->take(15)->get();

        //using collection to merge into one object
        $ra = collect($newTasks);
        $ra2 = $ra->merge($newContacts);
        $re3 = $ra2->merge($newNotes);

        //sort the object by date
        $recentActivity = $re3->sortByDesc('created_at')->take(12);

        return view('dashboard', ['tasks' => $userOrderedTasks, 'recentActivity' => $recentActivity]);
    }

    public function getAuthorName($id)
    {
        $user = User::findOrFail($id);
        return $user->name;
    }

    public function viewTask($id)
    {
        return redirect()->to('/tasks/' . $id);
    }

    public function viewContact($id)
    {
        return redirect()->to('/contacts/' . $id);
    }
}
