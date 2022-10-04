<?php

/********************************************
 * Author: Nhi Banh
 * Purpose: Contacts listing Edit page component
 *******************************************/

namespace App\Http\Livewire\Contacts;

use Livewire\Component;
use App\Models\Contact;
use App\Models\ContactInfo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    public Contact $contact;
    public ContactInfo $contact_info;
    public $showFlash = false;

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

    public function mount(Contact $contact)
    {
        //set the contact to the one we are editing
        $this->contact = $contact;

        //get the contact info for this contact
        $this->contact_info = ContactInfo::where('contact_id',  $contact->id)->first();
    }
    public function render()
    {
        return view('livewire.contacts.edit', ['contact' => $this->contact, 'contact_info' => $this->contact_info]);
    }

    public function viewContact()
    {
        //redirect back to the view single contact page
        return redirect()->to('/contacts/' . $this->contact->id);
    }

    public function store()
    {
        //validate contact data using livewire magic (using the rules above)
        $this->validate();

        //override age if birthdate is set
        if (!empty($this->contact->birthdate)) {
            //calculate how many years of age
            $this->contact->age = Carbon::parse($this->contact->birthdate)->diff(Carbon::now())->y;
        }

        // set the last user who modified the contact
        $this->contact->last_modified_by = Auth::user()->id;

        //save the updated contact to the database

        $this->contact->save();

        //save the updated contact info to the database
        $this->contact_info->save();

        //flash a message to the screen 
        session()->flash(
            'message',
            $this->contact->id ? 'Contact Updated Successfully.' : 'Contact Added Successfully.'
        );

        //show the flash message 
        $this->showFlash = true;
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
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=7F9CF5&background=EBF4FF';
    }
    public function closeFlash()
    {
        $this->showFlash = false;
    }
}
