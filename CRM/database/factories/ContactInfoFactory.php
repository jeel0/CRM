<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactInfoFactory>
 */
class ContactInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_inquiry_date' => null,
            'prospect_name' => null,
            'prospect_age' => null,
            'prospect_relationship' => null,
            'suite_preference' => null,
            'lifestyle_option' => null,
            'marketing_source' => null,
        ];
    }
}
