<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\ContactInfo;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Faker\Generator as Faker;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $value = $this->command->ask("Please enter number of contacts to create");

        $count = (is_numeric($value)) ? $value : 20;

        Contact::factory()
            ->count($count)
            ->create()
            ->each(function ($contact) use ($faker) {
                $contact_info = ContactInfo::factory()->make(['contact_id' => $contact->id]);
                $contact->contact_info()->save($contact_info);
            });
    }
}
