<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Contact([
            'id'     => $row['id'],
            'email'    => $row['email'],
            'phone' => $row['phone'],
            'firstName' => $row['firstName'],
            'lastName' => $row['lastName'],

        ]);
    }
}
