<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StoreSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandId = [
            '322164489',
            '120341286',
            '36485934',
            '91442354',
            '326527970',
            '99805663',
            // '169202301',
            // '43688581',
            // '319190119',
            // '322158173',
            // '58657841',
            // '180499362',
            // '510869715',
            // '252036753',
            // '36486437',
            // '288624533',
            // '58660768',
            // '64877197',
            // '237274205',
            // '228491050',
            // '56678007',
            // '102364920',
            // '125056387',
            // '55753966',
            // '69581083',
            // '86427133',
            // '73474949',
        ];

        foreach ($brandId as $id) {
            $urlStore = "https://shopee.co.id/api/v2/shop/get?shopid={$id}";
            $response = file_get_contents($urlStore);
            $data = json_decode($response, true);

            $user = [
                'name' => $data['data']['name'],
                'email' => $data['data']['account']['username'] . "@gmail.com",
                'username' => $data['data']['account']['username'],
                'address' => $data['data']['place'],
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ];
            $user = User::factory()->create($user);

            $storeLogo = cloudinary()->upload("https://cf.shopee.co.id/file/" . $data['data']['account']['portrait'])->getSecurePath();
            $store = [
                'name' => $data['data']['name'],
                'slug' => Str::slug($data['data']['name']),
                'description' => $data['data']['description'],
                'address' => $data['data']['place'],
                'email' => $data['data']['account']['username'] . "@gmail.com",
                'logo' => $storeLogo,
                'user_id' => $user->id,
            ];
            $store = Store::factory()->create($store);

            $urlProducts = "https://shopee.co.id/api/v4/search/search_items?by=pop&limit=10&match_id={$id}&newest=0&order=desc&page_type=shop&scenario=PAGE_OTHERS&version=2";
            $response = file_get_contents($urlProducts);
            $data = json_decode($response, true);

            foreach ($data["items"] as $item) {
                $item = $item['item_basic'];
                $urlDetail = "https://shopee.co.id/api/v4/item/get?itemid={$item['itemid']}&shopid={$id}";
                $response = file_get_contents($urlDetail);
                $data = json_decode($response, true);
                $detailItem = $data['data'];

                $productImage = cloudinary()->upload("https://cf.shopee.co.id/file/" . $item['image'])->getSecurePath();
                $product = [
                    'name' => $detailItem['name'],
                    'slug' => Str::slug($detailItem['name']),
                    'description' => $detailItem['description'],
                    'stock' => $detailItem['stock'],
                    'price' => $detailItem['price'] / 10000,
                    'image' => $productImage,
                    'store_id' => $store->id,
                    'category_id' => Category::inRandomOrder()->first()->id,
                ];
                Product::create($product);
            }
        }
    }
}
