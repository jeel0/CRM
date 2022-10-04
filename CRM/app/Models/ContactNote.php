<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;
use App\Models\User;


class ContactNote extends Model
{
    use HasFactory;
    protected $table = 'contact_notes';
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'title',
        'note',
    ];
}
