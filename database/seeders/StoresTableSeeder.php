<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i += 1) {
            Store::create([
                'name' => 'グッドウィン'. $i,
                'category_id' => $i%5 + 1,
                'img1' => 'img/shop.jpg',
                'img2' => 'img/drink.jpg',
                'img3' => 'img/Inside the store.jpg',
                'description' => '光る砂すなのだ。けれどもらっしゃしょうの灯あかりトパーズの正面しょうの子が投なげました。
                ジョバンニもカムパネルラ、僕らみだな。そのすきの通りながカムパネルラが出てもも天の川は二つのようなしく両手りょうしているそっちへ来たのです。
                けれどもやっぱいは電いな涙なみちをふるえて、少しかしの方たちはしい狐火きつけてしました。
                「もう、ときにおい、そうに赤い点々てんてつどうか」という証拠しょうか」と言い。',
                'lowest_price' => 1000,
                'highest_price' => 8000,
                'opening_time' => '16:00',
                'closeing_time' => '22:00',
                'post_code' => '839-9353',
                'address' => '和歌山県 井高市加藤町鈴木9-10-8 コーポ渚105号',
                'phone_number' => '09000000000',
                'holiday' => '月曜日'
            ]);
            }
    }
}
