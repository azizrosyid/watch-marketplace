<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $urls = [
            'https://res.cloudinary.com/azizrosyid/image/upload/v1637071467/images/casual.jpg',
            'https://res.cloudinary.com/azizrosyid/image/upload/v1637071566/images/formal.jpg',
            'https://res.cloudinary.com/azizrosyid/image/upload/v1637071603/images/classy.jpg',
            'https://res.cloudinary.com/azizrosyid/image/upload/v1637071635/images/vintage.jpg',
            'https://res.cloudinary.com/azizrosyid/image/upload/v1637071679/images/sporty.jpg',
            'https://res.cloudinary.com/azizrosyid/image/upload/v1637071693/images/girly.jpg'
        ];

        foreach ($urls as $url) {
            $uploadedFileUrl = cloudinary()->upload($url)->getSecurePath();
            $info = pathinfo($url);

            Category::create([
                'name' => ucwords($info['filename']),
                'slug' => Str::slug($info['filename']),
                'image' => $uploadedFileUrl
            ]);
        }
    }
}
