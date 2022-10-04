<?php

/********************************************
 * Author: Nhi Banh
 * Purpose: Contacts listing page component
 *******************************************/

namespace App\Http\Livewire\Contacts;

use Livewire\Component;
use App\Models\Contact;
use App\Models\ContactInfo;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class Index extends Component
{
    use WithPagination;

    public Contact $contact;
    public ContactInfo $contact_info;

    public $delContactId;
    public $delContactFname;
    public $delContactLname;

    //rules for validation
    protected $rules = [
        'contact.firstName' => 'required|string|min:1',
        'contact.lastName' => 'required|string|min:1',
        'contact.email' => 'required|email',
        'contact.phone' => 'required',
        'contact.age' => 'nullable|numeric',
        'contact.birthdate' => 'nullable|date',
        'contact_info.first_inquiry_date' => 'nullable|date',
        'contact_info.prospect_name' => 'nullable|string|min:1',
        'contact_info.prospect_age' => 'nullable|numeric',
        'contact_info.prospect_relationship' => 'nullable|string|min:1',
        'contact_info.suite_preference' => 'nullable|string|min:1',
        'contact_info.lifestyle_option' => 'nullable|string|min:1',
        'contact_info.marketing_source' => 'nullable|string|min:1',
    ];

    public $isOpen = false;
    public $deleteIsOpen = false;

    public function mount()
    {   //initialize the contact and contact info
        $this->contact = new Contact();
        $this->contact_info = new ContactInfo();
    }
    public function render()
    {
        //$this->contacts = Contact::all();
        return view('livewire.contacts.index', [
            'contacts' => Contact::paginate(10)->onEachSide(2),
        ]);
    }

    public function viewContact($id)
    {
        //redirect to the view single contact page
        return redirect()->to('/contacts/' . $id);
    }

    public function editContact($id)
    {
        //redirect to the edit contact page
        return redirect()->to('/contacts/edit/' . $id);
    }

    public function deleteContact()
    {
        //delete from foreign key first
        ContactInfo::Where('contact_id', $this->contact->id)->delete();

        //find the contact to delete
        $contact = Contact::findOrFail($this->contact->id);

        //delete the contact
        $contact->delete();

        //close the delete popup
        $this->closeDeletePopup();

        //show the message to session
        session()->flash(
            'message',
            'Successfully Deleted  Contact #' . $this->contact->contact_id . ' : ' . $this->contact->first_name . ' ' . $this->contact->last_name
        );
    }

    public function delete($id)
    {
        //find the contact to delete
        $delContact = Contact::find($id);

        //set the form info to show on the popup
        $this->delContactId = $delContact->id;
        $this->delContactFname = $delContact->firstName;
        $this->delContactLname = $delContact->lastName;

        //open the delete popup
        $this->openDeletePopup();
    }
    public function create()
    {
        $this->openPopup();
    }


    public function openPopup()
    {
        $this->isOpen = true;
    }

    public function closePopup()
    {
        //clear the form data
        $this->contact = new Contact();
        $this->contact_info = new ContactInfo();

        $this->isOpen = false;
    }

    public function openDeletePopup()
    {
        $this->deleteIsOpen = true;
    }

    public function closeDeletePopup()
    {
        $this->deleteIsOpen = false;
    }

    public function store()
    {
        //validate the contact data using livewire magic (using the rules above)
        $this->validate();

        //check if birthday is set and override the age
        if (!empty($this->contact->birthdate)) {
            //calculate how many years of age
            $this->contact->age = Carbon::parse($this->contact->birthdate)->diff(Carbon::now())->y;
        }

        //set the user id to logged in user
        $this->contact->user_id = Auth::user()->id;

        //save contact to database

        $this->contact->save();

        //set the contact id in contact info
        $this->contact_info->contact_id = $this->contact->id;

        //save the contact info
        $this->contact_info->save();

        //flash save message to the screen
        session()->flash(
            'message',
            'Contact Created Successfully.'
        );

        //show the flash message
        $this->showFlash = true;

        //close the popup
        $this->closePopup();
    }
}
