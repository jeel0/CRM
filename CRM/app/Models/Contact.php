<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContactInfo;
use App\Models\ContactNote;

class Contact extends Model
{
    use HasFactory;

    public function contact_info()
    {
        return $this->hasOne(ContactInfo::class);
    }

    public function contact_note()
    {
        return $this->hasMany(ContactNote::class);
    }

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'age',
        'birthdate'
    ];
}
