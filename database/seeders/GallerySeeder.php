<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::truncate();
        $default_galleries = array(
            [
                'title' => 'Project Building',
                'image' => "assets/front/images/gallery/gallery_1.jpg",
                'status' => true,
                'type' => 'mivan',
            ],
            [
                'title' => 'Project Building',
                'image' => "assets/front/images/gallery/gallery_2.jpg",
                'status' => true,
                'type' => 'mivan',
            ],
            [
                'title' => 'Project Building',
                'image' => "assets/front/images/gallery/gallery_3.jpg",
                'status' => true,
                'type' => 'mivan',
            ],
            [
                'title' => 'Project Building',
                'image' => "assets/front/images/gallery/gallery_4.jpg",
                'status' => true,
                'type' => 'mivan',
            ],
            [
                'title' => 'Project Building',
                'image' => "assets/front/images/gallery/gallery_5.jpg",
                'status' => true,
                'type' => 'mivan',
            ],
            [
                'title' => 'Project Building',
                'image' => "assets/front/images/gallery/gallery_6.jpg",
                'status' => true,
                'type' => 'mivan',
            ],
            [
                'title' => 'Project Building',
                'image' => "assets/front/images/gallery/gallery_7.jpg",
                'status' => true,
                'type' => 'mivan',
            ],
            [
                'title' => 'Project Building',
                'image' => "assets/front/images/gallery/gallery_8.jpg",
                'status' => true,
                'type' => 'post_tensioning',
            ],
            [
                'title' => 'Project Building',
                'image' => "assets/front/images/gallery/gallery_9.jpg",
                'status' => true,
                'type' => 'post_tensioning',
            ],
            [
                'title' => 'Project Building',
                'image' => "assets/front/images/gallery/gallery_10.jpg",
                'status' => true,
                'type' => 'post_tensioning',
            ],
            [
                'title' => 'Project Building',
                'image' => "assets/front/images/gallery/gallery_11.jpg",
                'status' => true,
                'type' => 'post_tensioning',
            ],
            [
                'title' => 'Project Building',
                'image' => "assets/front/images/gallery/gallery_12.jpg",
                'status' => true,
                'type' => 'post_tensioning',
            ],
            [
                'title' => 'Project Building',
                'image' => "assets/front/images/gallery/gallery_13.jpg",
                'status' => true,
                'type' => 'post_tensioning',
            ],
            [
                'title' => 'Project Building',
                'image' => "assets/front/images/gallery/gallery_14.jpg",
                'status' => true,
                'type' => 'post_tensioning',
            ],
            [
                'title' => 'Project Building',
                'image' => "assets/front/images/gallery/gallery_15.jpg",
                'status' => true,
                'type' => 'post_tensioning',
            ],
        );

        if (count($default_galleries) > 0) {
            foreach ($default_galleries as $gallery) {
                Gallery::create($gallery);
            }
        }
    }
}
