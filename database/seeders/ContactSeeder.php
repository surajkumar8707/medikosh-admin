<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing records
        // Contact::truncate();

        $contacts = [
            [
                'name' => 'Rajesh Kumar',
                'email' => 'rajeshkumar@example.com',
                'phone' => '9389554115',
                'subject' => 'Query about booking',
                'message' => 'I am interested in booking a tour package. Can you provide more details?',
            ],
            [
                'name' => 'Priya Singh',
                'email' => 'priyasingh@example.com',
                'phone' => '9389554115',
                'subject' => 'Feedback on recent trip',
                'message' => 'I recently visited your park and had a wonderful experience. Thank you!',
            ],
        ];

        // foreach ($contacts as $contact) {
        //     Contact::create($contact);
        // }
    }
}
