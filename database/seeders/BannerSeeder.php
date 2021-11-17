<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $urls = [
            'https://res.cloudinary.com/azizrosyid/image/upload/v1637108366/images/banner1.jpg',
            'https://res.cloudinary.com/azizrosyid/image/upload/v1637108388/images/banner2.jpg',
        ];

        foreach ($urls as $url) {
            $uploadedFileUrl = cloudinary()->upload($url)->getSecurePath();
            $info = pathinfo($url);

            DB::table('banner')->insert([
                'banner_name' => ucwords($info['filename']),
                'banner_image' => $uploadedFileUrl,
                'banner_link' => 'javascript:void(0)',
            ]);
        }
    }
}
