<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Task::factory()
        ->count(20)
        ->create()
        ->each(function ($task) use ($faker) {
            $contact_info = ContactInfo::factory()
                ->count(5)
                ->sequence(
                    ['key' => 'Address', 'value' => $faker->address],
                    ['key' => 'Country', 'value' => $faker->country],
                    ['key' => 'User Description'],
                    ['key' => 'Internal Comment'],
                    ['key' => 'Interests', 'value' => $faker->sentence],
                )
                ->make();

            $task->contact_info()->saveMany($contact_info);
        });
    }
}
