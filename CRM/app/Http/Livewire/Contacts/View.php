<?php

/********************************************
 * Author: Nhi Banh
 * Purpose: View single contact component
 *******************************************/

namespace App\Http\Livewire\Contacts;

use Livewire\Component;
use App\Models\Contact;
use App\Models\ContactInfo;
use App\Models\ContactNote;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    use WithPagination;
    public Contact $contact;
    public ContactNote $note;

    public $noteForm = false;
    public $deleteIsOpen = false;
    public $editIsOpen = false;
    public $delNoteId;

    public function mount()
    {
        //initialize the contact note
        $this->note = new ContactNote();
    }

    //Rules for validation of contact form

    protected $rules = [
        'note.title' => 'required|string|min:1',
        'note.note' => 'required|string|min:1',
    ];

    public function render()
    {
        //get the contact info for the current contact
        $contact_info = ContactInfo::where('contact_id',  $this->contact->id)->first();

        //Get the notes for the contact with pagination
        $items = ContactNote::where('contact_id', '=', $this->contact->id)->orderBy('created_at', 'DESC')->paginate(5)->onEachSide(2);

        return view('livewire.contacts.view', ['contact' => $this->contact, 'contact_info' => $contact_info, 'noteForm' => $this->noteForm, 'items' => $items]);
    }

    public function editContact($id)
    {
        //redirect to the edit form
        return redirect()->to('/contacts/edit/' . $id);
    }

    public function getContactPhotoSrc()
    {
        //use the user name
        $cname = $this->contact->firstName . " " . $this->contact->lastName;

        //get the first letter of first name and last name
        $name = trim(collect(explode(' ', $cname))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        //use this site to get an avatar image (same one used from profile)
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=0056E0&background=EBF4FF';
    }

    public function showNoteForm()
    {
        $this->noteForm = true;
    }
    public function hideNoteForm()
    {
        $this->note = new ContactNote();
        $this->noteForm = false;
    }

    public function createNote()
    {
        //validate the note data using livewire magic (using the rules above)
        $this->validate();

        //set the contact id for the note
        $this->note->contact_id = $this->contact->id;
        $this->note->author = Auth::user()->id;

        //save to the database
        $this->note->save();

        //close the create form popup

        $this->hideNoteForm();
    }
    public function editNote()
    {
        //validate the note data using livewire magic (using the rules above)
        $this->validate();

        //uopdate who last modified the note
        $this->note->last_modified_by = Auth::user()->id;

        //save the note to the database
        $this->note->save();

        //reset the validation form so it stops showing error messages
        $this->resetValidation();

        //close the edit form popup

        $this->closeEditPopup();
    }

    public function deleteNote($id)
    {
        //find the note to delete
        $cNote = ContactNote::findOrFail($id);

        //delete the note
        $cNote->delete();

        //close the delete popup

        $this->closeDeletePopup();
    }
    public function openDeletePopup($id)
    {
        $this->delNoteId = $id;
        $this->deleteIsOpen = true;
    }

    public function closeDeletePopup()
    {
        $this->deleteIsOpen = false;
    }

    public function openEditPopup($id)
    {
        //find the note to edit
        $this->note = ContactNote::findOrFail($id);

        //open the edit form

        $this->editIsOpen = true;
    }

    public function closeEditPopup()
    {
        //reset the data so it does not show in the form anymore
        $this->note = new ContactNote();
        $this->resetValidation();
        $this->editIsOpen = false;
    }

    public function getAuthorName($id, $showEmail = false)
    {
        //find the user
        $user = User::findOrFail($id);

        //print out the name and email
        if ($showEmail) {
            echo $user->name . ' (' . $user->email . ')';
        } else {
            echo $user->name;
        }
    }
    public function createTask()
    {
    }
}
