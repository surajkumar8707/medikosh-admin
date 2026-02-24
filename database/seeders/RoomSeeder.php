<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing records
        Room::truncate();

        $default_rooms = array(
            [
                'name' => 'Double Bed Room',
                'price' => 3000,
                'photo' => "assets/front/images/bedroom/double-bed.jpg",
                'description' => 'Our Double Bed room offers a cozy and comfortable space ideal for couples or solo travelers seeking a peaceful retreat. Featuring a plush double bed, modern amenities, and a warm ambiance, this room ensures a restful stay. Enjoy a serene environment with all the comforts of home, including Wi-Fi access and a private bathroom.'
            ],
            [
                'name' => 'Four Bed Room',
                'price' => 4000,
                'photo' => "assets/front/images/bedroom/bedroom6.jpg",
                'description' => 'Perfect for families or groups, our Four Bed room provides spacious accommodations with four comfortable beds. Designed for shared living, this room offers a welcoming atmosphere where you can relax after a day of exploration. Equipped with essential amenities, it features a private bathroom and ample space for everyone to unwind together.'
            ],
        );

        if (count($default_rooms) > 0) {
            foreach ($default_rooms as $room) {
                Room::create($room);
            }
        }
    }
}
