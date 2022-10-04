<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

class ContactInfo extends Model
{
    use HasFactory;
    protected $table = 'contact_info';

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
