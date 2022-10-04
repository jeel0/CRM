<?php

namespace App\Http\Livewire\Users;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\User;
use App\Models\Task;

class Index extends Component
{
    public $users, $name, $email, $user_id;
    public $isOpen = 0;

    // public $users1 = DB::select('select * from users');

    public function render()
    {

        $users = User::all();

        return view('livewire.users.index', ['users1' => $users]);
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
        $this->email = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        Task::updateOrCreate([
            'id' => $this->user_id
        ], [
            'name' => $this->name,
            'email' =>  $this->email,

        ]);

        session()->flash(
            'message',
            $this->user_id ? 'user Updated Successfully.' : 'user Added Successfully.'
        );

        $this->closePopup();
        $this->resetInputFields();
    }
}
